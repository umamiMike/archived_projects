studentSignIn.factory('UtilitiesFactory',function(){
  return {
    findById: function(collection,id){
      for(var i = 0; i < collection.length;i++){
        if (collection[i].id == id){
          return collection[i];
        }//end if
      }//end for
    return null;
    }//end function
  }
});
