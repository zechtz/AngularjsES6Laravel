'use strict';

import angular        from 'angular';
import uirouter       from '@uirouter/angularjs';
import ngMaterial     from 'angular-material';
import ngMdIcons      from 'angular-material-icons';
import ngMessages     from 'angular-messages';
import ngAnimate      from 'angular-animate';
import ngSanitize     from 'angular-sanitize';
import checklistModel from 'checklist-model';
import mdDataTable    from 'md-data-table';

import appRoutes      from './app.routes';
import setup          from './modules/setup';

angular.module('portal', [
  'ui.router',
  'ngMaterial',
  'ngMessages',
  'ngMdIcons',
  'ngAnimate',
  'ngSanitize',
  'setup'
]).config(appRoutes);
