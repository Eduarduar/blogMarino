$(document).ready(function() {

    
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

    const btnSubmit = $(".log")
    const email = $(".email");

    btnSubmit.click(function(event) {
        event.preventDefault(); // Cancels the form submission event

        if (email.val() != "") {
            const formData = new FormData();
            formData.append("email", email.val());
            formData.append("action", "setCode");
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
                    console.log(error);
                }
            });
        }else {
            messageError("Email field cannot be empty");
        }
    });

});