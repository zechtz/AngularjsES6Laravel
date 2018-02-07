'use strict';

export default class MainController {

  constructor($mdSidenav, $mdMedia) {
    this.$mdSidenav        =  $mdSidenav;
    this.$mdMedia          =  $mdMedia;
    this.leftSidebar       =  true;
    this.isOpen            =  false;
    this.topDirections     =  ['left', 'up'];
    this.bottomDirections  =  ['down', 'right'];
    this.availableModes    =  ['md-fling', 'md-scale'];
    this.selectedMode      =  'md-fling';
    this.selectedDirection =  'up';
    this.title             =  "Setup Module";
    this.menu              =  [
      {
        "link"  : "/",
        "title" : "Setup Module",
        "state" : "institutions",
        "icon"  : "home",
        "type"  : "group",
        "pages" : [
          {
            "link"  : "/#!/institutions",
            "title" : "Institutions",
            "state" : "institutions",
            "icon"  : "launch"
          },
          {
            "link"  : "/#!/gfs-categories",
            "title" : "GFS Categories",
            "state" : "gfs-categories",
            "icon"  : "flip_to_back"
          },
          {
            "link"  : "/#!/station-categories",
            "title" : "Station Categories",
            "state" : "station-categories",
            "icon"  : "flip_to_back"
          },
          {
            "link"  : "/#!/attraction-site-categories",
            "title" : "Attraction Site Categories",
            "state" : "attraction-site-categories",
            "icon"  : "flip_to_back"
          }
        ]
      },
    ];
  }

  swipeLeft() {
    this.$mdSidenav('left').toggle().then(() => {
    });
  }

  showHamburger() {
    return (!this.leftSidebar || !this.$mdMedia('gt-md'));
  }

  showLeft() {
    this.leftSidebar = true;
    this.$mdSidenav('left').open().then( () =>  {
    });
  }

  closeLeft() {
    this.$mdSidenav('left').close().then( () =>  {
      this.leftSidebar = false;
    });
  }

  toggleSidenav(menuId) {
    this.$mdSidenav(menuId).toggle();
  }
}
