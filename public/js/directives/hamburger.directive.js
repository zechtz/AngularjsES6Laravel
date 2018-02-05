'use strict';

export default function hamburger() {
  return {
    restrict: 'E',
    scope: false,
    replace: true,
    template: '<md-button ng-if="showHamburger()" ng-click="showLeft()" class="hamburger">'+
    '<ng-md-icon icon="menu" size="48"></ng-md-icon>'+
    '</md-button>'
  };
}
