function Player(name) {
    this.name = name;
    this.score = 0;

}

Player.prototype.joinGame = function(gameTojoin) {
    gameTojoin.players.push(this);
}

function Game() {
    this.players = [];
    this.maxPlayers = 2;
    this.currentPlayer = 0;
    this.turn = new Turn();

}

Game.prototype.update = function(rollValue) {
    if (rollValue === 1) {
        this.turn.turnScore = 0;
        this.next()
    } else {
        this.turn.turnScore += rollValue;
    }

}

Game.prototype.next = function() {

    if (this.players[this.currentPlayer].score >= 100) {
        return this.gameOver();
    }

    this.turnScore = 0;
    this.numberOfTurns += 1;

    if (this.currentPlayer == ((this.players.length) - 1)) {
        this.currentPlayer = 0;
        return this.players[this.currentPlayer].name + "'s turn!";
    } else {
console.log(this.players[this.currentPlayer].name + "'s turn!");
        this.currentPlayer += 1;
        return this.players[this.currentPlayer].name + "'s turn!";

    }

}

Game.prototype.gameOver = function() {

    var winner = this.players[this.currentPlayer]
    return winner.name + " wins with a total of " + winner.score + " points!";

}

function Turn() {
    this.numberOfTurns = 0;
    this.turnScore = 0;
}

Turn.prototype.roll = function() {
    return Math.floor((Math.random() * 6) + 1) | 0;
}

Turn.prototype.hold = function(player) {
    player.score += this.turnScore;
    console.log(this.turn)
}


var game = new Game();

function updateUi(){
    $("#whoTurn").text(game.players[game.currentPlayer].name);
    $("#player_info ul").empty();
    for ( var player of game.players ) {
        $("#player_info ul").append('<li>' +  player.name + ' ' + player.score + '</li>');
    }



}

    //ux

    $('#roll').click(function(){

        console.log("roll button clicked");
        var thisRoll = game.turn.roll();

        game.update(thisRoll);
        updateUi();
    });

    $('#hold').click(function(){

console.log("hold button clicked");
        game.turn.hold(game.players[game.currentPlayer]);
        game.update();
        game.next();
        updateUi();
    });

$(document).ready(function() {



    while (game.players.length < game.maxPlayers) {
        var player_name = prompt ("Who wants to play?");
        var player = new Player(player_name);
        player.joinGame(game);
    }

    game.next();
    updateUi();









});
