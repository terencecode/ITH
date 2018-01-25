var bIsPrenomVide = true;
var bIsNomVide = true;
var bIsEmailVide = true;
var bIsEmailValide = true;
var bIsMdpVide = true;
var bAreMdpIdentique = true;
var bIsMdpTropCourt = true;
var bHasNotMdpMajuscule = true;
var bHasNotMdpChiffre = true;
var bIsMdp2Vide = true;
var bAreMdp2Identique = true;
var bIsMdp2TropCourt = true;
var bHasNotMdp2Majuscule = true;
var bHasNotMdp2Chiffre = true;

$(document).ready(function() {

    $("#formEnregistrement #prenom").blur(function() {
        if ($(this).val() == null || $(this).val().length === 0) {
            $(this).attr("placeholder", "Veuillez entrer un prénom");
            $(this).addClass("error");
            bIsPrenomVide = true;
        }
        else {
            $(this).removeClass("error");
            bIsPrenomVide = false;
        }
    });

    $("#formEnregistrement #nom").blur(function() {
        if ($(this).val() == null || $(this).val().length === 0) {
            $(this).attr("placeholder", "Veuillez entrer un nom");
            $(this).addClass("error");
            bIsNomVide = true;
        }
        else {
            $(this).removeClass("error");
            bIsNomVide = false;
        }
    });

    $("#formEnregistrement #email").blur(function() {
        if ($(this).val().length === 0) {
            $(this).attr("placeholder", "Veuillez entrer un email");
            $(this).addClass("error");
            bIsEmailVide = true;
        }
        else if (!((new RegExp("^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$")).test($(this).val()))) {
            $("#formEnregistrement #emailErrorMessage").text("Adresse email invalide");
            $(this).addClass("error");
            bIsEmailValide = true;
        }
        else {
            $("#formEnregistrement #emailErrorMessage").text("");
            $(this).removeClass("error");
            bIsEmailVide = false;
            bIsEmailValide = false;
        }
    });



    $("#formEnregistrement #mdp").on("keyup blur", function() {
        $("#formEnregistrement #mdpErrorMessage").text("");
        $(this).removeClass("error");
        bIsMdpVide = false;
        bAreMdpIdentique = false;
        bIsMdpTropCourt = false;
        bHasNotMdpMajuscule = false;
        bHasNotMdpChiffre = false;
        if ($(this).val().length === 0) {
            $(this).attr("placeholder", "Veuillez entrer un mot de passe de 10 caractères minimum");
            $("#formEnregistrement #mdp2ErrorMessage").text("");
            $(this).addClass("error");
            bIsMdpVide = true;
        }
        else if ($("#formEnregistrement #mdp2").val().length != 0 && $(this).val() != $("#formEnregistrement #mdp2").val()) {
            $("#formEnregistrement #mdp2ErrorMessage").text("Les mots de passe ne correspondent pas");
            $(this).addClass("error");
            bAreMdpIdentique = true;
        }
        else if ($(this).val().length <= 10) {
            $("#formEnregistrement #mdpErrorMessage").text("Mot de passe trop court");
            $(this).addClass("error");
            bIsMdpTropCourt = true;
        }
        else if (!(/[A-Z]+/.test($(this).val()))) {
            $("#formEnregistrement #mdpErrorMessage").text("Le mot de passe doit contenir au moins une majuscule");
            $(this).addClass("error");
            bHasNotMdpMajuscule = true;
        }
        else if (!(/\d/.test($(this).val()))) {
            $("#formEnregistrement #mdpErrorMessage").text("Le mot de passe doit contenir au moins un chiffre");
            $(this).addClass("error");
            bHasNotMdpChiffre = true;
        }
    });

    $("#formEnregistrement #mdp2").on("keyup blur", function() {
        $("#formEnregistrement #mdp2ErrorMessage").text("");
        $(this).removeClass("error");
        bIsMdp2Vide = false;
        bAreMdp2Identique = false;
        bIsMdp2TropCourt = false;
        bHasNotMdp2Majuscule = false;
        bHasNotMdp2Chiffre = false;
        if ($(this).val().length === 0) {
            $(this).attr("placeholder", "Veuillez entrer un mot de passe de 10 caractères minimum");
            $("#formEnregistrement #mdpErrorMessage").text("");
            $(this).addClass("error");
            bIsMdp2Vide = true;
        }
        else if ($("#formEnregistrement #mdp").val().length != 0 && $(this).val() != $("#formEnregistrement #mdp").val()) {
            $("#formEnregistrement #mdp2ErrorMessage").text("Les mots de passe ne correspondent pas");
            $(this).addClass("error");
            bAreMdp2Identique = true;
        }
        else if ($(this).val().length <= 10) {
            $("#formEnregistrement #mdp2ErrorMessage").text("Mot de passe trop court");
            $(this).addClass("error");
            bIsMdp2TropCourt = true;
        }
        else if (!(/[A-Z]+/.test($(this).val()))) {
            $("#formEnregistrement #mdp2ErrorMessage").text("Le mot de passe doit contenir au moins une majuscule");
            $(this).addClass("error");
            bHasNotMdp2Majuscule = true;
        }
        else if (!(/\d/.test($(this).val()))) {
            $("#formEnregistrement #mdp2ErrorMessage").text("Le mot de passe doit contenir au moins un chiffre");
            $(this).addClass("error");
            bHasNotMdp2Chiffre = true;
        }
    });

    $("#formEnregistrement").submit(function(e){
       if (bIsPrenomVide || bIsNomVide || bIsEmailVide || bIsEmailValide || bIsMdpVide|| bAreMdpIdentique
           || bIsMdpTropCourt || bHasNotMdpMajuscule || bHasNotMdpChiffre || bIsMdp2Vide || bAreMdp2Identique
           || bIsMdp2TropCourt || bHasNotMdp2Majuscule || bHasNotMdp2Chiffre) {
           e.preventDefault(e);
       }
    });
});