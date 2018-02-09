'use strict';

import angular               from 'angular';
import uirouter              from '@uirouter/angularjs';
import routes                from './specie.routes';

import Specie                from './specie.service';
import SpecieController      from './controllers/specie.controller';

export default angular.module('specie', ['ui.router'])
  .config(routes)
  .factory('Specie', Specie)
  .controller('SpecieController', SpecieController);
