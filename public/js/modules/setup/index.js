'use strict';

import angular           from 'angular';
import institution       from './institution';
import gfscategory       from './gfscategory';
import stationcategory   from './stationcategory';
import locationhierarchy from './locationhierarchy';
import location          from './location';
import countrygroup      from './countrygroup';

export default angular.module('setup', [
  'institution',
  'gfscategory',
  'stationcategory',
  'locationhierarchy',
  'location',
  'countrygroup'
]);
