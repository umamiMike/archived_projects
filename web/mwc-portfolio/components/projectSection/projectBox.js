(function(angular){
    'use strict';

angular.module('portfolioApp',[])
  .component('projectBox', {

  transclude:true,
  controller: function(){
    var ctrl = this;
    ctrl.projects =
        {
        category : 'some thing categorical',
        description : "The Description of the project",
        num : '1',
        url: 'http://mwc.space'
      }
    ;// end projects


  },
  templateUrl: '/components/projectSection/project.html'

  });//end component
 })(window.angular);
