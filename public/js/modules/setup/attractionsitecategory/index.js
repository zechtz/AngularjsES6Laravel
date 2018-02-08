'use strict';

import angular               from 'angular';
import uirouter              from '@uirouter/angularjs';
import routes                from './attractionsitecategory.routes';

import AttractionSiteCategory           from './attractionsitecategory.service';
import AttractionSiteCategoryController from './controllers/attractionsitecategory.controller';

export default angular.module('attractionsitecategory', ['ui.router'])
  .config(routes)
  .factory('AttractionSiteCategory', AttractionSiteCategory)
  .controller('AttractionSiteCategoryController', AttractionSiteCategoryController);
