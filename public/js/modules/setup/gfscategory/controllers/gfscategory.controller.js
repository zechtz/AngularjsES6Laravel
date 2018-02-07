'use strict';

class GfsCategoryController {
  constructor(GfsCategory, Notification, $mdDialog, $state, $scope, $timeout) {
    this.GfsCategory      =  GfsCategory;
    this.Notification     =  Notification;
    this.mdDialog         =  $mdDialog;
    this.state            =  $state;
    this.scope            =  $scope;
    this.limitOptions     =  [10, 15, 20, 50, 100, 200, 500];
    this.selected         =  [];
    this.scope.onPaginate =  () => this.loadData();

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
    this.title = "GFS Code Categories";
    this.GfsCategory.get(this.query, response =>  {
      this.gfsCategory = response.data;
    });
  }

  loadData(page, limit) {
    console.log("query: " + this.query);
    this.GfsCategory.get(this.query, response =>  {
      this.gfsCategory = response.data;
    });
  }

  closeDialog(e) {
    e.preventDefault();
    this.mdDialog.hide();
  }

  showAddGfsCategoryDialog(event){
    console.log('the event is', event);
    this.mdDialog.show({
      controller          : GfsCategoryController,
      controllerAs        : 'vm',
      template            : require('../views/add-new-gfscategory.html'),
      clickOutsideToClose : false,
      preserveScope       : true,
      fullscreen          : true // Only for -xs, -sm breakpoints.
    });
  }

  showUpdateGfsCategoryDialog(id){

    this.GfsCategory.get({id: id}, response => {
      this.result = response.data;

      this.mdDialog.show({
        ccontroller         : GfsCategoryController,
        controllerAs        : 'vm',
        scope               : this.scope,
        preserveScope       : true,
        template            : require('../views/edit-gfscategory.html'),
        clickOutsideToClose : false,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  updateGfsCategory(GfsCategory){
    this.GfsCategory.update(GfsCategory, response => {
      let message = response.message;
      if (response.status === 200) {
        this.mdDialog.hide();
        this.Notification.status(message);
        this.state.reload('gfs-categories');
      } else {
        this.Notification.status(message);
        this.state.reload('gfs-categories');
      }
    }, response => {
      this.Notification.status(response.data.errors);
      this.state.reload('gfs-categories');
    });
  }

  createGfsCategory(category) {
    let data, name, description;
    data = {
      name        : category.name,
      description : category.description,
    };

    this.GfsCategory.save(data, response => {
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

  editGfsCategory(id){

    this.GfsCategory.get({id: id}, response => {
      this.mdDialog.show({
        controller          : this,
        template            : require('../views/edit-gfscategory.html'),
        clickOutsideToClose : false,
        preserveScope       : true,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  delete(e, id) {
    let confirm = this.mdDialog.confirm()
      .title('Deleting GfsCategory')
      .content('The GfsCategory Will Be Deleted')
      .ok('Delete!')
      .cancel('Cancel')
      .targetEvent(e);

    this.mdDialog.show(confirm).then(() =>  {
      this.GfsCategory.remove({id: id}, response => {
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

  onPaginate(page, limit) {
    console.log("query: " + this.query);
  }

  loadGfsCategorys() {
    return this.timeout(function() {
      this.GfsCategory.get(this.query, response =>  {
        this.results = response.data.data;
      });
    }, 650);
  }
}

GfsCategoryController.$inject = ['GfsCategory', 'Notification', '$mdDialog', '$state', '$scope', '$timeout'];
export default GfsCategoryController;
