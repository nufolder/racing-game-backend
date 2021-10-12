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

//video
let videoInit = document.getElementById("myVideo");
videoInit.addEventListener("ended", myHandler, false);

function myHandler(e) {
    console.log(e);
    console.log("Video Finish !!");
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
                ).innerHTML = `<a type="button" class="btn btn-secondary"
                data-bs-dismiss="modal">Oke</a>`;
            }
        },
        error: function(request, status, error) {
            console.log("Respond was: ", resp);
            let myModal = new bootstrap.Modal(
                document.getElementById("myModal"),
                {
                    keyboard: false
                }
            );
            myModal.show();
            $(".textfinishvideo").text(resp.response);
        }
    });
}

//disable seeking video
let supposedCurrentTime = 0;
videoInit.addEventListener("timeupdate", function() {
    if (!videoInit.seeking) {
        supposedCurrentTime = videoInit.currentTime;
    }
});
videoInit.addEventListener("seeking", function() {
    let delta = videoInit.currentTime - supposedCurrentTime;
    if (Math.abs(delta) > 0.01) {
        console.log("Seeking is disabled");
        videoInit.currentTime = supposedCurrentTime;
    }
});
videoInit.addEventListener("ended", function() {
    supposedCurrentTime = 0;
});

//random video
const ranVideoArr = ["minigames/YukSemangat.mp4", "minigames/SkuadAHRT.mp4"];
const randomVal = Math.floor(Math.random() * ranVideoArr.length);
let mp4Vid = document.getElementById("myVideo");
mp4Vid.src = ranVideoArr[randomVal];
