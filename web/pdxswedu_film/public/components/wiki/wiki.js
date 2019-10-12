(function(angular) {
  'use strict';
  function wikiController($scope, $element, $attrs) {
    var ctrl = this;
    this.$onInit = function() {
            console.log('wiki component initialized');
          };

          ctrl.wikiData = "This is an example of text you might use in the wiki page";

}
angular.module('curioApp').component('curioWiki', {
  templateUrl: '/components/wiki/wiki.html',
  controller: wikiController
});
})(window.angular);
