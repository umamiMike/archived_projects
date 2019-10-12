studentSignIn.controller('studentsController', function studentsController($scope, $stateParams, studentsFactory, UtilitiesFactory) {

window.MY_SCOPE = $scope;

  // $scope.question = UtilitiesFactory.findById(QuestionsFactory.questions, $stateParams.questionId);
  // $scope.answer = UtilitiesFactory.findById($scope.question.answers, $stateParams.answerId);
  $scope.students = studentsFactory.students;

$scope.filterBy = "";

$scope.toggleSignedIn  = function (student){
  console.log("toggleSignedIn clicked");
  student.signedIn = !(student.signedIn);
}

$scope.signedInText = function (isSignedIn){
  if (isSignedIn == false ) {return "is not signed In"}
  else {return "is signed in"}
}

$scope.getFirstName = function (student){
  return student.name.split(" ")[0];
}

  // $scope.addAnswer = function() {
  //   $scope.question.answers.push(
  //     { text: $scope.answerText,
  //       id: $scope.question.answers.length + 1,
  //       upvotes: $scope.upvotes = 0,
  //       discussion: []
  //       }
  //   );
  //   $scope.question.answered = true;
  //   $scope.answerText = null;
  // }
  //
  // $scope.addCommentToDiscussion = function() {
  //   $scope.answer.discussion.push($scope.comment);
  // }
  //
  // $scope.addToUpvotes = function() {
  //   debugger;
  //   console.log($scope.answer);
  //   $scope.answer.upvotes += 1;
  // }
});
