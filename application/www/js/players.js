'use strict';

var event = $("li").on("click",showPlayer);
var index;

function showPlayer()
{
    var playerID = $(this).val();
    $.getJSON(getRequestUrl()+"/select?id="+playerID, onReturnAjaxPlayer );

}

function onReturnAjaxPlayer(players) {

    $('#pj').empty();

    /*Nom, image et spe*/

    var fiche = $("<div>");
    fiche.attr("id","fiche");

        var name = $('<p>');
        name.attr("class","name");
        name.text(players.name);

        var image = $("<img>");
        image.attr("src", getWwwUrl()+players.photo);

        var spe = $("<p>");
        spe.text("Spécialité : " +players.speciality);
        spe.attr("class","spe");

    fiche.append(name).append(image).append(spe);



    /*Race, classe et description*/

    var info = $("<div>");
    info.attr("id","info");

        var racclass = $("<div>");
        racclass.attr("class","raceclass");

            var race = $("<p>");
            race.text("Race : " +players.race);
            race.attr("class","race");

            var classe = $("<p>");
            classe.text("Classe : " +players.job);
            classe.attr("class","classe");

            var titredescr = $("<h2>");
            titredescr.text("Description du personnage :");

            var descr = $("<p>");
            descr.text(players.description);
            descr.attr("class","descr");


    racclass.append(race).append(classe);
    info.append(racclass).append(titredescr).append(descr);


    /*Bag*/

    var bag = $("<div>");
    bag.attr("id","bag");

    /*Equipements*/

        var alleqpt = $("<div>");
        alleqpt.attr("id","alleqpt");

            var titreeqpt = $("<h2>");
            titreeqpt.text("Equipements :");

            var eqpt = $("<p>");
            eqpt.text(players.stuff);
            eqpt.attr("class","eqpt");

    alleqpt.append(titreeqpt).append(eqpt);

        /*Inventaires*/

        var allobjet = $("<div>");
        allobjet.attr("id","allobjet");

            var titreobjet = $("<h2>");
            titreobjet.text("Inventaire :");

            var item = $("<p>");
            item.text(players.items);
            item.attr("class","item");

    allobjet.append(titreobjet).append(item);

    bag.append(alleqpt).append(allobjet);

    $('#pj').append(fiche).append(info).append(bag);

}

