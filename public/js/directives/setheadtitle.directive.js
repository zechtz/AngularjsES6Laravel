'use strict';

export default function setHeadTitle() {
  return {
    link: function(scope, elm, attrs, ctrl) {
      var broadcastTitle = function(title) {
        if (title)
          console.log('broadcasting title', title);
          scope.$emit('sendHeadTitle', title);
      };
      scope.$watch('title', broadcastTitle);
    }
  };
}
