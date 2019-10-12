
var avail_sizes = {
    small: 6,
    medium:10,
    large:14,
    xtralarge:20
    };

var avail_toppings = {
    cheese: 3.50,
    anchovies: 2,
    cashews: 2,
    brocolli:1,
    silicone:3,
    meat:4


}
//Topping
var Topping = function(name,price){
        this.name = name;
        this.price = price;
    }


//pizza--------------------------------------------------------
var Pizza = function (){
    this.size = 'small';
    this.price = 6;
    this.toppings = new Array();

}


Pizza.prototype.changeSize = function(newsize){
    var oldsize = this.size;
//console.log("in proto oldsize is :" + oldsize)
 //   this.price -= avail_sizes[oldsize];
    if (isNaN(this.price)){this.price = 0;}
    this.size = newsize;
 //   this.price += avail_sizes[newsize];
}

Pizza.prototype.addTopping = function(topping){
    var toppingOb = avail_toppings[topping];
//console.log(toppingOb);
    this.toppings.push(topping);
//    this.price += toppingOb;
    return topping + " has been added to your pizza."
}


Pizza.prototype.removeTopping = function(topping){
    var toppingIndex = this.toppings.indexOf(topping);
    console.log("topping in the remove topping function is: " + topping)
    this.toppings.splice(toppingIndex, 1);

    if (isNaN(this.price)){this.price = 0;}
}

Pizza.prototype.updatePrice = function(){
    this.price = 0;
    this.price += avail_sizes[this.size];
        console.log("in updatePrice this.price is: " + this.price)
    for (var topping of this.toppings){
        this.price += avail_toppings[topping];
    }

     return this.price;

}
//User--------------------------------------------------------------

var User = function(name){
    this.name = name;
    this.pizza = new Pizza();
}

User.prototype.buildPizza = function(){


}

//ui




$(document).ready(function() {

    var user= new User('Customer');


    $.each(avail_sizes,function(val){
        $('.sizes').append('<option>'+val+'</option>');
            //event.preventDefault();
    })
    $.each(avail_toppings,function(key,val){
        $('.toppings').append('<option value = \"' + key + '\"> '+key+ ': $' + val+' </option>');
            //event.preventDefault();
    })


    $('#sizes').change(function(){
        //user.pizza.changeSize()
        var theValue = $('#sizes :selected').text();
//console.log("pizza size is " + theValue );
        user.pizza.changeSize(theValue);
        user.pizza.updatePrice();
//console.log(user.pizza.price);
updateOrderTable();
    })

    $('#toppings').change(function(){
        //user.pizza.changeSize()
        var theValue = $('#toppings :selected').val();
//console.log("pizza toppings are " + theValue );
        user.pizza.addTopping(theValue);
        user.pizza.updatePrice()
      //  console.log("in toppings change: after running updatePrice the price is" + user.pizza.updatePrice())
//console.log(user.pizza.price);
        updateOrderTable()
    })


function updateOrderTable(){

    $('#user').text(user.name + " is ordering: ")
    $('#sizeofPizza').text("A "+user.pizza.size + ' pizza with')
    $('#toppingList ul li').remove();
    $.each(user.pizza.toppings,function(key){
            $('#toppingList ul').append('<li>' + user.pizza.toppings[key] + '  <button class="glyphicon glyphicon-trash trash" value= ' + user.pizza.toppings[key] + '></button></li>');
        });

//console.log("updated order table")
    var num = (parseFloat(Math.round(user.pizza.price * 100) / 100).toFixed(2));
    $('#price').text("$" + num.toString() );


$('#toppingList ul button').click(function(){
    console.log("the topping delete button is: " + this.value);
    user.pizza.removeTopping(String(this.value));
    user.pizza.updatePrice();
    updateOrderTable()
});
    }

});//end doc ready function
