'use strict';

export default class MasterController {
  constructor($mdSidenav, $mdMedia) {
      this.$mdSidenav  =  $mdSidenav;
      this.$mdMedia    =  $mdMedia;
      this.leftSidebar =  false;
  }

  swipeLeft() {
    this.$mdSidenav('left').toggle().then(function(){
    });
  }

  showHamburger() {
    return (!this.leftSidebar || !this.$mdMedia('gt-md'));
  }

  showLeft() {
    this.leftSidebar = true;
    this.$mdSidenav('left').open().then(function() {
    });
  }

  closeLeft() {
    this.$mdSidenav('left').close().then(function() {
      this.leftSidebar = false;
    });
  }

  toggleSidenav(menuId) {
    this.$mdSidenav(menuId).toggle();
  }
}

MasterController.$inject = ['$mdSidenav', '$mdMedia'];
