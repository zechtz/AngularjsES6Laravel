'use strict';

import angular from 'angular';

import 'angular-material/angular-material.css';
import 'angular-material-sidemenu';
import 'angular-material-icons';
import 'angular-material';
import 'angular-sanitize';
import 'angular-messages';
import 'angular-resource';
import 'angular-animate';
import 'md-data-table';
import 'checklist-model';
import '@uirouter/angularjs';
import 'ng-inject';

import appRoutes      from './app.routes';
import MainController from './app.controller';
import setup          from './modules/setup';
import directives     from './directives';

angular.module('portal', [
  'ui.router',
  'ngMaterial',
  'ngMessages',
  'ngMdIcons',
  'ngAnimate',
  'ngSanitize',
  'ngResource',
  'ngMaterialSidemenu',
  'directives',
  'setup'
]).controller('MainController', MainController).config(appRoutes);
