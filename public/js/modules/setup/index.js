'use strict';

import angular                from 'angular';
import institution            from './institution';
import gfscategory            from './gfscategory';
import stationcategory        from './stationcategory';
import attractionsitecategory from './attractionsitecategory';
import locationhierarchy      from './locationhierarchy';
import location               from './location';
import speciecategory         from './speciecategory';
import geographicaldetail     from './attractionsitegeographicaldetail';
import specie                 from './specie';
import plot                   from './plot';
import attractionsitegrade    from './attractionsitegrade';

export default angular.module('setup', [
  'institution',
  'gfscategory',
  'stationcategory',
  'attractionsitecategory',
  'locationhierarchy',
  'location',
  'plot',
  'speciecategory',
  'specie',
  'geographicaldetail',
  'attractionsitegrade'
]);
