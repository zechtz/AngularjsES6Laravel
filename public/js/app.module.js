'use strict';

import angular    from 'angular';
import uirouter   from '@uirouter/angularjs';

import homeroutes from './app.routes';

angular.module('portal', ['ui.router'])
  .config(homeroutes);
