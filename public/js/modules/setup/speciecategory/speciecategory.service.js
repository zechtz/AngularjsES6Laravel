'use strict';

export default ['$resource', function ($resource) {
    return $resource('api/v1/specie-categories/:id', {}, {
      update : { method : 'PUT', params  : {id : '@id'}},
    }
  );
}];
