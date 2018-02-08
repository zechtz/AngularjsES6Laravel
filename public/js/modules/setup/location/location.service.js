'use strict';

export default ['$resource', function ($resource) {
    return $resource('api/v1/locations/:id', {}, {
      update : { method : 'PUT', params  : {id : '@id'}},
    }
  );
}];
