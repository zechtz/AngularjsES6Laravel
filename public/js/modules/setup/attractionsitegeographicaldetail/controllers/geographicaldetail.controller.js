'use strict';

class GeographicalDetailController {
  constructor(GeographicalDetail,AttractionSite, Notification, $mdDialog, $state, $scope, $timeout) {
    this.GeographicalDetail =  GeographicalDetail;
    this.Notification    =  Notification;
    this.mdDialog        =  $mdDialog;
    this.state           =  $state;
    this.timeout         =  $timeout;
    this.scope           =  $scope;
    this.limitOptions    =  [10, 15, 20, 50, 100, 200, 500];
    this.selected        =  [];
    this.loadData        =  this.loadData.bind(this);

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
    this.title = "Geographical Details";
    this.GeographicalDetail.get(this.query, response =>  {
      this.attractionSites = response.data;
    });
  }

  loadAttractionSites(){
    this.AttractionSite.get(this.query, response => {
      this.attractionSites = response.data;
    });
  }

  loadData() {
    this.GeographicalDetail.get(this.query, response =>  {
      this.details = response.data;
    });
  }

  closeDialog(e) {
    e.preventDefault();
    this.mdDialog.hide();
  }

  showAddGeographicalDetailDialog(event){
    console.log('the event is', event);
    this.mdDialog.show({
      controller          : GeographicalDetailController,
      controllerAs        : 'vm',
      template            : require('../views/add-new-geographical-detail.html'),
      clickOutsideToClose : false,
      preserveScope       : true,
      fullscreen          : true // Only for -xs, -sm breakpoints.
    });
  }

  showUpdateGeographicalDetailDialog(id){
    this.GeographicalDetail.get({id: id}, response => {
      this.result = response.data;

      this.mdDialog.show({
        controller         : GeographicalDetailController,
        controllerAs        : 'vm',
        scope               : this.scope,
        preserveScope       : true,
        template            : require('../views/edit-geographical-detail.html'),
        clickOutsideToClose : false,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  updateGeographicalDetail(GeographicalDetail){
    this.GeographicalDetail.update(GeographicalDetail, response => {
      let message = response.message;
      if (response.status === 200) {
        this.mdDialog.hide();
        this.Notification.status(message);
        this.state.reload('station-categories');
      } else {
        this.Notification.status(message);
        this.state.reload('station-categories');
      }
    }, response => {
      this.Notification.status(response.data.errors);
      this.state.reload('station-categories');
    });
  }

  createGeographicalDetail(detail) {
    let data, latitude,longitude, shape_file_path, attraction_site_id;
    data = {
      name                : detail.latitude,
      latitude            : detail.longitude,
      shape_file_path     : detail.shape_file_path,
      attraction_site_id  : detail.attraction_site_id
    };

    this.GeographicalDetail.save(data, response => {
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

  editGeographicalDetail(id){
    this.GeographicalDetail.get({id: id}, response => {
      this.mdDialog.show({
        controller          : this,
        template            : require('../views/edit-geographical-detail.html'),
        clickOutsideToClose : false,
        preserveScope       : true,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  delete(e, id) {
    let confirm = this.mdDialog.confirm()
      .title('Deleting Geographical Detail')
      .content('The Geographical Detail Will Be Deleted')
      .ok('Delete!')
      .cancel('Cancel')
      .targetEvent(e);

    this.mdDialog.show(confirm).then(() =>  {
      this.GeographicalDetail.remove({id: id}, response => {
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
