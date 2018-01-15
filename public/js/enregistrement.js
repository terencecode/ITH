$(document).ready(function() {

    $("#formEnregistrement #prenom").blur(function() {
        if ($(this).val() == null || $(this).val().length === 0) {
            $(this).attr("placeholder", "Veuillez entrer un prénom");
            $(this).addClass("error");
        }
        else {
            $(this).removeClass("error");
        }
    });

    $("#formEnregistrement #nom").blur(function() {
        if ($(this).val() == null || $(this).val().length === 0) {
            $(this).attr("placeholder", "Veuillez entrer un nom");
            $(this).addClass("error");
        }
        else {
            $(this).removeClass("error");
        }
    });

    $("#formEnregistrement #email").blur(function() {
        if ($(this).val().length === 0) {
            $(this).attr("placeholder", "Veuillez entrer un email");
            $(this).addClass("error");
        }
        else if (!((new RegExp("^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$")).test($(this).val()))) {
            $("#formEnregistrement #emailErrorMessage").text("Adresse email invalide");
            $(this).addClass("error");
        }
        else {
            $("#formEnregistrement #emailErrorMessage").text("");
            $(this).removeClass("error");
        }
    });



    $("#formEnregistrement #mdp").keyup(function() {
        $("#formEnregistrement #mdpErrorMessage").text("");
        $(this).removeClass("error");
        if ($(this).val().length === 0) {
            $(this).attr("placeholder", "Veuillez entrer un mot de passe de 10 caractères minimum");
            $("#formEnregistrement #mdp2ErrorMessage").text("");
            $(this).addClass("error");
        }
        else if ($("#formEnregistrement #mdp2").val().length != 0 && $(this).val() != $("#formEnregistrement #mdp2").val()) {
            $("#formEnregistrement #mdp2ErrorMessage").text("Les mots de passe ne correspondent pas");
            $(this).addClass("error");
        }
        else if ($(this).val().length <= 10) {
            $("#formEnregistrement #mdpErrorMessage").text("Mot de passe trop court");
            $(this).addClass("error");
        }
        else if (!(/[A-Z]+/.test($(this).val()))) {
            $("#formEnregistrement #mdpErrorMessage").text("Le mot de passe doit contenir au moins une majuscule");
            $(this).addClass("error");
        }
        else if (!(/\d/.test($(this).val()))) {
            $("#formEnregistrement #mdpErrorMessage").text("Le mot de passe doit contenir au moins un chiffre");
            $(this).addClass("error");
        }
    });

    $("#formEnregistrement #mdp2").keyup(function() {
        $("#formEnregistrement #mdp2ErrorMessage").text("");
        $(this).removeClass("error");
        if ($(this).val().length === 0) {
            $(this).attr("placeholder", "Veuillez entrer un mot de passe de 10 caractères minimum");
            $("#formEnregistrement #mdpErrorMessage").text("");
            $(this).addClass("error");
        }
        else if ($("#formEnregistrement #mdp").val().length != 0 && $(this).val() != $("#formEnregistrement #mdp").val()) {
            $("#formEnregistrement #mdp2ErrorMessage").text("Les mots de passe ne correspondent pas");
            $(this).addClass("error");
        }
        else if ($(this).val().length <= 10) {
            $("#formEnregistrement #mdp2ErrorMessage").text("Mot de passe trop court");
            $(this).addClass("error");
        }
        else if (!(/[A-Z]+/.test($(this).val()))) {
            $("#formEnregistrement #mdp2ErrorMessage").text("Le mot de passe doit contenir au moins une majuscule");
            $(this).addClass("error");
        }
        else if (!(/\d/.test($(this).val()))) {
            $("#formEnregistrement #mdp2ErrorMessage").text("Le mot de passe doit contenir au moins un chiffre");
            $(this).addClass("error");
        }
    });

});