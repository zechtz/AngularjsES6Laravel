'use strict';

export default ['$resource', function ($resource) {
    return $resource('api/v1/plots/:id', {}, {
      update : { method : 'PUT', params  : {id : '@id'}},
    }
  );
}];
