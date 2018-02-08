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
            "link"  : "/#!/station-categories",
            "title" : "Station Categories",
            "state" : "station-categories",
            "icon"  : "flip_to_back"
          },
          {
            "link"  : "/#!/location-hierarchies",
            "title" : "Location Hierarchies",
            "state" : "location-hierarchies",
            "icon"  : "flip_to_back"
          },
          {
            "link"  : "/#!/locations",
            "title" : "Locations",
            "state" : "locations",
            "icon"  : "flip_to_back"
          },
          {
            "link"  : "/#!/stations",
            "title" : "Stations",
            "state" : "stations",
            "icon"  : "flip_to_back"
          },
          {
            "link"  : "/#!/country-groups",
            "title" : "Country Groups",
            "state" : "country-groups",
            "icon"  : "flip_to_back"
          },
          {
            "link"  : "/#!/countries",
            "title" : "Countries",
            "state" : "countries",
            "icon"  : "flip_to_back"
          },
          {
            "link"  : "/#!/specie-categories",
            "title" : "Specie Categories",
            "state" : "specie-categories",
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
