$(document).ready(function() {

    // recuperamos todos los parametros de la url
    let url = new URL(window.location.href);

    // verificamos que exista el parametro code
    if (url.searchParams.has("code")) {

        // si existe, lo recuperamos
        let code = url.searchParams.get("code");

        // lo asignamos a un formData
        let formData = new FormData();
        formData.append("action", 'confirmCode');
        formData.append("code", code);

        // hacemos la peticion al servidor con ajax
        let consulta = $.ajax({
                url: './db/peticiones/recovery.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                error: function(error){
                    console.error(error);
                    alert("Error recovering password, try again later.");
                    window.location.href = "./404";
                    
                }
            });

        // recuperamos la respuesta de la funcion dentro de success
        consulta.done(function(response){
            if (!response.data){
                window.location.href = "./404";   
            }
        });

        function messageError(message) {
            $(".error-box").removeClass("display-none");
            $(".error-box").addClass("active");
        
            $("body").addClass("error");
            $(".error-box").addClass("display-block active");
        
            $(".log").addClass("display-none");
            $(".container-button").addClass("height-108");
        
            $(".error-box").html(message);
        
            setTimeout(function () {
            $(".error-box").removeClass("active");
            $(".error-box").addClass("display-none");
            $("body").removeClass("error");
            $(".container-button").removeClass("display-none");
            $(".log").removeClass("display-none");
            $(".container-button").removeClass("height-108");
            $(".error-box").html('');
            }, 3500);
        }

        const inputNewPassword = $("#newPassword");
        const inputConfirmPassword = $("#confirmPassword");
        const btnSubmit = $(".log");

        btnSubmit.click(function(event) {
            event.preventDefault(); // Cancels the form submission event

            // comprobamso que sean mas de 8 caracteres
            if (inputNewPassword.val().length < 8) {
                messageError("The password must be at least 8 characters long");
                return;
            }
            if (inputNewPassword.val() != "" && inputConfirmPassword.val() != "") {
                if (inputNewPassword.val() == inputConfirmPassword.val()) {
                    const formData = new FormData();
                    formData.append("password", inputNewPassword.val());
                    formData.append("code", code);
                    formData.append("action", "changePassword");
                    $.ajax({
                        url: "./db/peticiones/recovery.php",
                        type: "POST",
                        data: formData,
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.code == "0") {
                                $(".login-box").addClass("timeout");
                                $(".access-box").removeClass("display-none");
                                $(".access-box").addClass("active");
                    
                                if (window.matchMedia("(max-width: 768px)").matches) {
                                $("body").addClass("access");
                                $(".access-box").addClass("display-block");
                                $(".login-box").addClass("display-none");
                                } else {
                                $(".access-box").addClass("entrada");
                    
                                setTimeout(function () {
                                    $(".access-box").removeClass("entrada");
                                    $(".login-box").addClass("display-none");
                                }, 300);
                    
                                setTimeout(function () {
                                    $(".access-box").addClass("timeout");
                                }, 3000);
                    
                                setTimeout(function () {
                                    $(".access-box").removeClass("active");
                                    $(".access-box").removeClass("timeout");
                                    $(".access-box").html("");
                                }, 3300);
                                }
                    
                                setTimeout(function () {
                                window.location.href = "./login";
                                }, 3250);
                            } else {
                                messageError(response.message);
                            }
                        },
                        error: function(error) {
                            messageError("Connection error, try again later");
                            console.error(error);
                        }
                    });
                } else {
                    messageError("Passwords do not match");
                }
            } else {
                messageError("All fields are required");
            }
        });

    }else{
        window.location.href = "./404";
    }

});