/* 
 * fonction ajax
 */

function afficheDetail(id) {
    // Rôle : afficher le detail du prospect
    // Retour : neant
    // parametre : id : id du prospect
    
    $.ajax("prospect-ajax.php" , {
        method: "post",
        data: { id: id},
        success: retourDetail
    });
}

function retourDetail(data) {
    // Rôle : mettre à jour le DOM à partir de ce qui est envoyé par le serveur
    // Retour : néant
    // Paramètres :  data : donnée envoyer par php
    
    $(".detail").css("display", "block");
    $("#detail").html(data);
}

function retireDetail() {
    // Rôle : retire le detail du prospect
    // Retour : neant
    // parametre : neant
    
    $(".detail").css("display", "none");
    $("#detail").html("");
}

function afficheListeProspect() {
    // affiche la liste des prospect
    // Retour : neant
    // Parametres : neant
    
    let statut = $("#statut").val();
    
    $.ajax("statistique-ajax.php", {
       method: "post",
       data: { statut: statut},
       success: retourListeProspect
    });
}

function retourListeProspect(data) {
    // Rôle : mettre à jour le DOM à partir de ce qui est envoyé par le serveur
    // Retour : néant
    // Paramètres :  data : donnée envoyer par php
    
    $("#prospect").html(data);
}