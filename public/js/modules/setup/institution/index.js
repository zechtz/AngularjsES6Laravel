'use strict';

import angular  from 'angular';
import uirouter from '@uirouter/angularjs';

import routes                from './institution.routes';
import Institution           from './institution.service';
import InstitutionController from './controllers/institution.controller';

export default angular.module('institution', ['ui.router'])
  .config(routes)
  .factory('Institution', Institution)
  .controller('InstitutionController', InstitutionController);
