function recluta(){
    $.ajax({
        url:'controllers/sendMail.php',
        type:'POST',
        data: $('#form-recluta').serialize(),
        success:function(response){
            console.log(response)
            if(response == 1){
                swal("Gracias por postularte, nos comunicaremos con usted lo antes posible!","Dolce Nanna - Cuidar es Amar", "success");
                $('#form-recluta')[0].reset();
            }
            else{
                swal("Ops! no pudimos completar tu solicitud puedes intentarlo de nuevo, por favor","Dolce Nanna - Cuidar es Amar", "info");
            }
        }
    });

    return false;
}



$(function(){
    $('#status-menu').change(function(){
        if($('#status-menu').prop('checked')){
            console.log('si')
            $('.sidebar').addClass('active');
        }
        else{
            console.log('no')
            $('.sidebar').removeClass('active');
        }
    });
});