'use strict';

export default ['$resource', function ($resource) {
    return $resource('api/v1/locations/:id', {}, {
      update : { method : 'PUT', params  : {id : '@id'}},
      edit   : { method : 'GET', url: 'api/v1/locations/:id/edit', params  : {id : '@id'}},
    }
  );
}];
