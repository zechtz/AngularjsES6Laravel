'use strict';

import angular     from 'angular';
import institution from './institution';
import gfscategory from './gfscategory';
import stationcategory from './stationcategory';

export default angular.module('setup', ['institution', 'gfscategory','stationcategory','abc']);
