function desactivar_gestion(id, button) {
// var   token=$('#token').val();

    if ($(button).attr("data-status")==0) {
         $('#loading').css("display", "block");
    $.get('desactivar_gestion/' + id+'/0', function (response) {
        $('#loading').css("display", "none");
        $(button).removeClass();
        $(button).addClass("btn btn-warning");
        $(button).text("ACTIVAR");
        $(button).attr("data-status","1");
        
    });
    }
    else{
                  $('#loading').css("display", "block");

    $.get('desactivar_gestion/' + id+'/1', function (response) {
                 $('#loading').css("display", "none");

        $(button).removeClass();
        $(button).addClass("btn btn-danger");
        $(button).text("DESACTIVAR");
        $(button).attr("data-status","0");
        
    });
    }

   


//   $.ajax({
//      url:'desactivar_gestion',
//    headers: {'X-CSRF-TOKEN': token},
//     dataType: 'json',
//     type: 'POST',
//     data:{id:id},
//     succes:function(data, textStatus, jqXHR){
//            
//             
//            
//             
//     },error:function(){
//            alert("adfadf");
//     }
//   });

}