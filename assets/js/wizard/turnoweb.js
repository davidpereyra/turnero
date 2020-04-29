$(function(){
    $("#form-register").validate({
        rules: {
            password : {
                required : true,
            },
            confirm_password: {
                equalTo: "#password"
            }
        },
        messages: {
            nombre: {
                required: "Por favor ingrese su nombre."
            },
            apellido: {
                required: "Por favor ingrese su apellido."
            },
            telefono: {
                required: "Por favor ingrese su telefono."
            },
            username: {
                required: "Por favor ingrese su usuario."
            },
            email: {
                required: "Por favor ingrese una direccion de correo válida."
            },
            password: {
                required: "Please provide a password"
            },
            confirm_password: {
                required: "Please provide a password",
                equalTo: "Please enter the same password"
            }
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
            previous : 'Back',
            next : '<i class="fa fa-arrow-right"></i>',
            finish : '<i class="fa fa-arrow-right"></i>',
            current : ''
        },
        onStepChanging: function (event, currentIndex, newIndex) { 
            
            var apellido = $('#apellido').val();
            var nombre = $('#nombre').val();
            var telefono = $('#telefono').val();
            var username = $('#username').val();
            var email = $('#email').val();
            var cardtype = $('#card-type').val();
            var cardnumber = $('#card-number').val();
            var cvc = $('#cvc').val();
            var month = $('#month').val();
            var year = $('#year').val();

            $('#nombre-val').text(nombre);
            $('#apellido-val').text(apellido);
            $('#telefono-val').text(telefono);
            $('#username-val').text(username);
            $('#email-val').text(email);
            $('#card-type-val').text(cardtype);
            $('#card-number-val').text(cardnumber);
            $('#cvc-val').text(cvc);
            $('#month-val').text(month);
            $('#year-val').text(year);

            $("#form-register").validate().settings.ignore = ":disabled,:hidden";
            return $("#form-register").valid();
        }
    });
});
