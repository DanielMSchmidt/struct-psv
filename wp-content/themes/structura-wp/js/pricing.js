/**
 * @author Daniel Schmidt
 *
 * Dieses Script ist f√ºr das aktiv setzen der Checkboxen
 * und ver√§ndert die Werte in den Tabellen
 */
//GLOABLS
var lastMultiplikator = new Array('0', '0', '0', '0', '0');

$(document).ready(function() {
    if ($.browser.msie) {

        $("div#pricing div#boxes").hide();
        $("div#pricing div.headline").hide();
        $("div#pricing div#altText").show();

    } else {

        $("div#pricing div#altText").hide();
        $("div#pricing div#boxes div.ballroom").hide();
        $("div#pricing div#boxes div div.inputvalue").hide();
        $("div#pricing div#boxes div div.errornotice").hide();

        $("#pricing #boxes div").click(function() {
            //ruft bei jedem Click auf eine Checkbox den optimizer auf
            optimizeHeight();
        });

/*
*  $("#pricing #tabelle tr").mouseenter(function(){
*    console.log("Mouse enter");
*    console.log($(this).children());
*    $(this).children().stop().animate({backgroundColor: '#3F709C'}, 1500);
*  }).mouseleave(function(){
*    console.log("Mouse leave");
*    console.log($(this).children());
*    $(this).children().stop().animate({backgroundColor: '#FFFFFF'}, 500);
*  });
*/
        $("div#pricing div#boxes div.tanzen div.checkbox").click(function() {
            //Selektiert das Tanzen, setzt Ballroom auf inactive
            $("div#pricing div#boxes div.ballroom").fadeToggle('slow');
            $("div#pricing div#boxes div.tanzen").toggleClass("active");
            $("div#pricing div#boxes div.ballroom").removeClass('active');
            lastMultiplikator = change(generateMultiplikator());
        });

        $("div#pricing div#boxes div.ballroom div.checkbox").click(function() {
            //Selektiert die Ballroom Kings
            $("div#pricing div#boxes div.ballroom").toggleClass('active');
            lastMultiplikator = change(generateMultiplikator());
        });

        $("div#pricing div#boxes div.handball div.checkbox").click(function() {
            //Selektiert Handball
            $("div#pricing div#boxes div.handball").toggleClass("active");
            $("div#pricing div#boxes div.handball div.inputvalue").toggle('slow');
            lastMultiplikator = change(generateMultiplikator());
        });


        $("div#pricing div#boxes div.inputvalue").keyup(function() {
            lastMultiplikator = change(generateMultiplikator());
        });

        function generateMultiplikator() {
            // Array Schema: unused, Kinder, Erwachsene, Paare, Familien
            var handball = new Array('1', '1', '1', '1', '1');
            var ballroom = new Array('0', '0', '-4', '0', '0');
            var tanzen = new Array('5', '4.5', '9', '18', '22.5');
            var erg = new Array('0', '0', '0', '0', '0');

            if ($("div#pricing div#boxes div.handball").hasClass("active")) {
                var multiplik = 0;
                if (parseFloat($("div#pricing div#boxes div.handball div.inputvalue input").val()).toString() != "NaN") {
                    multiplik = parseFloat($("div#pricing div#boxes div.handball div.inputvalue input").val());
                } else {
                    if ($("div#pricing div#boxes div.handball div.inputvalue input").val() != "") {
                        alert("Fehlerhafte Eingabe, bitte geben sie eine Zahl an!");
                        $("div#pricing div#boxes div.handball div.inputvalue input").val("");
                    } else {
                    }
                    multiplik = 0;
                }
                erg = getNextErg(multiplik, handball, erg);
            }
            if ($("div#pricing div#boxes div.tanzen").hasClass("active")) {
                var multiplik = 0;
                erg = getNextErg(1, tanzen, erg);
            }
            if ($("div#pricing div#boxes div.ballroom").hasClass("active")) {
                var multiplik = 0;
                erg = getNextErg(1, ballroom, erg);
            }

            return erg;

        }
        function getNextErg(zahl, arr1, arr2) {
            /*  zahl = value aus den Inputfields
           *  arr1 = tanzen / ballroom / handball
           *  arr2 = zu speichernden Wert (vlt schon erhöht)
           */
            for (i = 1; i < arr2.length; i++) {
                switch (i) {
                case 3:
                    if (parseFloat(zahl) > 1) {
                        arr2[i] = parseFloat(parseFloat(arr2[i]) + parseFloat(arr1[i]) * 2);
                    } else {
                        arr2[i] = parseFloat(parseFloat(arr2[i]) + (parseFloat(arr1[i]) * zahl));
                    }
                    break;
                case 4:
                    arr2[i] = parseFloat(parseFloat(arr2[i]) + (parseFloat(arr1[i]) * zahl));
                    break;
                default:
                    arr2[i] = parseFloat(parseFloat(arr2[i]) + parseFloat(arr1[i]));
                    break;
                }
            }
            return arr2;
        }
        function change(multiplikator) {
            for (i = 1; i < 4; i++) {
                for (j = 1; j < 5; j++) {
                    var class1 = ".row" + i.toString();
                    var class2 = ".col" + j.toString();
                    var searchsting = "div#pricing div#tabelle td" + class1 + class2;
                    var value = $(searchsting).text();
                    value = value.slice(0, (value.length - 2));
                    var mult = 0;
                    switch (i) {
                    case 1:
                        mult = (multiplikator[j] - lastMultiplikator[j]) * 1;
                        break;
                    case 2:
                        mult = (multiplikator[j] - lastMultiplikator[j]) * 3;
                        break;
                    case 3:
                        mult = (multiplikator[j] - lastMultiplikator[j]) * 12;
                        break;
                    }
                    value = parseFloat(value) + mult;
                    $(searchsting).html(generateOutput(value));
                }
            }
            return multiplikator;
        }
        function generateOutput(value){
          //da value float sein kann, kann er sich von parseInt(value) unterscheiden
           if (value != parseInt(value)){
             var val = value.toString() + "0";
           }else{
             var val = value.toString();
           }
           val = val + " &euro;";
           return val;
        }
        function optimizeHeight() {
            if ($("div#pricing div#boxes div.handball").hasClass('active')) {
                //wenn es ein actives Element gibt setze CSS auf Länge für inputfield
                $("div#pricing div#boxes").css("height", "150px");
            } else {
                $("div#pricing div#boxes").css("height", "75px");
            }
        }
    }
});

