$(document).ready(function () {


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

    $(document).ready(function () {

        $('#search2').keyup(function () {

            var name = $(this).val();
            $.post('../controller/search.php', { name: name }, function (data) {

                $('div#back_result2').css({ 'display': 'block' });
                $('div#back_result2').html(data);
            });

            $('body').click(function () {
                $('div#back_result2').css({ 'display': 'none' });

            })
        });
    });




    $(".fa-home").click(function () {
        $(this).css("borderBottom", "3px solid blue")
        $(this).css("color", "blue");
        $(".fa-envelope").css({ "borderBottom": "", "color": "" });
        $(".fa-gear").css({ "borderBottom": "", "color": "" });
        $(".bodyCont").css({ "display": "flex" });
        $(".container").css({ "display": "none" });
        $(".messagesCont").css({ "display": "none" });
        $(".compteCont").css({ "display": "none" });
        $(".messageCont").css({ "display": "flex" });
    });


    $(".fa-envelope").click(function () {
        $(this).css("borderBottom", "3px solid blue");
        $(this).css("color", "blue");
        $(".fa-home").css({ "borderBottom": "", "color": "" });
        $(".fa-gear").css({ "borderBottom": "", "color": "" });
        $(".bodyCont").css({ "display": "none" });
        $(".container").css({ "display": "none" });
        $(".messagesCont").css({ "display": "block" });
        $(".compteCont").css({ "display": "none" });
        $(".messageCont").css({ "display": "flex" });
    });

    $(".fa-gear").click(function () {
        $(this).css("borderBottom", "3px solid blue");
        $(this).css("color", "blue");
        $(".fa-home").css({ "borderBottom": "", "color": "" });
        $(".fa-envelope").css({ "borderBottom": "", "color": "" });
        $(".container").css({ "display": "block" });
        $(".bodyCont").css({ "display": "none" });
        $(".container").css({ "display": "block" });
        $(".messagesCont").css({ "display": "none" });
        $(".compteCont").css({ "display": "none" });
        $(".messageCont").css({ "display": "none" });

    });

    
    document.querySelector('.fa-gear').setAttribute("onclick", "location.href='../view/edit.php'");


    $("i").hover(function () {
        $(this).css("background-color", "rgb(236, 236, 236)");

    }, function () {
        $(this).css("background-color", "");

    });

    $(document).ready(function () {
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
