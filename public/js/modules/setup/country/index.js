'use strict';

import angular               from 'angular';
import uirouter              from '@uirouter/angularjs';
import routes                from './stationcategory.routes';

import StationCategory           from './stationcategory.service';
import StationCategoryController from './controllers/stationcategory.controller';

export default angular.module('stationcategory', ['ui.router'])
  .config(routes)
  .factory('StationCategory', StationCategory)
  .controller('StationCategoryController', StationCategoryController);
