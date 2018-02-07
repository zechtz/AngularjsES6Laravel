'use strict';

export default function headTitle() {
  return {
    restrict: 'A',
    link: function(scope, elm, attrs, ctrl) {
      scope.$on('sendHeadTitle', function(e, title) {
        console.log('received a new title', title);
        elm[0].innerHTML = 'MNRT Portal - ' + title;
      });
    }
  };
}
