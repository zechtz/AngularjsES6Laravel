'use strict';

import angular from 'angular';

export default class InstitutionController {
  constructor(Institution, Notification, $mdDialog, $state) {
    this.Institution  =  Institution;
    this.Notification =  Notification;
    this.$mdDialog    =  $mdDialog;
    this.$state       =  $state;
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
      this.institutions = response.data;
    });
  }

  closeDialog(e) {
    e.preventDefault();
    this.$mdDialog.hide();
  }

  showAddInstitutionDialog(event){
    console.log('the event is', event);
    this.$mdDialog.show({
      controller          : InstitutionController,
      controllerAs        : 'vm',
      template            : require('../views/add-new-institution.html'),
      clickOutsideToClose : false,
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
        template            : require('../views/edit-institution.html'),
        clickOutsideToClose : false,
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
        this.Notification.status(message);
        this.$state.reload();
      } else {
        this.Notification.status(message);
        this.$state.reload();
      }
    });
  }

  createInstitution(institution) {
    let data, name, parent, phone, code, address, additional, email;
    data = {
      name                   : institution.name,
      institution_id         : institution.parent,
      phone_number           : institution.phone,
      sp_code                : institution.code,
      email                  : institution.email,
      additional_information : institution.additional,
    };

    this.Institution.save(data, response => {
      console.log(response);
      var message = response.message;
      if (response.status === 201) {
        this.Notification.status(message);
        this.$state.reload();
      } else {
        this.Notification.status(message);
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
        template            : require('../views/edit-institution.html'),
        clickOutsideToClose : false,
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
          this.Notification.status(message);
        } else {
          this.$state.reload();
          this.Notification.status(message);
        }
      }, response  =>  {
        this.$state.reload();
        this.Notification.status(response.message);
      });
    });
  }
}
