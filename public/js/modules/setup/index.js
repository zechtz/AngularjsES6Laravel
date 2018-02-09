'use strict';

import angular                from 'angular';
import institution            from './institution';
import gfscategory            from './gfscategory';
import stationcategory        from './stationcategory';
import locationhierarchy      from './locationhierarchy';
import location               from './location';
import countrygroup           from './countrygroup';
import speciecategory         from './speciecategory';
import specie                 from './specie';
import attractionsitecategory from './attractionsitecategory';
import plot                   from './plot';
import attractionsitegrade    from './attractionsitegrade';
import geographicaldetail     from './attractionsitegeographicaldetail';

export default angular.module('setup', [
  'institution',
  'gfscategory',
  'stationcategory',
  'attractionsitecategory',
  'locationhierarchy',
  'location',
  'countrygroup',
  'plot',
  'speciecategory',
  'specie',
  'geographicaldetail',
  'attractionsitegrade',
  'countrygroup',
  'plot',
  'speciecategory',
  'specie'
]);
