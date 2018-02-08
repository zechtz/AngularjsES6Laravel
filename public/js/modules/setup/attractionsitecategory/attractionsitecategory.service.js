'use strict';

export default ['$resource', function ($resource) {
    return $resource('api/v1/attraction-site-categories/:id', {}, {
      update : { method : 'PUT', params  : {id : '@id'}},
    }
  );
}];
