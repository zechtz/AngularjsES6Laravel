'use strict';

export default ['$resource', function ($resource) {
    return $resource('api/v1/location-hierarchies/:id', {}, {
      update : { method : 'PUT', params  : {id : '@id'}},
    }
  );
}];
