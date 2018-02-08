'use strict';

export default function appHeader() {
  return {
    restrict : 'E',
    scope    : false,
    replace  : true,
    template : require('./app-header.html')
  };
}
