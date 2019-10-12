describe('topping', function() {
    it("will return properties name and price I set in the constructor", function() {

        var myTopping = new Topping("Pepperoni", 1.2)
        expect(myTopping.name).to.equal("Pepperoni");
        expect(myTopping.price).to.equal(1.2);
    });

});

describe('User', function() {
    it("will return properties Name ", function() {

        var myUser = new User("Mike");
        expect(myUser.name).to.equal("Mike");
    });

    it("will add a pizza to user ", function() {

        var myUser = new User("Mike");
        expect(myUser.name).to.equal("Mike");
    });

});

describe('Pizza', function() {
    it("changeSize will return correct price and size string when given string for size", function() {
        var myPizza = new Pizza();
        myPizza.changeSize('medium');
//        expect(myPizza.price).to.equal(avail_sizes['medium']);
        expect(myPizza.size).to.equal('medium');

    });

    it("changeSize will return appropriate values (change from small pizza to large pizza changes price correctly)", function() {
        var myPizza = new Pizza();
        myPizza.changeSize('medium');
console.log(myPizza.size);
console.log(myPizza.price);


        myPizza.changeSize('small');
        myPizza.updatePrice();
console.log(myPizza.size);
console.log(myPizza.price);

      expect(myPizza.price).to.equal(6);
        expect(myPizza.size).to.equal('small');

    });

    it("add 1 topping  ", function() {
        var myPizza = new Pizza();
        myPizza.changeSize('medium');

        myPizza.addTopping('cashews');
   //     expect(myPizza.price).to.equal(12);
        expect(myPizza.toppings[0]).to.equal('cashews');

    });
    it("add 2 toppings", function() {
        var myPizza = new Pizza();
        myPizza.changeSize('medium');

        myPizza.addTopping('cashews');
        myPizza.addTopping('brocolli');
   //     expect(myPizza.price).to.equal(13);
        expect(myPizza.toppings[1]).to.equal('brocolli');

    });

    it("add 3 (2 of 1 kind) toppings ", function() {
        var myPizza = new Pizza();
        myPizza.changeSize('medium');

        myPizza.addTopping('cashews');
        myPizza.addTopping('brocolli');
        myPizza.addTopping('cashews');

   //     expect(myPizza.price).to.equal(15);
        expect(myPizza.toppings[2]).to.equal('cashews');

    });

    it("add 3 (2 of 1 kind) toppings and delete on of the 2...using removeTopping function ", function() {
        var myPizza = new Pizza();
        myPizza.changeSize('medium');

        myPizza.addTopping('cashews');
        myPizza.addTopping('brocolli');
        myPizza.addTopping('cashews');

        myPizza.removeTopping('cashews');

    //    expect(myPizza.price).to.equal(13);
        expect(myPizza.toppings).to.eql(['brocolli','cashews']);

    });

});
