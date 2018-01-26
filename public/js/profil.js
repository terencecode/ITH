var bEstEmailVide = false;
var bEstEmailInvalide = false;
var bAreMdpIdentique = false;
var bEstMdpTropCourt = false;
var bNaPasMdpMajuscule = false;
var bNaPasMdpChiffre = false;
var bEstMdp2Identique = false;
var bEstMdp2TropCourt = false;
var bNaPasMdp2Majuscule = false;
var bNaPasMdp2Chiffre = false;

$(document).ready(function() {

    $("#email").on("keyup blur", function() {
        if ($(this).val().length === 0) {
            $(this).attr("placeholder", "Veuillez entrer un email");
            $(this).addClass("error");
            bEstEmailVide = true;
        }
        else if (!((new RegExp("^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$")).test($(this).val()))) {
            $("#emailErrorMessage").text("Adresse email invalide");
            $(this).addClass("error");
            bEstEmailInvalide = true;
        }
        else {
            $("#emailErrorMessage").text("");
            $(this).removeClass("error");
            bEstEmailVide = false;
            bEstEmailInvalide = false;
        }
    });

    $("#mdp").on("keyup blur", function() {
        $("#mdpErrorMessage").text("");
        $(this).removeClass("error");
        bAreMdpIdentique = false;
        bEstMdpTropCourt = false;
        bNaPasMdpMajuscule = false;
        bNaPasMdpChiffre = false;
        if ($(this).val().length === 0 && $("#mdp").val().length === 0) {
            $("#mdp2ErrorMessage").text("");
            $("#mdp2").removeClass("error");
            $(this).removeClass("error");
            return;
        }
        else if ($("#mdp").val().length != 0 && $(this).val() != $("#mdp2").val()) {
            $("#mdp2ErrorMessage").text("Les mots de passe ne correspondent pas");
            $(this).addClass("error");
            bAreMdpIdentique = true;
        }
        else if ($(this).val().length <= 10) {
            $("#mdpErrorMessage").text("Mot de passe trop court");
            $(this).addClass("error");
            bEstMdpTropCourt = true;
        }
        else if (!(/[A-Z]+/.test($(this).val()))) {
            $("#mdpErrorMessage").text("Le mot de passe doit contenir au moins une majuscule");
            $(this).addClass("error");
            bNaPasMdpMajuscule = true;
        }
        else if (!(/\d/.test($(this).val()))) {
            $("#mdpErrorMessage").text("Le mot de passe doit contenir au moins un chiffre");
            $(this).addClass("error");
            bNaPasMdpChiffre = true;
        }
    });

    $("#mdp2").on("keyup blur", function() {
        $("#mdp2ErrorMessage").text("");
        $(this).removeClass("error");
        bEstMdp2Identique = false;
        bEstMdp2TropCourt = false;
        bNaPasMdp2Majuscule = false;
        bNaPasMdp2Chiffre = false;
        if ($(this).val().length === 0 && $("#mdp").val().length === 0) {
            $("#mdpErrorMessage").text("");
            $("#mdp").removeClass("error");
            $(this).removeClass("error");
            return;
        }
        else if ($("#mdp").val().length != 0 && $(this).val() != $("#mdp").val()) {
            $("#mdp2ErrorMessage").text("Les mots de passe ne correspondent pas");
            $(this).addClass("error");
            bEstMdp2Identique = true;
        }
        else if ($(this).val().length <= 10) {
            $("#mdp2ErrorMessage").text("Mot de passe trop court");
            $(this).addClass("error");
            bEstMdp2TropCourt = true;
        }
        else if (!(/[A-Z]+/.test($(this).val()))) {
            $("#mdp2ErrorMessage").text("Le mot de passe doit contenir au moins une majuscule");
            $(this).addClass("error");
            bNaPasMdp2Majuscule = true;
        }
        else if (!(/\d/.test($(this).val()))) {
            $("#mdp2ErrorMessage").text("Le mot de passe doit contenir au moins un chiffre");
            $(this).addClass("error");
            bNaPasMdp2Chiffre = true;
        }
    });

    $("#formProfil").submit(function(e){
        if (bEstEmailVide || bEstEmailInvalide || bAreMdpIdentique || bEstMdpTropCourt || bNaPasMdpMajuscule ||
            bNaPasMdpChiffre || bEstMdp2Identique || bEstMdp2TropCourt || bNaPasMdp2Majuscule || bNaPasMdp2Chiffre) {
            e.preventDefault(e);
        }
    });

    $("#cancelModif").on("click", function() {
        $("#nom").val(donnees[2]);
        $("#prenom").val(donnees[1]);
        $("#email").val(donnees[0]);
        console.log(donnees);
    });
});