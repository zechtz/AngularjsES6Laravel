'use strict';

class AttractionSiteCategoryController {
  constructor(AttractionSiteCategory, Notification, $mdDialog, $state, $scope, $timeout) {
    this.AttractionSiteCategory      =  AttractionSiteCategory;
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
    this.title = "Attraction Site Categories Module";
    this.AttractionSiteCategory.get(this.query, response =>  {
      this.attractionaitecategory = response.data;
    });
  }

  loadData() {
    console.log("query: " + this.options);
    this.AttractionSiteCategory.get(this.query, response =>  {
      this.attractionaitecategory = response.data;
    });
  }

  closeDialog(e) {
    e.preventDefault();
    this.mdDialog.hide();
  }

  showAddICategoryDialog(event){
    console.log('the event is', event);
    this.mdDialog.show({
      controller          : AttractionSiteCategoryController,
      controllerAs        : 'vm',
      template            : require('../views/add-attraction-site-category.html'),
      clickOutsideToClose : false,
      preserveScope       : true,
      fullscreen          : true // Only for -xs, -sm breakpoints.
    });
  }

  showUpdateCategoryDialog(id){

    this.Institution.get({id: id}, response => {
      this.result = response.data;

      this.mdDialog.show({
        ccontroller         : AttractionSiteCategoryController,
        controllerAs        : 'vm',
        scope               : this.scope,
        preserveScope       : true,
        template            : require('../views/edit-attraction-site-category.html'),
        clickOutsideToClose : false,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  updateAttractionSiteCategory(attractionSiteCategory){
    this.AttractionSiteCategory.update(attractionSiteCategory, response => {
      let message = response.message;
      if (response.status === 200) {
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

  createCategory(category) {
    let data, name;
    data = {
      name : category.name,
    };

    this.AttractionSiteCategory.save(data, response => {
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

  editCategory(id){

    this.Institution.get({id: id}, response => {

      this.mdDialog.show({
        controller          : this,
        template            : require('../views/edit-attraction-site-category.html'),
        clickOutsideToClose : false,
        preserveScope       : true,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  delete(e, id) {
    let confirm = this.mdDialog.confirm()
      .title('Deleting Category')
      .content('The Category Will Be Deleted')
      .ok('Delete!')
      .cancel('Cancel')
      .targetEvent(e);

    this.mdDialog.show(confirm).then(() =>  {
      this.AttractionSiteCategory.remove({id: id}, response => {
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

AttractionSiteCategoryController.$inject = ['AttractionSiteCategory', 'Notification', '$mdDialog', '$state', '$scope', '$timeout'];
export default AttractionSiteCategoryController;
