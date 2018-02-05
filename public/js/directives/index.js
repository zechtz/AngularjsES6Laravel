'use strict';

import angular from 'angular';

import hamburger from './hamburger.directive';
import appHeader from './header.directive';

export default  angular.module('directives', [])
.directive('hamburger', hamburger)
.directive('appHeader', appHeader);
