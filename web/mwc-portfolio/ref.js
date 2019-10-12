.component('myTabs', {
    transclude: true,
    controller: function() {
      var panes = this.panes = [];
      this.select = function(pane) {
        angular.forEach(panes, function(pane) {
          pane.selected = false;
        });
        pane.selected = true;
      };
      this.addPane = function(pane) {
        if (panes.length === 0) {
          this.select(pane);
        }
        panes.push(pane);
      };
    },
    templateUrl: 'my-tabs.html'
  })
