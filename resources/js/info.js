function sendDom(){
    $.ajax({
        url:'../../controllers/domicilio.php',
        type:'POST',
        data: $('#form-dom').serialize(),
        success: function(resources){
            console.log(resources);
            if(resources == 1){
                swal("Domicilio agregado exitosamente", "---", "success").then((val) =>{
                    location.reload();
                });
            }
            else{
                swal("Ooops Ocurrio un error intente mas tarde!", "---", "error")
            }
        }
    });

    return false;
}


$(function(){
    $('#cp-input').keyup(function(){
        if($('#cp-input').val() != ''){
            $.ajax({
                url:'../../controllers/info.php',
                type:'POST',
                data: {cp: $('#cp-input').val()},
                success: function(resources){
                    console.log(resources);
                    if(resources == '-1'){
                        $('.dom-camp').empty();
                        $('.dom-camp').val('');
                    }
                    else{
                        $('.dom-camp').empty();
                        $('#colonia').append('<option value="">Selecciona una colonia</option>');
                        data = JSON.parse(resources);
                        $.each(data, function(key, item){
                            $('#municipio').val(item.municipio);
                            $('#estado').val(item.estado);
                            $('#colonia').append('<option value="'+item.clave+'">'+item.colonia+'</option>');
                        });
                    }
                }
            });
        }
    });
});