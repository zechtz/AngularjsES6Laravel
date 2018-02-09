'use strict';

import angular               from 'angular';
import uirouter              from '@uirouter/angularjs';
import routes                from './attractionsitegrade.routes';

import AttractionSiteGrade           from './attractionsitegrade.service';
import AttractionSiteGradeController from './controllers/attractionsitegrade.controller';

export default angular.module('attractionsitegrade', ['ui.router'])
  .config(routes)
  .factory('AttractionSiteGrade', AttractionSiteGrade)
  .controller('AttractionSiteGradeController', AttractionSiteGradeController);
