'use strict';

import angular from 'angular';

import 'angular-material/angular-material.css';
import 'md-data-table/dist/md-data-table-style.css';
import 'lato-font/css/lato-font.min.css';
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
import 'angularjs-perfect-scrollbar';
import '../css/app.css';

import appRoutes      from './app.routes';
import MainController from './app.controller';
import setup          from './modules/setup';
import directives     from './directives';
import helpers        from './helpers';

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
  'helpers',
  'setup'
]).controller('MainController', MainController).config(appRoutes);
