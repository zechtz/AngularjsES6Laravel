'use strict';

import angular               from 'angular';
import uirouter              from '@uirouter/angularjs';
import routes                from './gfscategory.routes';

import GfsCategory           from './gfscategory.service';
import GfsCategoryController from './controllers/gfscategory.controller';

export default angular.module('gfscategory', ['ui.router'])
  .config(routes)
  .factory('GfsCategory', GfsCategory)
  .controller('GfsCategoryController', GfsCategoryController);
