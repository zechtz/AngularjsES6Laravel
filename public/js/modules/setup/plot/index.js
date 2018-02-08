'use strict';

import angular               from 'angular';
import uirouter              from '@uirouter/angularjs';
import routes                from './plot.routes';

import Plot           from './plot.service';
import PlotController from './controllers/plot.controller';

export default angular.module('plot', ['ui.router'])
  .config(routes)
  .factory('Plot', Plot)
  .controller('PlotController', PlotController);
