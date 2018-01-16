function controleform()
{


    if(document.getElementById("long_piece").value.length == 0 ||
        document.getElementById("largeur_piece").value.length == 0 ||
        document.getElementById("hauteur_piece").value.length == 0 ||
        document.getElementById("emplacement").value.length == 0)
    {
        document.getElementById("IdChampManquant").hidden=false;


    }


    $("#formediter #mdp").keyup(function () {
        $("#formediter #mdpErrorMessage").text("");
        $(this).removeClass("error");
        if ($(this).val().length === 0) {
            $(this).attr("placeholder", "Veuillez entrer un mot de passe de 10 caractères minimum");
            $("#formediter #mdp2ErrorMessage").text("");
            $(this).addClass("error");
        }
    });
});