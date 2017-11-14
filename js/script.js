jQuery(document).ready(function() {
    var mostrar = false;
    var interval = 0;
    jQuery("#solicitud_eliminar").select2();
    jQuery("#mostrar_eliminar").click(function(){
        mostrar = !mostrar;

        if(mostrar){
            jQuery("#formulario_eliminar").removeClass('fadeOutRightBig').addClass('fadeInLeftBig').css('display','block');
        }else{
            jQuery("#formulario_eliminar").removeClass('fadeInLeftBig').addClass('fadeOutRightBig');

            setTimeout(function(){
                 jQuery("#formulario_eliminar").css('display','none');
                 console.log('algo');
            }, 550);
        }
    });

});
