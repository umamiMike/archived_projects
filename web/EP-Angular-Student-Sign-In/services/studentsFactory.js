studentSignIn.factory('studentsFactory', function studentsFactory(){
  var factory = {};

factory.students = []


//student stuffing using
for (var i = 0; i < 80;i++){
  var thisName = chance.name();
  var thisStyle = chance.color()
  factory.students.push({name:thisName, signedIn:false,myColor:thisStyle});
}
return factory;

});
