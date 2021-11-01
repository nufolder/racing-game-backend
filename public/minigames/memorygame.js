const cardsArray = [
    {
        name: "card01",
        rider: "rheza danica ahrens",
        class: "Asian Road Racing Championship",
        img: "photo-riders/rheza-danica-ahrens-image-3.png"
    },
    {
        name: "card02",
        rider: "azryan dheyo wahyumaniadi",
        class: "Asian Road Racing Championship",
        img: "photo-riders/azryan-dheyo-wahyumaniadi-image-1.png"
    },
    {
        name: "card03",
        rider: "delvintor alfarizi",
        class: "MXGP",
        img: "photo-riders/delvintor-alfarizi-image-3.png"
    },
    {
        name: "card04",
        rider: "mario suryo aji",
        class: "Junior Motor CEV",
        img: "photo-riders/mario-suryo-aji-image-2.png"
    },
    {
        name: "card05",
        rider: "veda ega pratama",
        class: "Thailand Talent Cup",
        img: "photo-riders/veda-ega-pratama-image-1.png"
    },
    {
        name: "card06",
        rider: "irfan ardiansyah",
        class: "Asian Road Racing Championship",
        img: "photo-riders/irfan-ardiansyah-image-2.png"
    }
    //
];

// Grab the div with an id of root
const game = document.getElementById("game");

//Only allow two cards to be selected at a time
let count = 0;
let countMatch = 0;

//if two selected cards are a match and hide them
let firstGuess = "";
let secondGuess = "";

let previousTarget = null;

//Add delay
let delay = 800;

// Create a section with a class of grid
const grid = document.createElement("section");
grid.setAttribute("class", "grid");
// grid.setAttribute('class', 'row');

// Append the grid section to the game div
game.appendChild(grid);

// Duplicate array
let gameGrid = cardsArray.concat(cardsArray);

const createGrid = () => {
    // Randomize game grid on each load
    gameGrid.sort(() => 0.5 - Math.random());

    gameGrid.map(carde => {
        //create card element
        const item = document.createElement("div");
        item.classList.add("carde");
        // item.classList.add('col-4');
        item.dataset.name = carde.name;
        item.dataset.rider = carde.rider;
        item.dataset.class = carde.class;

        //create front of card
        const front = document.createElement("div");
        front.classList.add("front");

        //create back of card
        const back = document.createElement("div");
        back.classList.add("back");
        back.style.backgroundImage = `url(${carde.img})`;

        grid.appendChild(item);
        item.appendChild(front);
        item.appendChild(back);
    });
};

const resetGame = () => {
    while (grid.firstChild) {
        grid.removeChild(grid.firstChild);
    }
    createGrid();
};

//Reset guess count after 2
const resetGuesses = () => {
    firstGuess = "";
    secondGuess = "";
    previousTarget = "";
    count = 0;

    var selected = document.querySelectorAll(".selected");
    selected.forEach(card => {
        card.classList.remove("selected");
    });
};

const gameFinished = () => {
    // countMatch = 0;
    // message.innerHTML = 'Congratulations!';
    $.ajax({
        method: "GET",
        crossDomain: true,
        crossOrigin: true,
        async: true,
        contentType: "application/json",
        headers: {
            "Access-Control-Allow-Methods": "*",
            "Access-Control-Allow-Credentials": true,
            "Access-Control-Allow-Headers":
                "Access-Control-Allow-Headers, Origin, X-Requested-With, Content-Type, Accept, Authorization",
            "Access-Control-Allow-Origin": "*",
            "Control-Allow-Origin": "*",
            "cache-control": "no-cache",
            "Content-Type": "application/json"
        },
        url: "/get-memory-game",
        success: function(resp) {
            console.log("Respond was: ", resp);
            $(".modaltitlememorygame").text("Selesai!");
            $(".textfinishmemorygame").text(resp.response);
            if (resp.status == 1) {
                document.getElementById(
                    "memorygameredirect"
                ).innerHTML = `<a href="user" type="button" class="btn">Oke</a>`;
            } else {
                document.getElementById(
                    "memorygameredirect"
                ).innerHTML = `<a type="button" class="btn" data-bs-dismiss="modal">Oke</a>`;
            }
            var myModal = new bootstrap.Modal(
                document.getElementById("memorygameid"),
                {
                    keyboard: false
                }
            );
            myModal.show();
        },
        error: function(request, status, error) {
            console.log("Respond was: ", resp);
            $(".textfinishmemorygame").text(resp.response);
        }
    });
};

const match = () => {
    var selected = document.querySelectorAll(".selected");
    let getRider = "";
    let getClass = "";
    selected.forEach(card => {
        // card.classList.add('animate__animated');
        // card.classList.add('animate__pulse');
        // card.classList.add('animate__delay-1s');
        card.classList.add("match");
        // alert(selected);
        let element = "";
        for (let index = 0; index < selected.length; index++) {
            element = selected[index];
        }
        let attributeRider = element.dataset.rider;
        let attributeClass = element.dataset.class;
        getRider = attributeRider;
        getClass = attributeClass;
    });
    countMatch++;

    //tampilin nama jika match
    // console.log(getRider);
    var myMatch = new bootstrap.Modal(document.getElementById("modalMatch"), {
        keyboard: false
    });
    myMatch.show();
    $(".nama").text(`${getRider}`);
    $(".kelas").text(`${getClass}`);
    setTimeout(function() {
        myMatch.hide();
    }, 2000);

    if (countMatch === gameGrid.length / 2) {
        gameFinished();
    }
};

// Add event listener on load
document.addEventListener("DOMContentLoaded", function() {
    createGrid();
});

// Add event listener to grid
grid.addEventListener("click", function(event) {
    let clicked = event.target;

    // Do not allow the grid section itself to be selected; only select divs inside the grid
    if (
        clicked.nodeName === "SECTION" ||
        clicked === previousTarget ||
        clicked.parentNode.classList.contains("selected") ||
        clicked.parentNode.classList.contains("match")
    ) {
        return;
    }

    if (count < 2) {
        count++;

        if (count === 1) {
            firstGuess = clicked.parentNode.dataset.name;
            clicked.parentNode.classList.add("selected");
        } else {
            secondGuess = clicked.parentNode.dataset.name;
            clicked.parentNode.classList.add("selected");
        }

        if (firstGuess !== "" && secondGuess !== "") {
            if (firstGuess === secondGuess) {
                setTimeout(match, delay);
                setTimeout(resetGuesses, delay);
                // alert('asd');
            } else {
                setTimeout(resetGuesses, delay);
            }
        }

        // Set previous target to clicked
        previousTarget = clicked;
    }
});
