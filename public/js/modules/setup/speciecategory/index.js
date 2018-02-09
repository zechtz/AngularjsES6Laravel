'use strict';

import angular               from 'angular';
import uirouter              from '@uirouter/angularjs';
import routes                from './speciecategory.routes';

import SpecieCategory           from './speciecategory.service';
import SpecieCategoryController from './controllers/speciecategory.controller';

export default angular.module('speciecategory', ['ui.router'])
  .config(routes)
  .factory('SpecieCategory', SpecieCategory)
  .controller('SpecieCategoryController', SpecieCategoryController);
