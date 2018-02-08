'use strict';

export default ['$resource', function ($resource) {
    return $resource('api/v1/station-categories/:id', {}, {
      update : { method : 'PUT', params  : {id : '@id'}},
    }
  );
}];
