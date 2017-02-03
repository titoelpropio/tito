$(document).ready(function () {


    for (var i = 0; i <= 16; i++) {
        if ($("#cag" + i).text() == '0') {
            $('#btnregistrar' + i).attr("disabled", true);
            $('#galpon' + i).text("NO EXISTE");

        }
        $('#ph' + i).text(parseInt((parseInt($('#total_galpon' + i).text()) * 100) / parseInt($('#cag' + i).text())) + '%');
        if (isNaN((parseInt($('#total_galpon' + i).text()) * 100) / parseInt($('#cag' + i).text()))) {
            $('#ph' + i).text("0%");

        }
    }

    var cantidad = 0;
    if (cantidad >= 0) {
        $('#tablagalpon2').attr("hidden", false);
    }





});

function obtenerhuevos(galpon) {
    if ($("#cag" + galpon).text() == '0') {
        $('#mensaje').attr("hidden", false);
        $('#mensaje').empty();
        $("#mensaje").append('<h2>Alerta : por favor inicie una nueva edad en este Galpon ' + galpon + '</h2>');

    } else
    {
        var celda1 = $("#g" + galpon + "c1").val();
        var celda2 = $("#g" + galpon + "c2").val();
        var celda3 = $("#g" + galpon + "c3").val();
        var celda4 = $("#g" + galpon + "c4").val();
        var gma1 = $("#gma" + galpon).val();
        if (celda4 == "" || celda1 == "" || celda2 == "" || celda3 == "" || gma1 == "")
        {
            alert("NO INTRODUSCA CAMPOS VACIOS EN EL GALPON 1...!!!");
        } else {
            var total_galpon1 = parseInt(celda1) + parseInt(celda2) + parseInt(celda3) + parseInt(celda4);
            $("#total_galpon" + galpon).text(parseInt(total_galpon1));

            var gm1 = parseInt($("#gm" + galpon).text()) + parseInt(gma1);
            $("#gm" + galpon).text(parseInt(gm1));

            var tm1 = parseInt($("#tm" + galpon).text()) + parseInt(gma1);
            $("#tm" + galpon).text(parseInt(tm1));
            var catotal = parseInt($("#catotal").text()) - parseInt(gma1);
            $("#catotal").text(parseInt(catotal));
            $("#gma" + galpon).val(0);

            var cag1 = parseInt($("#cig" + galpon).text()) - parseInt(tm1);
            var ph1 = (parseInt(total_galpon1) * 100) / parseInt(cag1);
            $("#ph" + galpon).text(parseInt(ph1) + "%");

            $("#cag" + galpon).text(parseInt(cag1));
            var edadg1 = parseInt($("#edadg" + galpon).text());

            var id_galpon = galpon;
            var token = $("#token").val();

            $.ajax({
                url: "http://localhost:8000/galponi",
                headers: {'X-CSRF-TOKEN': token},
                type: 'GET',
                dataType: 'json',
                data: {celda1: celda1, celda2: celda2, celda3: celda3, celda4: celda4, id_galpon: id_galpon, cantidad_total: total_galpon1, postura_p: ph1},
                success: function (data) {

                }
            });

            $.ajax({
                url: "http://localhost:8000/gallinamuerta",
                headers: {'X-CSRF-TOKEN': token},
                type: 'GET',
                dataType: 'json',
                data: {cantidad: gm1, id_galpon: id_galpon},
            });

            $.ajax({
                url: "http://localhost:8000/edad1a",
                headers: {'X-CSRF-TOKEN': token},
                type: 'GET',
                dataType: 'json',
                data: {edad: edadg1, cantidad_actual: cag1, total_muerta: tm1, id_galpon: id_galpon},
                success: function (data) {
                    $("#resultados").html("");


                    var mensaje = data.mensaje;
                    $("#resultados").append('<h2>Ronda ' + mensaje + '</h2>');
                }
            });
        }
    }

}

//});

///---GALPON 2




function mostrarceldas() {
    var fecha = $('#fecha1').val();
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth() + 1; //hoy es 0!
    var yyyy = hoy.getFullYear();

    if (dd < 10) {
        dd = '0' + dd
    }

    if (mm < 10) {
        mm = '0' + mm
    }

    hoy = yyyy + '-' + mm + '-' + dd;

    for (var j = 1; j <= 17; j++) {
        $('#g' + j + 'c1').val(0);
        $('#g' + j + 'c2').val(0);
        $('#g' + j + 'c3').val(0);
        $('#g' + j + 'c4').val(0);
        $('#ph' + j).text(0);
        $('#total_galpon' + j).text(0);
        $('#gm' + j).text(0);
        $('#btnregistrar' + j).attr("disabled", true);
    }

    if (fecha == hoy) {
        for (var j = 1; j <= 16; j++) {
            if ($("#cag" + j).text() !== '0') {
                $('#btnregistrar' + j).attr("disabled", false);
            }
        }

    }
    var token = $("#token").val();
 
    $.ajax({
        url: "http://localhost:8000/obtenerdadafecha",
        headers: {'X-CSRF-TOKEN': token},
        type: 'GET',
        dataType: 'json',
        data: {fecha: fecha},
        success: function (response) {
            for (var i = 0; i <=16; i++) {
                var nombre = response[i].nombre;
                for (var j = 0; j <= 16; j++) {
                    if (nombre == "Galpon " + j) {
                        $('#ph' + j).text(parseInt(response[i].postura_p) + '%');
                        $('#total_galpon' + j).text(response[i].cantidad_total);
                        $('#gm' + j).text(response[i].muertas);
                        $('#g' + j + 'c1').val(response[i].celda1);
                        $('#g' + j + 'c2').val(response[i].celda2);
                        $('#g' + j + 'c3').val(response[i].celda3);
                        $('#g' + j + 'c4').val(response[i].celda4);

                    }
                }

            }
        }
    });

}
