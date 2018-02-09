'use strict';

class SpecieCategoryController {
  constructor(SpecieCategory, Notification, $mdDialog, $state, $scope, $timeout) {
    this.SpecieCategory      =  SpecieCategory;
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
    this.title = "Specie Categories";
    this.SpecieCategory.get(this.query, response =>  {
      this.specieCategory = response.data;
    });
  }

  loadData(page, limit) {
    console.log("query: " + this.query);
    this.SpecieCategory.get(this.query, response =>  {
      this.SpecieCategory = response.data;
    });
  }

  closeDialog(e) {
    e.preventDefault();
    this.mdDialog.hide();
  }

  showAddSpecieCategoryDialog(event){
    console.log('the event is', event);
    this.mdDialog.show({
      controller          : SpecieCategoryController,
      controllerAs        : 'vm',
      template            : require('../views/add-new-speciecategory.html'),
      clickOutsideToClose : false,
      preserveScope       : true,
      fullscreen          : true // Only for -xs, -sm breakpoints.
    });
  }

  showUpdateSpecieCategoryDialog(id){

    this.SpecieCategory.get({id: id}, response => {
      this.result = response.data;

      this.mdDialog.show({
        controller         : SpecieCategoryController,
        controllerAs        : 'vm',
        scope               : this.scope,
        preserveScope       : true,
        template            : require('../views/edit-speciecategory.html'),
        clickOutsideToClose : false,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  updateSpecieCategory(SpecieCategory){
    this.SpecieCategory.update(SpecieCategory, response => {
      let message = response.message;
      if (response.status === 200) {
        this.mdDialog.hide();
        this.Notification.status(message);
        this.state.reload('specie-categories');
      } else {
        this.Notification.status(message);
        this.state.reload('specie-categories');
      }
    }, response => {
      this.Notification.status(response.data.errors);
      this.state.reload('specie-categories');
    });
  }

  createSpecieCategory(category) {
    let data, name;
    data = {
      name: category.name,
    };

    this.SpecieCategory.save(data, response => {
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


  delete(e, id) {
    let confirm = this.mdDialog.confirm()
      .title('Deleting Specie Category')
      .content('The Specie Category Will Be Deleted')
      .ok('Delete!')
      .cancel('Cancel')
      .targetEvent(e);

    this.mdDialog.show(confirm).then(() =>  {
      this.SpecieCategory.remove({id: id}, response => {
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

SpecieCategoryController.$inject = ['SpecieCategory', 'Notification', '$mdDialog', '$state', '$scope', '$timeout'];
export default SpecieCategoryController;
