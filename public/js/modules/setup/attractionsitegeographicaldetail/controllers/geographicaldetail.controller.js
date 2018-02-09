'use strict';

class GeographicalDetailController {
  constructor(GeographicalDetail, Notification, $mdDialog, $state, $scope, $timeout) {
    this.Detail       =  GeographicalDetail;
    this.Notification =  Notification;
    this.mdDialog     =  $mdDialog;
    this.state        =  $state;
    this.scope        =  $scope;
    this.limitOptions =  [10, 15, 20, 50, 100, 200, 500];
    this.selected     =  [];
    this.loadData     =  this.loadData.bind(this);

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
    this.title = "GeographicalDetails Module";
    this.Detail.get(this.query, response =>  {
      this.detail = response.data;
    });
  }

  loadData () {
    console.log(`query: ${this.query}`);
    this.Detail.get(this.query, response =>  {
      console.log(response);
      this.detail = response.data;
    });
  }

  closeDialog(e) {
    e.preventDefault();
    this.mdDialog.hide();
  }

  showAddGeographicalDetailDialog(event){
    this.mdDialog.show({
      controller          : GeographicalDetailController,
      controllerAs        : 'vm',
      template            : require('../views/add-new-geographical-detail.html'),
      clickOutsideToClose : false,
      preserveScope       : true,
      fullscreen          : true // Only for -xs, -sm breakpoints.
    });
  }

  showUpdateDialog(id){

    this.Detail.get({id: id}, response => {
      this.result = response.data;

      this.mdDialog.show({
        ccontroller         : GeographicalDetailController,
        controllerAs        : 'vm',
        scope               : this.scope,
        preserveScope       : true,
        template            : require('../views/edit-geographical-detail.html'),
        clickOutsideToClose : false,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  update(detail){
    this.Detail.update(detail, response => {
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

  create(detail) {
    this.Detail.save(detail, response => {
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
      .title('Deleting GeographicalDetail')
      .content('The GeographicalDetail Will Be Deleted')
      .ok('Delete!')
      .cancel('Cancel')
      .targetEvent(e);

    this.mdDialog.show(confirm).then(() =>  {
      this.Detail.remove({id: id}, response => {
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

GeographicalDetailController.$inject = ['GeographicalDetail', 'Notification', '$mdDialog', '$state', '$scope', '$timeout'];
export default GeographicalDetailController;
