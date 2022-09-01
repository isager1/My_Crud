$(document).ready(function () {
    const image_base64 = null;


    $('#regForm').on('submit', function (event) {
        event.preventDefault();
        const form_data = new FormData(event.target);
        const data = Object.fromEntries(form_data.entries());
        $.ajax({
            url: "../model/register.php",
            type: "post",
            data: form_data,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.length == 0) {
                    if (response == "") {
                        $("#msg-warning").show().html("Remplissez tous les champs de saisie");
                        $("input").css("border", "1px solid rgb(231, 71, 71)");
                    }
                } else {
                    window.location.href = "./login.php";
                }

            }

        });



    })
});

$("i").click(function () {
    window.location.href="/view/home.php";
});

// $("input").click(function () {
//     if ($("input").val() == 0) {
//         $(this).css("border", "1px solid blue");
//     } else if ($(this).val() > 0) {
//         $(this).css('border', 'none');
//     }
// });


$("input").hover(function () {
    $(this).css({ "border": "1px solid blue" });
},
    function () {
        $("input").css({ "border": "" });
    }
);
