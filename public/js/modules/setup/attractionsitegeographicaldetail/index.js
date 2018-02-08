'use strict';

import angular               from 'angular';
import uirouter              from '@uirouter/angularjs';
import routes                from './attractionsitegeographicaldetail.routes';

import GeographicalDetail           from './attractionsitegeographicaldetail.service';
import GeographicalDetailController from './controllers/geographicaldetail.controller';

export default angular.module('geographicaldetail', ['ui.router'])
  .config(routes)
  .factory('GeographicalDetail', GeographicalDetail)
  .controller('GeographicalDetailController', GeographicalDetailController);
