'use strict';

class StationCategoryController {
  constructor(StationCategory, Notification, $mdDialog, $state, $scope, $timeout) {
    this.StationCategory =  StationCategory;
    this.Notification    =  Notification;
    this.mdDialog        =  $mdDialog;
    this.state           =  $state;
    this.scope           =  $scope;
    this.limitOptions    =  [10, 15, 20, 50, 100, 200, 500];
    this.selected        =  [];
    this.loadData        =  this.loadData.bind(this);

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
    this.title = "Station Categories";
    this.StationCategory.get(this.query, response =>  {
      this.stationCategory = response.data;
    });
  }

  loadData(page, limit) {
    console.log("query: " + this.query);
    this.StationCategory.get(this.query, response =>  {
      this.stationCategory = response.data;
    });
  }

  closeDialog(e) {
    e.preventDefault();
    this.mdDialog.hide();
  }

  showAddStationCategoryDialog(event){
    console.log('the event is', event);
    this.mdDialog.show({
      controller          : StationCategoryController,
      controllerAs        : 'vm',
      template            : require('../views/add-new-stationcategory.html'),
      clickOutsideToClose : false,
      preserveScope       : true,
      fullscreen          : true // Only for -xs, -sm breakpoints.
    });
  }

  showUpdateStationCategoryDialog(id){

    this.StationCategory.get({id: id}, response => {
      this.result = response.data;

      this.mdDialog.show({
        ccontroller         : StationCategoryController,
        controllerAs        : 'vm',
        scope               : this.scope,
        preserveScope       : true,
        template            : require('../views/edit-stationcategory.html'),
        clickOutsideToClose : false,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  updateStationCategory(StationCategory){
    this.StationCategory.update(StationCategory, response => {
      let message = response.message;
      if (response.status === 200) {
        this.mdDialog.hide();
        this.Notification.status(message);
        this.state.reload('station-categories');
      } else {
        this.Notification.status(message);
        this.state.reload('station-categories');
      }
    }, response => {
      this.Notification.status(response.data.errors);
      this.state.reload('station-categories');
    });
  }

  createStationCategory(category) {
    let data, name;
    data = {
      name        : category.name,
    };

    this.StationCategory.save(data, response => {
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

  editStationCategory(id){

    this.StationCategory.get({id: id}, response => {
      this.mdDialog.show({
        controller          : this,
        template            : require('../views/edit-stationcategory.html'),
        clickOutsideToClose : false,
        preserveScope       : true,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  delete(e, id) {
    let confirm = this.mdDialog.confirm()
      .title('Deleting Station Category')
      .content('The Station Category Will Be Deleted')
      .ok('Delete!')
      .cancel('Cancel')
      .targetEvent(e);

    this.mdDialog.show(confirm).then(() =>  {
      this.StationCategory.remove({id: id}, response => {
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

StationCategoryController.$inject = ['StationCategory', 'Notification', '$mdDialog', '$state', '$scope', '$timeout'];
export default StationCategoryController;
