let card = function(titulo, texto, codigo) {

    let link =  `post?post=${codigo}`

        // Create a jQuery object with the HTML structure
    const $card = $('<div class="basic-card basic-card-light">' +
    '<div class="card-content">' +
    '<span class="card-title"> [TITULO] </span>' +
    '<p class="card-text">[TEXTO] </p>' +
    '</div>' +
    '<div class="card-link">' +
    '<a href="[LINK]]" title="Read Full"><span>Read Full</span></a>' +
    '</div>' +
    '</div>');

    // Replace the placeholder texts with variable
    $card.find('.card-title').text(titulo);
    $card.find('.card-text').text(texto);
    $card.find('a').attr('href', link);

    // Append the card to the document body or any other element
    $('section.cards').append($card);
}

let buscar = (e) => {
    const formData = new FormData();
    formData.append('busqueda', $("input.input-lg").val());
    $.ajax({
        url: './db/peticiones/peticiones.php', // La URL donde se enviarán los datos
        type: 'post', // La solicitud es de tipo POST
        data: formData, // Los datos que se enviarán al servidor
        dataType: 'json', // Tipo de dato que se recibirá del servidor
        contentType: false, // No se codificará el tipo de contenido
        processData: false,  // No se procesarán los datos antes de enviarlos
        success: function (respuesta){
            console.log(respuesta)
        },
        error: function (error) {
            // Manejar errores en la solicitud AJAX
            console.log('Error en la solicitud AJAX:', error.responseText);
        }
    })
    
}

$("input.input-lg").on('keypress', buscar)
$("input.input-lg").on('keydown', buscar)