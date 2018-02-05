'use strict';

import angular from 'angular';

export default class InstitutionController {
  constructor(Institution, Notification, $mdDialog, $state) {
    this.Institution  =  Institution;
    this.Notification =  Notification;
    this.$mdDialog    =  this.$mdDialog;
    this.$state       =  this.$state;
    this.limitOptions =  [10, 15, 20, 50, 100, 200, 500];
    this.selected     =  [];

    this.options = {
      rowSelection    : false,
      multiSelect     : true,
      autoSelect      : true,
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
  }

  $onInit() {
    this.title = "Institutions Module";
    this.Institution.get(this.query, response =>  {
        console.log(response);
    });
  }

  closeDialog(e) {
    e.preventDefault();
    this.this.$mdDialog.hide();
  }

  showAddInstitutionDialog(event){

    this.$mdDialog.show({
      controller          : this,
      templateUrl         : 'templates/bank-accounts/add-bank-account.html',
      clickOutsideToClose : true,
      preserveScope       : true,
      fullscreen          : true // Only for -xs, -sm breakpoints.
    });
  }

  showUpdateInstitutionDialog(id){

    this.Institution.get({id: id}, response => {

      let theId     =  id;
      let bank_name =  response.data.bank_name;
      let account   =  response.data.account;

      this.$mdDialog.show({
        controller          : this,
        templateUrl         : 'templates/bank-accounts/edit-bank-account.html',
        clickOutsideToClose : true,
        preserveScope       : true,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  updateAccount(){
    let id, account, bank_name;
    let data = {
      id        : id,
      account   : account,
      bank_name : bank_name
    };

    this.Institution.update(data, response => {
      let message = response.message;
      if (response.status === 200) {
        this.Notification.notify(message);
        this.$state.reload();
      } else {
        this.Notification.notify(message);
        this.$state.reload();
      }
    });
  }

  createInstitution() {
    let data, bank_name, account;
    data = {
      bank_name : bank_name,
      account   : account
    };

    this.Institution.save(data, response => {
      console.log(response);
      var message = response.message;
      if (response.status === 201) {
        this.Notification.notify(message);
        this.$state.reload();
      } else {
        this.Notification.notify(message);
        this.$state.reload();
      }
    });
  }

  editInstitution(id){

    this.Institution.get({id: id}, response => {

      let bank_name =  response.data.bank_name;
      let account   =  response.data.account;
      id            =  id;

      this.$mdDialog.show({
        controller          : this,
        templateUrl         : 'templates/bank-accounts/edit-bank-account.html',
        clickOutsideToClose : true,
        preserveScope       : true,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  delete(e, id) {
    let confirm = this.$mdDialog.confirm()
      .title('Deleting Institution')
      .content('The Institution Will Be Deleted')
      .ok('Delete!')
      .cancel('Cancel')
      .targetEvent(e);

    this.$mdDialog.show(confirm).then(function() {
      this.Institution.remove({id: id}, response => {
        let message = response.message;
        if (response.status === 200) {
          this.$state.reload();
          this.Notification.notify(message);
        } else {
          this.$state.reload();
          this.Notification.notify(message);
        }
      }, response  =>  {
        this.$state.reload();
        this.Notification.notify(response.message);
      });
    });
  }
}
