describe('Player', function() {

    it("returns a player object with name and score of 0", function() {
        var testPlayer = new Player("Mad Max");

        expect(testPlayer.name).to.equal("Mad Max");
        expect(testPlayer.score).to.equal(0);

    });

    it("joins a player to a game", function() {
        var testPlayer = new Player("Mad Max");
        var testGame = new Game();
        testPlayer.joinGame(testGame);

        expect(testGame.players[0]).to.equal(testPlayer);

    });

    it("tests that 2 players equals max players", function() {
        var testPlayer = new Player("Mad Max");
        var testPlayer2 = new Player("Rad Rex");
        var testGame = new Game();
        testPlayer.joinGame(testGame);
        testPlayer2.joinGame(testGame);

        expect(testGame.players[1]).to.equal(testPlayer2);
        expect(testGame.players.length).to.equal(testGame.maxPlayers);

    });
});

describe('Game', function() {
    it("it returns a game object with an empty array", function() {
        var testGame = new Game();

        expect(testGame.players).to.eql([]);

    });

    it("tests turn's properties a set at 0", function() {
        var testTurn = new Turn();

        expect(testTurn.numberOfTurns).to.equal(0);
        expect(testTurn.turnScore).to.equal(0);
    });

    it("turn.roll returns a number from 1 to 6", function() {
        var testTurn = new Turn();
        var number = testTurn.roll();

        expect(number).to.be.within(1, 6);
    });

    it("turn.update reduces turnScore to 0 if rollValue is 1", function() {

        var testPlayer = new Player("Mad Max");
        var testPlayer2 = new Player("Rad Rex");
        var testGame = new Game();
        testPlayer.joinGame(testGame);
        testPlayer2.joinGame(testGame);

        var testTurn = new Turn();
        testGame.turnScore = 6;
        testGame.update(1,testGame);

        var number = testGame.turnScore;

        expect(number).to.equal(0);
    });

    it("adds rollValue to turnScore if rollValue is not 1", function() {
        var testGame = new Game();

        testGame.update(4);
        var number = testGame.turn.turnScore;

        expect(number).to.equal(4);
    });


    it("adds turnScore to currentPlayer score", function() {
        var testPlayer = new Player("Mad Max");
        var testPlayer2 = new Player("Rad Rex");

        var testGame = new Game();
        testPlayer.joinGame(testGame);
        testPlayer2.joinGame(testGame); //player 2 joins game
        testGame.currentPlayer = 1; //set currentplayer to testPlayer2
        var testTurn = new Turn();
        testPlayer2.score = 5;
        testTurn.turnScore = 2;
        var currentPlayer = testGame.players[testGame.currentPlayer];
        console.log(currentPlayer);
        testTurn.hold(currentPlayer);
        var number = testPlayer2.score;

        expect(number).to.equal(7);
    });

    it("changes the players turn to the next player", function() {
        var testPlayer = new Player("Mad Max");
        var testPlayer2 = new Player("Rad Rex");
        var game = new Game();

        testPlayer.joinGame(game);
        testPlayer2.joinGame(game); //player 2 joins game


        game.next();
        var currentPlayer = game.players[game.currentPlayer];

        expect(game.currentPlayer).to.equal(1);
    });

    it("test if feed in currentplayer outside of players array length", function() {
        var testPlayer = new Player("Mad Max");
        var testPlayer2 = new Player("Rad Rex");
        var game = new Game();

        testPlayer.joinGame(game);
        testPlayer2.joinGame(game); //player 2 joins game

        game.next();
        game.next();
        game.next();

    //    var currentPlayer = game.players[game.currentPlayer];


        expect(game.currentPlayer).to.equal(1);
    });

    it("can win game score is 100 or greater", function() {
        var testPlayer = new Player("Mad Max");
        var testPlayer2 = new Player("Rad Rex");
        var game = new Game();

        testPlayer.joinGame(game);
        testPlayer2.joinGame(game); //player 2 joins game

        testPlayer2.score = 95;
        game.currentPlayer = 1;//the second player
        game.update(5);
        game.turn.hold(game.players[game.currentPlayer]);
        var gn = game.next();
        var expected = "Rad Rex wins with a total of 100 points!"

        expect(gn).to.equal(expected);
    });

    it("returns the next turn statement with player name", function() {
        var testPlayer = new Player("Mad Max");
        var testPlayer2 = new Player("Rad Rex");
        var game = new Game();

        testPlayer.joinGame(game);
        testPlayer2.joinGame(game); //player 2 joins game

        testPlayer2.score = 95;
        game.currentPlayer = 1;//the second player
        game.update(4);
        game.turn.hold(game.players[game.currentPlayer]);
        var gn = game.next();

        expect(gn).to.equal("Mad Max's turn!");
    });

});
