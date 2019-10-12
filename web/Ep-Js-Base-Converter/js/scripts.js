var baseConvert = function(input, baseFrom, baseTo) {
    //console.log(input,baseFrom,baseTo);
     return parseInt(input, baseFrom).toString(baseTo);
    //return '11';
};


$(document).ready(function() {
    $("form#baseconvert").submit(function(event){
        var input = $("input#target").val();
        var baseFrom = $("select#from").val();
        var baseTo = $("select#to").val();

        var result = baseConvert(input, baseFrom, baseTo);

        $(".output").text(result);

        $("#result").show();
        event.preventDefault();
    });
});
