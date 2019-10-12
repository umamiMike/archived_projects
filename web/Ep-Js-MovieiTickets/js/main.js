function Ticket(movieobject,ticketprice,seniordiscount,matinee,firstrun){
  this.movie = movieobject
  this.ticketprice = ticketprice
  this.seniordiscount = seniordiscount
  this.matinee = matinee
  this.firstrun = firstrun
}

// Ticket.prototype.fullName = function() {
//   return this.firstName + " " + this.lastName;
// }

Ticket.prototype.firstRunPrice = function(firstRunPrice){


}

Ticket.prototype.seniorDiscount = function(isSeniorDiscount){

    if (isSeniorDiscount === true && (this.seniordiscount === false || this.seniordiscount === undefined)){

        var seniorDiscountMult = 2;

        this.ticketprice = this.ticketprice/2
        this.seniordiscount = true
        }
        else if (isSeniorDiscount === false && (this.seniordiscount === true || this.seniordiscount == undefined)){
            this.ticketprice = this.ticketprice*2
            this.seniordiscount = false
            }

            else{ }

    return this.ticketprice

}

Ticket.prototype.matineePrice = function(isMatineePrice){

    if (isMatineePrice === true){
        this.ticketprice = this.ticketprice/1.8
        }
    return this.ticketprice

}

$(document).ready(function() {


});//ends document ready function
