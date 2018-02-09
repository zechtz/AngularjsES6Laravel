'use strict';

class LocationHierarchyController {
  constructor(LocationHierarchy, Notification, $mdDialog, $state, $scope, $timeout) {
    this.LocationHierarchy      =  LocationHierarchy;
    this.Notification     =  Notification;
    this.mdDialog         =  $mdDialog;
    this.state            =  $state;
    this.scope            =  $scope;
    this.limitOptions     =  [10, 15, 20, 50, 100, 200, 500];
    this.selected         =  [];
    this.loadData         =  this.loadData.bind(this);

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

    this.result = {};
  }

  $onInit() {
    this.title = "Location Hierarchies";
    this.LocationHierarchy.get(this.query, response =>  {
      this.locationHierarchy = response.data;
    });
  }

  loadData(page, limit) {
    console.log("query: " + this.query);
    this.LocationHierarchy.get(this.query, response =>  {
      this.locationHierarchy = response.data;
    });
  }

  closeDialog(e) {
    e.preventDefault();
    this.mdDialog.hide();
  }

  showAddLocationHierarchyDialog(event){
    console.log('the event is', event);
    this.mdDialog.show({
      controller          : LocationHierarchyController,
      controllerAs        : 'vm',
      template            : require('../views/add-new-locationhierarchy.html'),
      clickOutsideToClose : false,
      preserveScope       : true,
      fullscreen          : true // Only for -xs, -sm breakpoints.
    });
  }

  showUpdateLocationHierarchyDialog(id){

    this.LocationHierarchy.get({id: id}, response => {
      this.result = response.data;

      this.mdDialog.show({
        ccontroller         : LocationHierarchyController,
        controllerAs        : 'vm',
        scope               : this.scope,
        preserveScope       : true,
        template            : require('../views/edit-locationhierarchy.html'),
        clickOutsideToClose : false,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  updateLocationHierarchy(LocationHierarchy){
    this.LocationHierarchy.update(LocationHierarchy, response => {
      let message = response.message;
      if (response.status === 200) {
        this.mdDialog.hide();
        this.Notification.status(message);
        this.state.reload('location-hierarchies');
      } else {
        this.Notification.status(message);
        this.state.reload('location-hierarchies');
      }
    }, response => {
      this.Notification.status(response.data.errors);
      this.state.reload('location-hierarchies');
    });
  }

  createLocationHierarchy(locationHierarchy) {
    let data, name,hierarchy_position,sort_order;
    data = {
      name        : locationHierarchy.name,
      hierarchy_position:locationHierarchy.hierarchy_position,
      sort_order:locationHierarchy.sort_order,
    };

    this.LocationHierarchy.save(data, response => {
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

  editLocationHierarchy(id){

    this.LocationHierarchy.get({id: id}, response => {
      this.mdDialog.show({
        controller          : this,
        template            : require('../views/edit-locationhierarchy.html'),
        clickOutsideToClose : false,
        preserveScope       : true,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  delete(e, id) {
    let confirm = this.mdDialog.confirm()
      .title('Deleting Location Hierarchy')
      .content('The Location Hierarchy Will Be Deleted')
      .ok('Delete!')
      .cancel('Cancel')
      .targetEvent(e);

    this.mdDialog.show(confirm).then(() =>  {
      this.LocationHierarchy.remove({id: id}, response => {
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

LocationHierarchyController.$inject = ['LocationHierarchy', 'Notification', '$mdDialog', '$state', '$scope', '$timeout'];
export default LocationHierarchyController;
