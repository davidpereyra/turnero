$(function(){
    $("#form-register").validate({
        rules: {
            sector : {
                required : true,
            },
            operacion : {
                required : true,
            },           
            operacions:{
                required : true,
            },
            fecha : {
                required : true,
            },
            dias : {
                required : true,
            },
            hora : {
                required : true,
            },
        },
        messages: {
            nombre: {
                required: "Por favor ingrese su nombre."
            },
            apellido: {
                required: "Por favor ingrese su apellido."
            },
            dni: {
                required: "Por favor ingrese su DNI."
            },
            telefono: {
                required: "Por favor ingrese su telefono."
            },
            email: {
                required: "Por favor ingrese su email."
            },
            operacion: {
                required: "Por favor seleccione una operacion."
            },
            operacions: {
                required: "Por favor seleccione una operacion."
            },
            sector: {
                required: "Por favor seleccione un sector."
            },
            fecha: {
                required: "Por favor seleccione una fecha."
            },
            hora: {
                required: "Por favor seleccione una hora."
            },
           
        }
    });
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        // enableAllSteps: true,
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<div class="title">#title#</div>',
        labels: {
            previous : 'Volver',
            next : '<i class="fa fa-arrow-right"></i>',
            finish : '<i class="fa fa-arrow-right"></i>',
            current : ''
        },
        onStepChanging: function (event, currentIndex, newIndex) { 
            
            
            var nombre = $('#nombre').val();
            var apellido = $('#apellido').val();
            var dni = $('#dni').val();
            var telefono = $('#telefono').val();            
            var email = $('#email').val();            
            var sector = $('#sector').val();
            var operacion = $('#operacion').val();
            var operacions = $('#operacions').val();
            var fecha = $('#fecha').val();
            var hora = $('#hora').val();
            var comentario = $('#comentario').val();

            $('#nombre-val').text(nombre);
            $('#apellido-val').text(apellido);
            $('#dni-val').text(dni);
            $('#telefono-val').text(telefono);            
            $('#email-val').text(email);            
            $('#sector-val').text(sector);
            $('#operacion-val').text(operacion);
            $('#operacions-val').text(operacions);
            $('#fecha-val').text(fecha);
            $('#hora-val').text(hora);
            $('#comentario-val').text(comentario);

            $("#form-register").validate().settings.ignore = ":disabled,:hidden";
            return $("#form-register").valid();
        }
    });
});
