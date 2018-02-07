'use strict';

import angular from 'angular';

import 'lato-font/css/lato-font.min.css';
import 'angular-material/angular-material.css';
import 'angular-material-data-table/dist/md-data-table.css';
import 'angular-material-sidemenu/dest/angular-material-sidemenu.css';
import 'angular-material-icons/angular-material-icons.css';
import 'material-icons/css/material-icons.min.css';

import 'angular-material-sidemenu';
import 'angular-material-icons';
import 'angular-material';
import 'angular-resource';
import 'checklist-model';
import '@uirouter/angularjs';
import 'angular-material-data-table';
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
  'ngMdIcons',
  'ngResource',
  'md.data.table',
  'ngMaterialSidemenu',
  'checklist-model',
  'directives',
  'helpers',
  'setup'
]).controller('MainController', MainController).config(appRoutes);
