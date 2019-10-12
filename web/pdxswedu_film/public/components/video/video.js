(function(angular) {
  'use strict';
function vidController($scope, $element, $attrs,  $http) {

  var ctrl = this;
  ctrl.vid = '';

  ctrl.$onInit = function() {
    ctrl.getVideo();
console.log("Video Controller initialized");
};

  ctrl.getVideo = function() {
    var req = {
      method: 'GET',
      url: "http://localhost:8100/film/video/",
    };
    $http(req).then(
        function mySuccess(response){
        ctrl.vid = response.data;
      },//end success
       function myError(response){
    ctrl.vid  = response.statusText;
      }//end myerror
    );//end then
  };
ctrl.balls = "My Balls"
//ctrl.vid = {url:"http://www.google.com"};

}//end vidController


angular.module('curioApp').component('curioVideo', {
  templateUrl: '/components/video/video.html',
  controller: vidController
});


})(window.angular);
