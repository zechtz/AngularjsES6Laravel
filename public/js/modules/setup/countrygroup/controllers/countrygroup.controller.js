'use strict';

class CountryGroupController {
  constructor(CountryGroup, Notification, $mdDialog, $state, $scope, $timeout) {
    this.CountryGroup      =  CountryGroup;
    this.Notification     =  Notification;
    this.mdDialog         =  $mdDialog;
    this.state            =  $state;
    this.scope            =  $scope;
    this.timeout          =  $timeout;
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
    this.title = "Country Groups";
    this.CountryGroup.get(this.query, response =>  {
      this.countryGroup = response.data;
    });
  }

  loadData(page, limit) {
    console.log("query: " + this.query);
    this.CountryGroup.get(this.query, response =>  {
      this.countryGroup = response.data;
    });
  }

  closeDialog(e) {
    e.preventDefault();
    this.mdDialog.hide();
  }

  showAddCountryGroupDialog(event){
    console.log('the event is', event);
    this.mdDialog.show({
      controller          : CountryGroupController,
      controllerAs        : 'vm',
      template            : require('../views/add-new-countrygroup.html'),
      clickOutsideToClose : false,
      preserveScope       : true,
      fullscreen          : true // Only for -xs, -sm breakpoints.
    });
  }

  showUpdateCountryGroupDialog(id){

    this.CountryGroup.get({id: id}, response => {
      this.result = response.data;
      this.mdDialog.show({
        ccontroller         : CountryGroupController,
        controllerAs        : 'vm',
        scope               : this.scope,
        preserveScope       : true,
        template            : require('../views/edit-countrygroup.html'),
        clickOutsideToClose : false,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  updateCountryGroup(CountryGroup){
    this.CountryGroup.update(CountryGroup, response => {
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

  createCountryGroup(countryGroup) {
    let data, name;
    data = {
      name        : countryGroup.name,
    };

    this.CountryGroup.save(data, response => {
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

  editCountryGroup(id){

    this.CountryGroup.get({id: id}, response => {
      this.mdDialog.show({
        controller          : this,
        template            : require('../views/edit-countrygroup.html'),
        clickOutsideToClose : false,
        preserveScope       : true,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  delete(e, id) {
    let confirm = this.mdDialog.confirm()
      .title('Deleting Station Category')
      .content('The Country Group Will Be Deleted')
      .ok('Delete!')
      .cancel('Cancel')
      .targetEvent(e);

    this.mdDialog.show(confirm).then(() =>  {
      this.CountryGroup.remove({id: id}, response => {
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

CountryGroupController.$inject = ['CountryGroup', 'Notification', '$mdDialog', '$state', '$scope', '$timeout'];
export default CountryGroupController;
