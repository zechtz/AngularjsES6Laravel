'use strict';

export default ['$resource', function ($resource) {
    return $resource('api/v1/country-groups/:id', {}, {
      update : { method : 'PUT', params  : {id : '@id'}},
    }
  );
}];
