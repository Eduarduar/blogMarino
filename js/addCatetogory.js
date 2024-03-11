let messageEstado = 0;

class Validacion {
  #inputCategory;

  constructor() {
    this.#inputCategory = $("#categoria");
  }

  validarCategoria() {
    if (this.#inputCategory.val().length <= 0) {
      messageAlert("The category field is required", 1);
      return false;
    }
    if (this.#inputCategory.val().length > 100) {
      messageAlert("The category field must be less than 100 characters", 1);
      return false;
    }
    return true;
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
// Evento para el documento
$(document).ready(function () {

    const validacion = new Validacion();

  // Evento para el formulario
  $('#container-category').submit(function (e) {
    // evita que la página se recargue o el formulario se valide
    e.preventDefault();
  });

  // Evento para el botón de crear categoría
  $('#crear_cat').on("click", function (e) {
      const formData = new FormData();
      // Obtiene los valores de los inputs
      if (!validacion.validarCategoria()) {
        return;
      }
      const categoria = $('#categoria').val();
      formData.append("categoria", categoria);
      // Realiza la petición al servidor
      $.ajax({
          url: "../db/peticiones/manage.php",
          type: "POST",
          data: formData,
          dataType: "json",
          processData: false,
          contentType: false,
          success: function (response) {
              //Limpiar el input
              $('#categoria').val('');
              if (response.code == 0) {
                  if (
                  !messageAlert("Category successfully added", 0)
                  ) {
                  setTimeout(() => {
                      messageAlert("Category successfully added", 0);
                  }, 3500);
                  }
              } else {
                  // Mostrar el mensaje de error
                  console.log(response.message);
                  if (!messageAlert(response.message, 1)) {
                  setTimeout(() => {
                      messageAlert(response.message, 1);
                  }, 3500);
                  }
              }
          },
          error: function (error) {
            console.log(error);
          },
        });
    });
});