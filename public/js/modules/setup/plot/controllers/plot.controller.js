'use strict';

class PlotController {
  constructor(Plot, Notification, $mdDialog, $state, $scope, $timeout) {
    this.Plot             =  Plot;
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
    this.title = "Plots Module";
    this.Plot.get(this.query, response =>  {
      this.plot = response.data;
    });
  }

  loadData () {
    this.Plot.get(this.query, response =>  {
      this.plot = response.data;
    });
  }

  closeDialog(e) {
    e.preventDefault();
    this.mdDialog.hide();
  }

  showAddPlotDialog(event){
    console.log(`clicked, the event is: ${event}`);

    this.mdDialog.show({
      controller          : PlotController,
      controllerAs        : 'vm',
      template            : require('../views/add-new-plot.html'),
      clickOutsideToClose : false,
      preserveScope       : true,
      fullscreen          : true // Only for -xs, -sm breakpoints.
    });
  }

  showUpdatePlotDialog(id){

    this.Plot.get({id: id}, response => {
      this.result = response.data;

      this.mdDialog.show({
        ccontroller         : PlotController,
        controllerAs        : 'vm',
        scope               : this.scope,
        preserveScope       : true,
        template            : require('../views/edit-plot.html'),
        clickOutsideToClose : false,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  updatePlot(plot){
    this.Plot.update(plot, response => {
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

  createPlot(plot) {
    let data, calendar_event_id, specie_id, attraction_site_id, quantity;
    data = {
      calendar_event_id      : plot.name,
      specie_id              : plot.specie_id,
      attraction_site_id     : plot.attraction_site_id,
      quantity               : plot.quantity,
    };

    this.Plot.save(data, response => {
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

  editPlot(id){

    this.Plot.get({id: id}, response => {

      this.mdDialog.show({
        controller          : this,
        template            : require('../views/edit-plot.html'),
        clickOutsideToClose : false,
        preserveScope       : true,
        fullscreen          : true // Only for -xs, -sm breakpoints.
      });
    });
  }

  delete(e, id) {
    let confirm = this.mdDialog.confirm()
      .title('Deleting Plot')
      .content('The Plot Will Be Deleted')
      .ok('Delete!')
      .cancel('Cancel')
      .targetEvent(e);

    this.mdDialog.show(confirm).then(() =>  {
      this.Plot.remove({id: id}, response => {
        let message = response.message;
        if (response.status === 200) {
          this.state.reload();
          this.Notification.status(message);
        } else {
          this.state.reload();
          this.Notification.status(message);
        }
      }, response  =>  {
        this.Notification.status(response.data.message);
      });
    });
  }
}

PlotController.$inject = ['Plot', 'Notification', '$mdDialog', '$state', '$scope', '$timeout'];
export default PlotController;
