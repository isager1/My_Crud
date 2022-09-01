$( document ).ready(function() {
    $("#login_form").on("submit", function(event) {
        event.preventDefault();
        const form_data = new FormData(event.target);
        const data = Object.fromEntries(form_data.entries());
        console.log(data);
        $.post("/controller/user.php?action=login", data, function(response) {
            response = JSON.parse(response);
            if (response["status"] === 200) {
                localStorage.setItem("user", JSON.stringify(response["data"]));
                window.location.href="/view/home.php";
                
            } else {
                $("#msg-warning").show().html("Identifiant ou mot de passe incorrect");
                $("input").css("border", "1px solid rgb(231, 71, 71)");
            }

            
        });

    });
        
});


$("i").click(function () {
    window.location.href="/view/home.php";
});


$("input").click(function () {
    $("#msg-warning").hide();
});

$("input").hover(function () {
    $(this).css({ "border": "1px solid blue" });
},
    function () {
        $("input").css({ "border": "" });
    }
);