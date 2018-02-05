'use strict';

export default function appHeader() {
  return {
    restrict: 'E',
    scope: false,
    replace: true,
    templateUrl: '/js/directives/app-header.html'
  };
}
