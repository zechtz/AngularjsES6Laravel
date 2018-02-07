'use strict';

import angular                from 'angular';
import institution            from './institution';
import gfscategory            from './gfscategory';
import stationcategory        from './stationcategory';
import attractionSiteCategory from './attractionsitecategory';

export default angular.module('setup', ['institution', 'gfscategory','stationcategory','attractionSiteCategory ']);