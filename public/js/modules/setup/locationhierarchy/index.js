'use strict';

import angular               from 'angular';
import uirouter              from '@uirouter/angularjs';
import routes                from './locationhierarchy.routes';

import LocationHierarchy           from './locationhierarchy.service';
import LocationHierarchyController from './controllers/locationhierarchy.controller';

export default angular.module('locationhierarchy', ['ui.router'])
  .config(routes)
  .factory('LocationHierarchy', LocationHierarchy)
  .controller('LocationHierarchyController', LocationHierarchyController);
