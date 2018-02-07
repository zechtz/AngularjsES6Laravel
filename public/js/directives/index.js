'use strict';

import angular from 'angular';

import hamburger    from './hamburger.directive';
import appHeader    from './header.directive';
import avatar       from './avatar.directive';
import headTitle    from './headtitle.directive';
import setHeadTitle from './setheadtitle.directive';

export default  angular.module('directives', [])
  .directive('hamburger', hamburger)
  .directive('appHeader', appHeader)
  .directive('avatar', avatar)
  .directive('headTitle', headTitle)
  .directive('setHeadTitle', setHeadTitle);
