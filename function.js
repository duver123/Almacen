//--------  Función  para Ocultar y mostrar elementos -----------------------------//
$(document).ready(function() {
    // Select para esconder div
    $('#categoria').on('change',function(){
        var SelectValue='.'+$(this).val();
        $('.FuncionOcultar div').hide();
        $(SelectValue).toggle();
    });
});