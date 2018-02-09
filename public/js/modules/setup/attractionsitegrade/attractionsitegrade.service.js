'use strict';

export default ['$resource', function ($resource) {
    return $resource('api/v1/attraction-site-grades/:id', {}, {
      update : { method : 'PUT', params  : {id : '@id'}},
    }
  );
}];
