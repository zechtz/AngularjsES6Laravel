'use strict';

import angular  from 'angular';
import uirouter from '@uirouter/angularjs';

import instituionRoutes      from './institution.routes';
import institutionService    from './institution.service';
import InstitutionController from './controllers/InstitutionController';

export default angular.module('institution', ['ui.router'])
    .config(instituionRoutes)
    .factory(institutionService)
    .controller('InstitutionController', InstitutionController);
