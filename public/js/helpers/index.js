'use strict';

import angular from 'angular';

import Notification from './notify.helpers';

export default angular.module('helpers', [])
.factory('Notification', Notification);
