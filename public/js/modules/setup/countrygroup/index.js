'use strict';

import angular               from 'angular';
import uirouter              from '@uirouter/angularjs';
import routes                from './countrygroup.routes';

import CountryGroup           from './countrygroup.service';
import CountryGroupController from './controllers/countrygroup.controller';

export default angular.module('countrygroup', ['ui.router'])
  .config(routes)
  .factory('CountryGroup', CountryGroup)
  .controller('CountryGroupController', CountryGroupController);
