$(document).ready(function() {
    // comprobamos si la cookie visit existe
    if (getCookie('visit') == null) {
        // si no existe la creamos
        setCookie('visit', 'true', 1); // la cookie expira en 1 día
        // actualizamos el valor en la base de datos
        const formData = new FormData();
        formData.append('action', 'updateCountVisits');



        $.ajax({
            url: "http://localhost:80/pruebas/blogMarino/db/peticiones/manage.php",
            type: "POST",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.code == 1) {
                    console.log(response);
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    }
});

function getCookie(name) {
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i].trim();
        if (cookie.startsWith(name + '=')) {
            return cookie.substring(name.length + 1);
        }
    }
    return null;
}

function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = 'expires=' + date.toUTCString();
    document.cookie = name + '=' + value + ';' + expires + ';path=/';
}
