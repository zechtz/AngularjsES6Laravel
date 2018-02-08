'use strict';

import angular               from 'angular';
import uirouter              from '@uirouter/angularjs';
import routes                from './location.routes';

import Location           from './location.service';
import LocationController from './controllers/location.controller';

export default angular.module('location', ['ui.router'])
  .config(routes)
  .factory('Location', Location)
  .controller('LocationController', LocationController);
