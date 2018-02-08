'use strict';

export default ['$mdToast', function ($mdToast) {
  return {
    status : function(message) {
      $mdToast.show($mdToast.simple()
        .position('top right')
        .content(message)
        .action('OK')
        .highlightAction(true)
        .hideDelay(10000));
    }
  };
}];
