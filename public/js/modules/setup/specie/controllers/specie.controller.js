'use strict';

class SpecieController {
  constructor(Specie,SpecieCategory, Notification, $mdDialog, $state, $scope, $timeout) {
    this.Specie           =  Specie;
    this.SpecieCategory   =  SpecieCategory;
    this.Notification     =  Notification;
    this.mdDialog         =  $mdDialog;
    this.state            =  $state;
    this.scope            =  $scope;
    this.timeout          =  $timeout;
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
    this.title = "Species";
    this.Specie.get(this.query, response =>  {
      this.specie = response.data;
    });
  }

  loadData(page, limit) {
    console.log("query: " + this.query);
    this.Specie.get(this.query, response =>  {
      this.Specie = response.data;
    });
  }

  getSpecieCategories() {
    return this.timeout(() =>  {
      this.SpecieCategory.get({}, response => {
        this.specieCategories =  response.data;
        return this.specieCategories;
      });
    }, 650);
  }

  closeDialog(e) {
    e.preventDefault();
    this.mdDialog.hide();
  }

  showAddSpecieDialog(event){
    console.log('the event is', event);
    this.mdDialog.show({
      controller          : SpecieController,
      controllerAs        : 'vm',
      template            : require('../views/add-new-specie.html'),
      clickOutsideToClose : false,
      preserveScope       : true,
      fullscreen          : true // Only for -xs, -sm breakpoints.
    });
  }

  showUpdateSpecieDialog(id){

    this.Specie.get({id: id}, response => {
      this.result = response.data;

      this.mdDialog.show({
        ccontroller         : SpecieController,
        controllerAs        : 'vm',
        scope               : this.scope,
        preserveScope       : true,
        template            : require('../views/edit-specie.html'),
        clickOutsideToClose : false,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  updateSpecie(Specie){
    this.Specie.update(Specie, response => {
      let message = response.message;
      if (response.status === 200) {
        this.mdDialog.hide();
        this.Notification.status(message);
        this.state.reload('species');
      } else {
        this.Notification.status(message);
        this.state.reload('species');
      }
    }, response => {
      this.Notification.status(response.data.errors);
      this.state.reload('species');
    });
  }

  createSpecie(specie) {
    let data, common_name, botanical_name,tags,specie_category_id;
    data = {
      common_name:        specie.common_name,
      botanical_name:     specie.botanical_name,
      tags:               specie.tags,
      specie_category_id: specie.specie_category_id,
    };

    this.Specie.save(data, response => {
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
      .title('Deleting Specie')
      .content('The Specie Will Be Deleted')
      .ok('Delete!')
      .cancel('Cancel')
      .targetEvent(e);

    this.mdDialog.show(confirm).then(() =>  {
      this.Specie.remove({id: id}, response => {
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

SpecieController.$inject = ['Specie', 'SpecieCategory', 'Notification', '$mdDialog', '$state', '$scope', '$timeout'];
export default SpecieController;
