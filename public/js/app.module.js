'use strict';

import angular    from 'angular';
import uirouter   from 'angular-ui-router';

import homeroutes from './app.routes';

angular.module('portal', ['ui.router'])
  .confing(homeroutes);
