$(function(){
   
    $("#beolvas").on("click", beolvas);
    $("#kuld").on("click", adatKuld);
    $("article").delegate(".torol", "click", adatTorol);
    $("article").delegate(".szerkeszt", "click", adatSzerkeszt);
    $("#megse").on("click", adatMegse);
    $("#modosit").on("click", adatModosit);
    
});

var telefonkonyvem = [];

function beolvas(){
    $.ajax({
        type: "GET",
        url: "feldolgoz.php",
        success: function(result){
            console.log(result);
            telefonkonyvem = JSON.parse(result);
            console.log(telefonkonyvem);
            kiir();
        },
        error:function(){
            alert("Hiba az adatok betöltésekor!");
        }
    });
}

function kiir(){
    $("article").empty();
    for (var i = 0; i < telefonkonyvem.length; i++) {
        var ID = telefonkonyvem[i].ID;
        var nev = telefonkonyvem[i].nev;
        var tel = telefonkonyvem[i].tel;
        var kep = telefonkonyvem[i].kep;
        console.log(nev);
        var elem = "<div> <h2>"+ nev +"</h2><p>"+ tel +
                "</p><p>"+ kep +"</p><button id='"+ ID +
                "' class='torol'>Töröl</button> <button id='"+ i +
                "' class='szerkeszt'>Szerkeszt</button></div>";

        $("article").append(elem);
    }
}

function adatKuld(){
    var szemely = {
        nev : $("#nev").val(),
        tel : $("#tel").val(),
        kep : $("#kep").val()
    };
    
    $.ajax({
        type: "POST",
        url: "beir.php",
        data: szemely,
        success: function(ujSzemely){
            telefonkonyvem.push(JSON.parse(ujSzemely));
            console.log(telefonkonyvem);
            kiir();
        },
        error:function(){
            alert("Hiba az adatok mentésekor!");
        }
    });
}

function adatTorol(){
    console.log("Meghívtam a töröl metódust!");
    var ID = $(this).attr("id");
    console.log(ID);
    var aktElem = $(this).closest("div");
    $.ajax({
        type: "DELETE",
        url: "torles.php?ID=" + ID,
        success: function(){
            console.log("Megtörtént a törlés");
            aktElem.remove();
        },
        error:function(){
            alert("Hiba az adatok törlésekor!");
        }
    });
}

function adatSzerkeszt(){
    console.log("szerkeszt");
    $(".szerkesztes").removeClass("elrejt");
    var index = $(this).attr("id");
    console.log(index);
    $("#id2").val(telefonkonyvem[index].ID);
    $("#nev2").val(telefonkonyvem[index].nev);
    $("#tel2").val(telefonkonyvem[index].tel);
    $("#kep2").val(telefonkonyvem[index].kep);
}

function adatModosit()
{
    var editszemely = {
        ID : $("#id2").val(),
        nev : $("#nev2").val(),
        tel : $("#tel2").val(),
        kep : $("#kep2").val()
    };
    console.log("Modosit");
    $.ajax({
        type: "PUT",
        url: "modosit.php",
        data: editszemely,
        success: function(){
           
//            telefonkonyvem.push(JSON.parse(ujSzemely));
//            console.log(telefonkonyvem);
            beolvas();
        },
        error:function(){
            alert("Hiba az adatok mentésekor!");
        }
    });
    
}

function adatMegse(){
    $(".szerkesztes").addClass("elrejt");
}
