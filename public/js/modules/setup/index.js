'use strict';

import angular     from 'angular';
import institution from './institution';
import gfscategory from './gfscategory';
import stationcategory from './stationcategory';
import attractionsitecategory from './attractionsitecategory';
import locationhierarchy from './locationhierarchy';
import location          from './location';
import speciecategory    from './speciecategory';
import geographicaldetail from './attractionsitegeographicaldetail';

export default angular.module('setup', ['institution', 'gfscategory','stationcategory','attractionsitecategory','geographicaldetail']);
