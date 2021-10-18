var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

//show password login
$("#login_show_hide_password a").on("click", function(event) {
    event.preventDefault();
    if ($("#login_show_hide_password input").attr("type") == "text") {
        $("#login_show_hide_password input").attr("type", "password");
        $("#login_show_hide_password i").addClass("fa-eye-slash");
        $("#login_show_hide_password i").removeClass("fa-eye");
    } else if (
        $("#login_show_hide_password input").attr("type") == "password"
    ) {
        $("#login_show_hide_password input").attr("type", "text");
        $("#login_show_hide_password i").removeClass("fa-eye-slash");
        $("#login_show_hide_password i").addClass("fa-eye");
    }
});

//show password register
$("#show_hide_password a").on("click", function(event) {
    event.preventDefault();
    if ($("#show_hide_password input").attr("type") == "text") {
        $("#show_hide_password input").attr("type", "password");
        $("#show_hide_password_confirmation input").attr("type", "password");
        $("#show_hide_password i").addClass("fa-eye-slash");
        $("#show_hide_password i").removeClass("fa-eye");
    } else if ($("#show_hide_password input").attr("type") == "password") {
        $("#show_hide_password input").attr("type", "text");
        $("#show_hide_password_confirmation input").attr("type", "text");
        $("#show_hide_password i").removeClass("fa-eye-slash");
        $("#show_hide_password i").addClass("fa-eye");
    }
});

var myModal1 = document.getElementById("ttc");
myModal1.addEventListener("shown.bs.modal", function(event) {
    $("#carousel-ttc").slick({
        slidesToShow: 1,
        autoplay: false,
        infinite: false,
        arrows: true,
        adaptiveHeight: true,
        slidesToScroll: 1
    });
});

var myModal2 = document.getElementById("atc");
myModal2.addEventListener("shown.bs.modal", function(event) {
    $("#carousel-atc").slick({
        slidesToShow: 1,
        autoplay: false,
        infinite: false,
        arrows: true,
        adaptiveHeight: true,
        slidesToScroll: 1
    });
});

var myModal3 = document.getElementById("arrc");
myModal3.addEventListener("shown.bs.modal", function(event) {
    $("#carousel-arrc").slick({
        slidesToShow: 1,
        autoplay: false,
        infinite: false,
        arrows: true,
        adaptiveHeight: true,
        slidesToScroll: 1
    });
});

var myModal4 = document.getElementById("cev");
myModal4.addEventListener("shown.bs.modal", function(event) {
    $("#carousel-cev").slick({
        slidesToShow: 1,
        autoplay: false,
        infinite: false,
        arrows: true,
        adaptiveHeight: true,
        slidesToScroll: 1
    });
});

//video

function videoEnd() {
    $.ajax({
        method: "GET",
        crossDomain: true,
        crossOrigin: true,
        async: true,
        url: "/get-video",
        success: function(resp) {
            console.log("Respond was: ", resp);
            let myModal = new bootstrap.Modal(
                document.getElementById("myModal"),
                {
                    backdrop: "static",
                    keyboard: false
                }
            );

            myModal.show();
            $(".textfinishvideo").text(resp.response);
            if (resp.status == 1) {
                document.getElementById(
                    "videoredirect"
                ).innerHTML = `<a href="user" type="button" class="btn btn-secondary">Oke</a>`;
            } else {
                document.getElementById(
                    "videoredirect"
                ).innerHTML = `<a href="user" type="button" class="btn btn-secondary"
                >Oke</a>`;
            }
        },
        error: function(request, status, error) {
            console.log("Respond was: ", resp);
            let myModal = new bootstrap.Modal(
                document.getElementById("myModal"),
                {
                    backdrop: "static",
                    keyboard: false
                }
            );
            myModal.show();
            $(".textfinishvideo").text(resp.response);
        }
    });
}

//VIDEO
const tag = document.createElement("script");

tag.src = "https://www.youtube.com/iframe_api";
const firstScriptTag = document.getElementsByTagName("script")[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

let player;
function onYouTubeIframeAPIReady() {
    //random video
    const ranVideoIDArr = ["6TLlG-cREMY", "QoKwdxeL-JM", "_smL9s_6GF4"];
    const randomVal = Math.floor(Math.random() * ranVideoIDArr.length);

    player = new YT.Player("player", {
        height: "390",
        width: "640",
        videoId: ranVideoIDArr[randomVal],
        playerVars: {
            playsinline: 1,
            controls: 0,
            showinfo: 0,
            rel: 0,
            fs: 0,
            disablekb: 1
        },
        events: {
            onReady: onPlayerReady,
            onStateChange: onPlayerStateChange
        }
    });
}

function onPlayerReady(event) {
    event.target.playVideo();
}

function onPlayerStateChange(event) {
    if (event.data == 0) {
        videoEnd();
    }
}

function checkSelectType(thatSel) {
    const node = document.getElementById("ifSel");
    if (thatSel.options[thatSel.selectedIndex].text == "Lainnya") {
        node.style.display = "block";
    } else {
        node.style.display = "none";
    }
}

function liveInputType() {
    document.getElementById("opSelect").value = document.getElementById(
        "ifSel"
    ).value;
}
