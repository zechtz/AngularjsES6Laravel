'use strict';

export default ['$resource', function ($resource) {
    return $resource('api/v1/attraction-sites-geographical-details/:id', {}, {
      update : { method : 'PUT', params  : {id : '@id'}},
    }
  );
}];
