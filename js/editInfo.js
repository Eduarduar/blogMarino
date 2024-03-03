let messageEstado = 0

class Validacion {
    #status = {
        name: false,
        lastName: false,
        userName: false,
        email: false
    }
    #name
    #lastName
    #userName
    #email

    constructor() {
        this.#name      = $('#name').val()
        this.#lastName  = $('#lastName').val()
        this.#userName  = $('#userName').val()
        this.#email     = $('#email').val()
    }

    #validarCampo(valorClase, valorInput){
        if (valorClase == valorInput){
            return false
        }
        return true
    }

    validarCambios(name, lastName, userName, email) {
        this.#status.name       = this.#validarCampo(this.#lastName, name)
        this.#status.lastName   = this.#validarCampo(this.#lastName, lastName)
        this.#status.userName   = this.#validarCampo(this.#userName, userName)
        this.#status.email      = this.#validarCampo(this.#email, email)
        if (this.#status.name || this.#status.lastName || this.#status.userName || this.#status.email){
            return true
        }
        return false
    }

    changeClassValues(name, lastName, userName, email){
        if (this.validarCambios(name, lastName, userName, email)){
            this.#name      = $('#name').val()
            this.#lastName  = $('#lastName').val()
            this.#userName  = $('#userName').val()
            this.#email     = $('#email').val()
        }
    }
    
}

// Evento para el messageContainer
function messageAlert(message, estado) {
    if (messageEstado == 0) {
        messageEstado = 1;
        if (estado == 0) {
            // 0 = no hay error
            $(".messageContainer p").html(message);
            $(".messageContainer").addClass("active");
            setTimeout(() => {
                $(".messageContainer").removeClass("active");
                $(".messageContainer").addClass("hide");
            }, 3000);

            setTimeout(() => {
                $(".messageContainer").removeClass("hide");
                $(".messageContainer p").html("‎ ");
                messageEstado = 0;
            }, 3500);
        } else {
            $(".messageContainer p").html(message);
            $(".messageContainer").addClass("active");
            $(".messageContainer").removeClass("bg-green-500");
            $(".messageContainer").addClass("bg-red-500");
            setTimeout(() => {
            $(".messageContainer").removeClass("active");
            $(".messageContainer").addClass("hide");
            }, 3000);

            setTimeout(() => {
                $(".messageContainer").removeClass("hide");
                $(".messageContainer").removeClass("bg-red-500");
                $(".messageContainer").addClass("bg-green-500");
                $(".messageContainer p").html("‎ ");
                messageEstado = 0;
            }, 3500);

            // Scroll to top of the page
        }
        return true;
    } else {
        return false;
    }
}

$(document).ready(function() {
    let name  = $('#name'), 
    lastName    = $('#lastName'),
    userName    = $('#userName'),
    email       = $('#email'),
    validacion  = new Validacion()

    const btnSubmit = $('#submit')

    btnSubmit.on('click', function(){
        if (validacion.validarCambios(name.val(), lastName.val(), userName.val(), email.val())){
            const formData = new FormData()

            formData.append('myName', name.val())
            formData.append('myLastName', lastName.val())
            formData.append('myUserName', userName.val())
            formData.append('myEmail', email.val())

            $.ajax({
                url: "../db/peticiones/manage.php",
                type: "POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.code == 0) {
                        validacion.changeClassValues(name, lastName, userName, email)
                        // Mostrar el mensaje de éxito
                        if (!messageAlert("changes were saved correctly", 0)) {
                            setTimeout(() => {
                            messageAlert("changes were saved correctly", 0)
                            }, 3500)
                        }
                    }else {
                        // Mostrar el mensaje de éxito
                        if (!messageAlert(response.message, 1)) {
                            setTimeout(() => {
                            messageAlert(response.message, 1)
                            }, 3500)
                        }
                    }
                },
                error: function (error) {
                    console.log(error)
                },
            });

        }else {
            messageAlert("make any changes before saving", 1)
        }

    })

})