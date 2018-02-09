'use strict';

class AttractionSiteGradeController {
  constructor(AttractionSiteGrade, Notification, $mdDialog, $state, $scope, $timeout) {
    this.AttractionSiteGrade      =  AttractionSiteGrade;
    this.Notification             =  Notification;
    this.mdDialog                 =  $mdDialog;
    this.state                    =  $state;
    this.scope                    =  $scope;
    this.limitOptions             =  [10, 15, 20, 50, 100, 200, 500];
    this.selected                 =  [];
    this.loadData                 =  this.loadData.bind(this);

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
    this.title = "Attraction Site Grades";
    this.AttractionSiteGrade.get(this.query, response =>  {
      this.grades = response.data;
    });
  }

  loadData () {
    console.log(`query: ${this.query}`);
    this.AttractionSiteGrade.get(this.query, response =>  {
      console.log(response);
      this.AttractionSiteGrade = response.data;
    });
  }

  closeDialog(e) {
    e.preventDefault();
    this.mdDialog.hide();
  }

  showAddGradeDialog(event){
    console.log('the event is', event);
    this.mdDialog.show({
      controller          : AttractionSiteGradeController,
      controllerAs        : 'vm',
      template            : require('../views/attraction-site-grade.html'),
      clickOutsideToClose : false,
      preserveScope       : true,
      fullscreen          : true // Only for -xs, -sm breakpoints.
    });
  }

  showUpdateGradeDialog(id){
    this.AttractionSiteGrade.get({id: id}, response => {
      this.result = response.data;
      this.mdDialog.show({
        controller         : AttractionSiteGradeController,
        controllerAs        : 'vm',
        scope               : this.scope,
        preserveScope       : true,
        template            : require('../views/edit-attraction-site-grade.html'),
        clickOutsideToClose : false,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  updateGrade(grade){
    this.AttractionSiteGrade.update(grade, response => {
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

  createGrade(grade) {
    let data, name;
    data = {
      name : grade.name,
    };

    this.AttractionSiteGrade.save(data, response => {
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
    this.AttractionSiteGrade.get({id: id}, response => {
      this.mdDialog.show({
        controller          : this,
        template            : require('../views/edit-attraction-site-grade.html'),
        clickOutsideToClose : false,
        preserveScope       : true,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  delete(e, id) {
    let confirm = this.mdDialog.confirm()
      .title('Deleting Grade')
      .content('The Grade Will Be Deleted')
      .ok('Delete!')
      .cancel('Cancel')
      .targetEvent(e);

    this.mdDialog.show(confirm).then(() =>  {
      this.AttractionSiteGrade.remove({id: id}, response => {
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

AttractionSiteGradeController.$inject = ['AttractionSiteGrade', 'Notification', '$mdDialog', '$state', '$scope', '$timeout'];
export default AttractionSiteGradeController;
