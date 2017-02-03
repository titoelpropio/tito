
$(document).ready(function () {

       $('#loading').css("display","none");
    armarasiento();
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
    $('#fecha1').val(hoy);

         $('#guardar').hide();
         
            $(".btn-folder").on("click", function (e) {

                e.preventDefault();
     
                if ($(this).attr("data-status") === "1") {
                    $(this).attr("data-status", "0");
                    $(this).find("span").removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");
                } else {
                    $(this).attr("data-status", "1");
                    $(this).find("span").removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");
                }
                $(this).next("ul").slideToggle();
            });

});


input=0;
i=10
//document.getElementById("Bok").addEventListener('click', Ejecutar, false);
//    document.getElementById("Bres").addEventListener('click', Ejecutar, false);




function armarasiento()
{


    $.get("/listacategoria", function (response) {

        for (var i = 0; i < response.length; i++) {
            $("#listacategoria").append("  \n\
<li><a href='/asiento/" + response[i].id + "'  >" + response[i].nombre + "</a></li>");

        }

    });
}

function redireccionar(id) {

    $.ajax({
        url: "{{ URL::to('asiento/" + id + "')}}",
        success: function (result) {
            window.location.replace('/admin/categories');
        }
    })
}