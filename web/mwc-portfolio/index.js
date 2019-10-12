(function(angular) {
    'use strict';
angular.module('portfolioApp', [])
  .controller('appController', function(){
        this.hero = {
            name: "Spawn",
            balls: "Big"
        };
    });
})(window.angular);
