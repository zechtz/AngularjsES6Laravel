'use strict';

class LocationController {
  constructor(Location, LocationHierarchy, Notification, $mdDialog, $state, $scope, $timeout) {
    this.Location          =  Location;
    this.LocationHierarchy =  LocationHierarchy;
    this.Notification      =  Notification;
    this.mdDialog          =  $mdDialog;
    this.state             =  $state;
    this.scope             =  $scope;
    this.timeout           =  $timeout;
    this.limitOptions      =  [10, 15, 20, 50, 100, 200, 500];
    this.selected          =  [];
    this.loadData          =  () => this.loadData();
    this.result            =  [];

    this.options = {
      rowSelection    : false,
      multiSelect     : true,
      autoSelect      : false,
      decapitate      : false,
      largeEditDialog : false,
      boundaryLinks   : false,
      limitSelect     : true,
      pageSelect      : true
    };

    this.query = {
      per_page : 10,
      page     : 1
    };

    this.result      =  {};
    this.hierarchies =  [];
  }

  $onInit() {
    this.title = "Locations";
    this.Location.get(this.query, response =>  {
      this.location = response.data;
    });

    this.LocationHierarchy.get({}, response  => {
      this.hierarchies = response.data.data;
    });
  }

  loadData() {
    console.log("query: " + this.query);
    this.Location.get(this.query, response =>  {
      this.location = response.data;
    });
  }

  getLocationHierachies() {
    return this.timeout(() =>  {
      this.LocationHierarchy.get({}, response => {
        this.result =  response.data;
        return this.result;
      });
    }, 650);
  }

  closeDialog(e) {
    e.preventDefault();
    this.mdDialog.hide();
  }

  showAddLocationDialog(event){
    console.log('the event is', event);
    this.mdDialog.show({
      controller          : LocationController,
      controllerAs        : 'vm',
      template            : require('../views/add-new-location.html'),
      clickOutsideToClose : false,
      preserveScope       : true,
      fullscreen          : true // Only for -xs, -sm breakpoints.
    });
  }

  showUpdateLocationDialog(id){

    this.Location.get({id: id}, response => {

      this.result = response.data;

      this.mdDialog.show({
        ccontroller         : LocationController,
        controllerAs        : 'vm',
        scope               : this.scope,
        preserveScope       : true,
        template            : require('../views/edit-location.html'),
        clickOutsideToClose : false,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  updateLocation(location){
    this.Location.update(location, response => {
      let message = response.message;
      if (response.status === 200) {
        this.mdDialog.hide();
        this.Notification.status(message);
        this.state.reload('locations');
      } else {
        this.Notification.status(message);
        this.state.reload('locations');
      }
    }, response => {
      this.Notification.status(response.data.errors);
      this.state.reload('locations');
    });
  }

  createLocation(location) {
    let data, name,location_id,location_hierarchy_id;
    data = {
      name                  : location.name,
      location_id           : location.location_id,
      location_hierarchy_id : location.location_hierarchy_id,
    };

    this.Location.save(data, response => {
      console.log(response);
      var message = response.message;
      if (response.status === 201) {
        this.mdDialog.hide();
        this.Notification.status(message);
        this.state.reload();
      } else {
        this.Notification.status(message);
        this.state.reload();
      }
    }, response => {
      this.Notification.status(response.data.errors);
      this.state.reload();
    });
  }

  editLocation(id){

    this.Location.get({id: id}, response => {
      this.mdDialog.show({
        controller          : this,
        template            : require('../views/edit-location.html'),
        clickOutsideToClose : false,
        preserveScope       : true,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  delete(e, id) {
    let confirm = this.mdDialog.confirm()
      .title('Deleting Location')
      .content('The Location Will Be Deleted')
      .ok('Delete!')
      .cancel('Cancel')
      .targetEvent(e);

    this.mdDialog.show(confirm).then(() =>  {
      this.Location.remove({id: id}, response => {
        let message = response.message;
        if (response.status === 200) {
          this.state.reload();
          this.Notification.status(message);
        } else {
          this.state.reload();
          this.Notification.status(message);
        }
      }, response  =>  {
        console.log(response);
        this.Notification.status(response.data.message);
      });
    });
  }
}

LocationController.$inject = ['Location', 'LocationHierarchy', 'Notification', '$mdDialog', '$state', '$scope', '$timeout'];
export default LocationController;
