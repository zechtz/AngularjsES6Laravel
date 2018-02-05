'use strict';

export default function hamburger() {
  return {
    restrict: 'E',
    scope: false,
    replace: true,
    template : require('./hamburger.directive.html')
  };
}
