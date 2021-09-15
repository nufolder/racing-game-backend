// imagegames array holds all imagegames
let imagegame = document.getElementsByClassName("imagegame");
let imagegames = [...imagegame];

// deck of all imagegames in game
const deck = document.getElementById("imagegame-deck");

// declaring move variable
let moves = 0;
let counter = document.querySelector(".moves");

// declare variables for star icons
const stars = document.querySelectorAll(".fa-star");

// declaring variable of matchedimagegames
let matchedimagegame = document.getElementsByClassName("match");

// stars list
let starsList = document.querySelectorAll(".stars li");

// close icon in modal
let closeicon = document.querySelector(".close");

// declare modal
let modal = document.getElementById("popup1")

// array for opened imagegames
var openedimagegames = [];


// @description shuffles imagegames
// @param {array}
// @returns shuffledarray
function shuffle(array) {
    var currentIndex = array.length,
        temporaryValue, randomIndex;

    while (currentIndex !== 0) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
};


// @description shuffles imagegames when page is refreshed / loads
document.body.onload = startGame();


// @description function to start a new play 
function startGame() {

    // empty the openimagegames array
    openedimagegames = [];

    // shuffle deck
    imagegames = shuffle(imagegames);
    // remove all exisiting classes from each imagegame
    for (var i = 0; i < imagegames.length; i++) {
        deck.innerHTML = "";
        [].forEach.call(imagegames, function(item) {
            deck.appendChild(item);
        });
        imagegames[i].classList.remove("show", "open", "match", "disabled");
    }
    // reset moves
    // moves = 0;
    // counter.innerHTML = moves;
    // reset rating
    for (var i = 0; i < stars.length; i++) {
        stars[i].style.color = "#FFD700";
        stars[i].style.visibility = "visible";
    }
    //reset timer
    second = 0;
    minute = 0;
    hour = 0;
    var timer = document.querySelector(".timer");
    // timer.innerHTML = "0 mins 0 secs";
    clearInterval(interval);
}


// @description toggles open and show class to display imagegames
var displayimagegame = function() {
    this.classList.toggle("open");
    this.classList.toggle("show");
    this.classList.toggle("disabled");
};


// @description add opened imagegames to Openedimagegames list and check if imagegames are match or not
function imagegameOpen() {
    openedimagegames.push(this);
    var len = openedimagegames.length;
    if (len === 2) {
        moveCounter();
        if (openedimagegames[0].type === openedimagegames[1].type) {
            matched();
        } else {
            unmatched();
        }
    }
};


// @description when imagegames match
function matched() {
    openedimagegames[0].classList.add("match", "disabled");
    openedimagegames[1].classList.add("match", "disabled");
    openedimagegames[0].classList.remove("show", "open", "no-event");
    openedimagegames[1].classList.remove("show", "open", "no-event");
    openedimagegames = [];
}


// description when imagegames don't match
function unmatched() {
    openedimagegames[0].classList.add("unmatched");
    openedimagegames[1].classList.add("unmatched");
    disable();
    setTimeout(function() {
        openedimagegames[0].classList.remove("show", "open", "no-event", "unmatched");
        openedimagegames[1].classList.remove("show", "open", "no-event", "unmatched");
        enable();
        openedimagegames = [];
    }, 1100);
}


// @description disable imagegames temporarily
function disable() {
    Array.prototype.filter.call(imagegames, function(imagegame) {
        imagegame.classList.add('disabled');
    });
}


// @description enable imagegames and disable matched imagegames
function enable() {
    Array.prototype.filter.call(imagegames, function(imagegame) {
        imagegame.classList.remove('disabled');
        for (var i = 0; i < matchedimagegame.length; i++) {
            matchedimagegame[i].classList.add("disabled");
        }
    });
}


// @description count player's moves
function moveCounter() {
    // moves++;
    // counter.innerHTML = moves;
    //start timer on first click
    if (moves == 1) {
        second = 0;
        minute = 0;
        hour = 0;
        startTimer();
    }
    // setting rates based on moves
    if (moves > 8 && moves < 12) {
        for (i = 0; i < 3; i++) {
            if (i > 1) {
                stars[i].style.visibility = "collapse";
            }
        }
    } else if (moves > 13) {
        for (i = 0; i < 3; i++) {
            if (i > 0) {
                stars[i].style.visibility = "collapse";
            }
        }
    }
}


// @description game timer
var second = 0,
    minute = 0;
hour = 0;
var timer = document.querySelector(".timer");
var interval;

function startTimer() {
    interval = setInterval(function() {
        timer.innerHTML = minute + "mins " + second + "secs";
        second++;
        if (second == 60) {
            minute++;
            second = 0;
        }
        if (minute == 60) {
            hour++;
            minute = 0;
        }
    }, 1000);
}


// @description congratulations when all imagegames match, show modal and moves, time and rating
function congratulations() {
    if (matchedimagegame.length == 12) {
        clearInterval(interval);

        // show congratulations modal


        $.ajax({
            method: 'GET',
            crossDomain: true,
            crossOrigin: true,
            async: true,
            contentType: 'application/json',
            headers: {
                'Access-Control-Allow-Methods': '*',
                "Access-Control-Allow-Credentials": true,
                "Access-Control-Allow-Headers": "Access-Control-Allow-Headers, Origin, X-Requested-With, Content-Type, Accept, Authorization",
                "Access-Control-Allow-Origin": "*",
                "Control-Allow-Origin": "*",
                "cache-control": "no-cache",
                'Content-Type': 'application/json'
            },
            url: "/get-memory-game",
            success: function(resp) {
                console.log("Respond was: ", resp);
                modal.classList.add("show");
                $('.textfinishmemorygame').text(resp.response);
            },
            error: function(request, status, error) {
                console.log("Respond was: ", resp);
                $('.textfinishmemorygame').text(resp.response);
                modal.classList.add("show");
            }
        });

        //closeicon on modal
        closeModal();
    };
}


// @description close icon on modal
function closeModal() {
    closeicon.addEventListener("click", function(e) {
        modal.classList.remove("show");
        startGame();
    });
}


// @desciption for user to play Again 
function playAgain() {
    modal.classList.remove("show");
    startGame();
}


// loop to add event listeners to each imagegame
for (var i = 0; i < imagegames.length; i++) {
    imagegame = imagegames[i];
    imagegame.addEventListener("click", displayimagegame);
    imagegame.addEventListener("click", imagegameOpen);
    imagegame.addEventListener("click", congratulations);
};