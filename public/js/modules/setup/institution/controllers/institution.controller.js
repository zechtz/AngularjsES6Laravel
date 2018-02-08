'use strict';

class InstitutionController {
  constructor(Institution, Notification, $mdDialog, $state, $scope, $timeout) {
    this.Institution      =  Institution;
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
    this.title = "Institutions Module";
    this.Institution.get(this.query, response =>  {
      this.institution = response.data;
    });
  }

  loadData() {
    const self = this;
    console.log(`query: ${self.query}`);
    self.Institution.get(self.query, response =>  {
      self.institution = response.data;
    });
  }

  closeDialog(e) {
    e.preventDefault();
    this.mdDialog.hide();
  }

  showAddInstitutionDialog(event){
    console.log('the event is', event);
    this.mdDialog.show({
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
      this.result = response.data;

      this.mdDialog.show({
        ccontroller         : InstitutionController,
        controllerAs        : 'vm',
        scope               : this.scope,
        preserveScope       : true,
        template            : require('../views/edit-institution.html'),
        clickOutsideToClose : false,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  updateInstitution(institution){
    this.Institution.update(institution, response => {
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

  createInstitution(institution) {
    let data, name, institution_id, phone, code, address, additional, email;
    data = {
      name                   : institution.name,
      institution_id         : institution.institution_id,
      phone_number           : institution.phone,
      sp_code                : institution.code,
      email                  : institution.email,
      address                : institution.address,
      additional_information : institution.additional,
    };

    this.Institution.save(data, response => {
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

  editInstitution(id){

    this.Institution.get({id: id}, response => {

      this.mdDialog.show({
        controller          : this,
        template            : require('../views/edit-institution.html'),
        clickOutsideToClose : false,
        preserveScope       : true,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  delete(e, id) {
    let confirm = this.mdDialog.confirm()
      .title('Deleting Institution')
      .content('The Institution Will Be Deleted')
      .ok('Delete!')
      .cancel('Cancel')
      .targetEvent(e);

    this.mdDialog.show(confirm).then(() =>  {
      this.Institution.remove({id: id}, response => {
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

InstitutionController.$inject = ['Institution', 'Notification', '$mdDialog', '$state', '$scope', '$timeout'];
export default InstitutionController;
