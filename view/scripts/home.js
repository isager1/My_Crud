$(document).ready(function () {
    const user = localStorage.getItem("user");
    if (user === null) {
        $("#logout_content").show();
        $("#logout_global").show();
    } else {
        const json_user = JSON.parse(user);
        const data = {
            "username": json_user["username"],
            "password": json_user["password"]
        };
        console.log("data:", data);
        $.post("/controller/user.php?action=verify", data, function (response) {
            response = JSON.parse(response);
            if (response["status"] === 200) {
                $("#login_content").show();
                $(".globalCont").css("display", "none");
            } else {
                $("#logout_content").show();
                $("#logout_global").show();
            }
        });
    }

    $(document).ready(function () {
        const user = localStorage.getItem("user");
        if (user !== null) {
            localStorage.getItem("user");
            $("#welcome").html(`Welcome: ${JSON.parse(user).username}`);
            $("#name").html(`${JSON.parse(user).username} `);
            $("#email").html(`${JSON.parse(user).email}`);
            $("#nameTwo").html(`${JSON.parse(user).username}`);

            var canvas = document.createElement('canvas');
            var image = new Image();
            var ctx = canvas.getContext('2d');

            image.onload = function () {
                canvas.width = image.width;
                canvas.height = image.height;

                ctx.drawImage(image, 0, 0);

                var dataURL = canvas.toDataURL('image/png');

                var Base64StringImage = dataURL.replace(/^data:image\/(png|jpg);base64,/, "");

                localStorage.setItem('image', Base64StringImage);

                document.querySelector('#avatar img').src = 'data:image/png;base64,' + localStorage.getItem('image');
            };

            image.src = `${JSON.parse(user).avatar}`;
        }

        $(document).ready(function () {

            $('#search').keyup(function () {

                var name = $(this).val();
                $.post('../controller/search.php', { name: name }, function (data) {

                    $('div#back_result').css({ 'display': 'block' });
                    $('div#back_result').html(data);
                });

                $('body').click(function () {
                    $('div#back_result').css({ 'display': 'none' });

                })
            });
        });

    });

    $("#logout_button").click(() => {
        const user = localStorage.getItem("user");
        if (user !== null) {
            localStorage.removeItem("user");
            window.location.href = "/view/home.php";
        }


    });

    $(".fa-home").click(function () {
        $(this).css("borderBottom", "3px solid blue")
        $(this).css("color", "blue");
        $(".fa-circle-user").css({ "borderBottom": "", "color": "" });
        $(".fa-bell").css({ "borderBottom": "", "color": "" });
        $(".fa-envelope").css({ "borderBottom": "", "color": "" });

    });

    $(".fa-circle-user").click(function () {
        $(this).css("borderBottom", "3px solid blue");
        $(this).css("color", "blue");
        $(".fa-home").css({ "borderBottom": "", "color": "" });
        $(".fa-bell").css({ "borderBottom": "", "color": "" });
        $(".fa-envelope").css({ "borderBottom": "", "color": "" });
    });

    $(".fa-bell").click(function () {
        $(this).css("borderBottom", "3px solid blue");
        $(this).css("color", "blue");
        $(".fa-circle-user").css({ "borderBottom": "", "color": "" });
        $(".fa-home").css({ "borderBottom": "", "color": "" });
        $(".fa-envelope").css({ "borderBottom": "", "color": "" });
    });

    $(".fa-envelope").click(function () {
        $(this).css("borderBottom", "3px solid blue");
        $(this).css("color", "blue");
        $(".fa-circle-user").css({ "borderBottom": "", "color": "" });
        $(".fa-bell").css({ "borderBottom": "", "color": "" });
        $(".fa-home").css({ "borderBottom": "", "color": "" });
    });

    $("i").hover(function () {
        $(this).css("background-color", "rgb(236, 236, 236)");

    }, function () {
        $(this).css("background-color", "");
        $(this).css("borderRadius", "");

    });


    $(".fa-envelope").click(function () {
        window.location.href = "/view/messages.php";

    });

    $(".fa-user-group").click(function () {
        window.location.href = "/view/allusers.php";

    });

    $(".fa-circle-user").click(function () {
        window.location.href = "/view/compte.php";

    });

    $("h1").click(function () {
        window.location.href = "/view/home.php";

    });



    // $(".fa-home").click(function () {
    //     window.location.href = "/view/home.php";

    // });

    // if (window.location.href.indexOf("messages.php")) {
    //     // $(this).css("borderBottom", "3px solid blue")
    //     // $(this).css("color", "blue");

    //     $(".fa-envelope").click(function () {
    //         window.location.href = "/view/home.php";

    //     });
    // }

    $(document).ready(function () {
        if (window.location.href.indexOf("/view/messages.php")) {
            $(".fa-home").click(function () {
                window.location.href = "/view/home.php";
            });
        }

        if (window.location.href.indexOf("/view/home.php")) {
            $(".fa-envelope").css("borderBottom", "")
            $(".fa-envelope").css("color", "");
            $(".fa-home").css("borderBottom", "3px solid blue")
            $(".fa-home").css("color", "blue");
        }

        if (window.location.href.indexOf("/view/messages.php")) {
            $(".fa-home").css("borderBottom", "")
            $(".fa-home").css("color", "");
        }

    });


});

