$(document).ready(function() {

    $("#formConnexion #email").blur(function () {
        if ($(this).val().length === 0) {
            $(this).attr("placeholder", "Veuillez entrer un email");
            $(this).addClass("error");
        }
        else if (!((new RegExp("^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$")).test($(this).val()))) {
            $("#formConnexion #emailErrorMessage").text("Adresse email invalide");
            $(this).addClass("error");
        }
        else {
            $("#formConnexion #emailErrorMessage").text("");
            $(this).removeClass("error");
        }
    });


    $("#formConnexion #mdp").keyup(function () {
        $("#formConnexion #mdpErrorMessage").text("");
        $(this).removeClass("error");
        if ($(this).val().length === 0) {
            $(this).attr("placeholder", "Veuillez entrer un mot de passe de 10 caractères minimum");
            $("#formConnexion #mdp2ErrorMessage").text("");
            $(this).addClass("error");
        }
    });
});