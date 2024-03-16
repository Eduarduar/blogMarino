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

function deleteCategory(id) {
  const formData = new FormData();
  formData.append("action", "deleteCategory");
  formData.append("id", id);
  $.ajax({
    url: "../db/peticiones/manage.php",
    type: "POST",
    data: formData,
    dataType: "json",
    processData: false,
    contentType: false,
    success: function (response) {
      if (response.code == 0) {
        if (!messageAlert(response.message, response.code)) {
          setTimeout(() => {
            messageAlert(response.message, response.code);
          }, 3500);
        }
        $(`#categoriesTable tr[data-id=${id}]`).remove();
      } else {
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
}

function addCategoryTable(data, est, table) {
  let id = data.id,
    nombre = data.nombre,
    estado = est;
  const row = $("<tr></tr>").addClass("odd").attr("data-id", id);
  const idCell = $("<td></td>").addClass("text-lg px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto").text(id);
  const nombreCell = $("<td></td>").addClass("text-lg px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto").text(nombre);
  const estadoCell = $("<td></td>").addClass("font-bold text-lg px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto").text(estado);
  const inputEdit = $("<input></input>").addClass("text-lg px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto bg-yellow-200").val(nombre);
  const buttonCell = $("<td></td>").addClass("text-lg px-6 py-4 whitespace-no-wrap space-between w-1/4 sm:w-auto");

  const editButton = $("<button></button>")
    .attr("data-id", id)
    .addClass(
      "hover:bg-blue-500 bg-transparent border-blue-500 text-blue-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]"
    )
    .html('<i class="ri-edit-box-line"></i>');

  const deleteButton = $("<button></button>")
    .attr("data-id", id)
    .addClass(
      "hover:bg-red-500 bg-transparent border-red-500 text-red-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]"
    )
    .html('<i class="ri-delete-bin-line"></i>');

  const buttonSave = $("<button></button>")
    .attr("data-id", id)
    .addClass(
      "hover:bg-green-500 bg-transparent border-green-500 text-green-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]"
    )
    .html('<i class="ri-save-line"></i>');

  const buttonCancel = $("<button></button>")
    .attr("data-id", id)
    .addClass(
      "hover:bg-red-500 bg-transparent border-red-500 text-red-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]"
    )
    .html('<i class="ri-close-line"></i>');

  const buttonStatus = $("<button></button>");
  if (estado == "HIDDEN") {
    estadoCell.addClass("text-red-500");
    buttonStatus.addClass("hover:bg-green-500 bg-transparent border-green-500 text-green-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]").html('<i class="ri-eye-fill"></i>');
  } else {
    estadoCell.addClass("text-green-500");
    buttonStatus.addClass("hover:bg-gray-600 bg-transparent border-gray-600 text-gray-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]").html('<i class="ri-eye-off-fill"></i>');
  }
    

  buttonCell.append(editButton, deleteButton, buttonStatus);
  row.append(idCell, nombreCell, estadoCell, buttonCell);
  
  table.prepend(row);
  
  
  // Attach event listeners to buttons
  function attachEventListeners() {
    deleteButton.off("click");
    editButton.off("click");
    buttonSave.off("click");
    buttonCancel.off("click");
    buttonStatus.off("click");
    inputEdit.off("click");

    inputEdit.on("keydown", function (e) {
      if (e.key === "Enter") {
        buttonSave.click();
      }
    });

    buttonStatus.on("click", function () {
      const formData = new FormData();
      formData.append("action", "updateStatusCategory");
      formData.append("id", id);
      if (estado == "VISIBLE") {
        formData.append("estado", 0);
      } else {
        formData.append("estado", 1);
      }
      $.ajax({
        url: "../db/peticiones/manage.php",
        type: "POST",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (response) {
          if (response.code == 0) {
            if (estado == "VISIBLE") {
              estado = "HIDDEN";
              estadoCell.text(estado);
              buttonStatus.empty();
              estadoCell.removeClass("text-green-500");
              estadoCell.addClass("text-red-500");
              buttonStatus.removeClass("hover:bg-gray-600 bg-transparent border-gray-600 text-gray-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]").html('<i class="ri-eye-off-fill"></i>');
              buttonStatus.addClass("hover:bg-green-500 bg-transparent border-green-500 text-green-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]").html('<i class="ri-eye-fill"></i>');
            } else {
              estado = "VISIBLE";
              estadoCell.text(estado);
              buttonStatus.empty();
              estadoCell.removeClass("text-red-500");
              estadoCell.addClass("text-green-500");
              buttonStatus.removeClass("hover:bg-green-500 bg-transparent border-green-500 text-green-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]").html('<i class="ri-eye-fill"></i>');
              buttonStatus.addClass("hover:bg-gray-600 bg-transparent border-gray-600 text-gray-500 border hover:text-white font-bold py-1 px-4 rounded mr-2 mb-2 text-xl transition duration-300 max-w-[54px] max-h-[41px]").html('<i class="ri-eye-off-fill"></i>');
            }
          } else {
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

    deleteButton.on("click", function () {
      if (confirm("Are you sure you want to delete this category? This will delete all posts linked to this")) {
        deleteCategory(id);
      }
    });

    editButton.on("click", function () {
      // insertamos el texto en el input 
      inputEdit.val(nombre);
      nombreCell.empty();
      nombreCell.append(inputEdit);
      buttonCell.empty();
      buttonCell.append(buttonSave, buttonCancel);
      // Re-attach event listeners
      attachEventListeners();
    });

    buttonSave.on("click", function () {
      const newNombre = inputEdit.val();
      // validamos que el nombre sea diferente al actual y que cumpla con las reglas de validación
      if (newNombre === nombre) {
        messageAlert("The category name is the same as the current one", 1);
        return;
      }
      if (newNombre.length <= 0) {
        messageAlert("The category field is required", 1);
        return;
      }
      if (newNombre.length > 100) {
        messageAlert("The category field must be less than 100 characters", 1);
        return;
      }
      const formData = new FormData();
      formData.append("action", "updateNameCategory");
      formData.append("id", id);
      formData.append("nombre", newNombre);
      $.ajax({
        url: "../db/peticiones/manage.php",
        type: "POST",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (response) {
          if (response.code == 0) {
            nombreCell.empty();
            nombreCell.text(newNombre);
            buttonCell.empty();
            buttonCell.append(editButton, deleteButton, buttonStatus);
            attachEventListeners();
            // guardamos el nuevo nombre
            nombre = newNombre;
          } else {
            if (!messageAlert(response.message, 1)) {
              setTimeout(() => {
                messageAlert(response.message, 1);
              }, 3500);
            }
          }
        },
        error: function (error) {
          console.log(error);
        }
    });
  });

    buttonCancel.on("click", function () {
      nombreCell.empty();
      nombreCell.text(nombre);
      buttonCell.empty();
      buttonCell.append(editButton, deleteButton, buttonStatus);
      // Re-attach event listeners
      attachEventListeners();
    });
  }
  // Attach event listeners to buttons
  attachEventListeners();
}

// ejemplo de uso de la función addCategoryTable
// addCategoryTable({id: 1, nombre: "categoria 1"}, "VISIBLE");

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
    } else if (estado == 1) {
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
    } else if (estado == 2) {
    $(".messageContainer p").html(message);
    $(".messageContainer").addClass("active");
    $(".messageContainer").removeClass("bg-green-500");
    $(".messageContainer").addClass("bg-yellow-500");
    setTimeout(() => {
      $(".messageContainer").removeClass("active");
      $(".messageContainer").addClass("hide");
    }, 3000);

    setTimeout(() => {
      $(".messageContainer").removeClass("hide");
      $(".messageContainer").removeClass("bg-yellow-500");
      $(".messageContainer").addClass("bg-green-500");
      $(".messageContainer p").html("‎ ");
      messageEstado = 0;
    }, 3500);
    }
    return true;
  } else {
    return false;
  }
}

function reloadTable() {
  // Create table structure
  let table = $('<table>').attr('id', 'categoriesTable').addClass('min-w-full divide-y divide-gray-200');
  let thead = $('<thead>');
  let tr = $('<tr>');
  let th1 = $('<th>').addClass('text-lg px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider').text('ID');
  let th2 = $('<th>').addClass('text-lg px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider').text('Category');
  let th3 = $('<th>').addClass('text-lg px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider').text('Status');
  let th4 = $('<th>').addClass('text-lg px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider').text('Action');

  tr.append(th1, th2, th3, th4);
  thead.append(tr);
  table.append(thead);

  let tbody = $('<tbody>').addClass('bg-white divide-y divide-gray-200');
  
  table.append(tbody);

  $('#container-table').html('');
  $('#container-table').append(table);

  const formData = new FormData();
  formData.append("action", "getCategories");
  $.ajax({
    url: "../db/peticiones/manage.php",
    type: "POST",
    data: formData,
    dataType: "json",
    processData: false,
    contentType: false,
    success: function (response) {
      if (response.code == 0) {
        Object.values(response.data).forEach((element) => {
          let estado = "VISIBLE";
          if (element.estado == 0) {
            estado = "HIDDEN";
          }
          addCategoryTable({ id: element.id, nombre: element.nombre }, estado, table);
        });
        $("#categoriesTable").DataTable();
      } else {
        // agregamos una fila con un mensaje de error
        const errorRow = $("<tr></tr>").addClass("error");
        const errorCell = $("<td></td>").attr("colspan", "4").addClass("text-center text-red-500 font-bold text-lg px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto").text(response.message);
        errorRow.append(errorCell);
        $("#categoriesTable").prepend(errorRow);
      } 
    },
    error: function (error) {
      // agregamos una fila con un mensaje de error
      const errorRow = $("<tr></tr>").addClass("error");
      const errorCell = $("<td></td>").attr("colspan", "4").addClass("text-center text-red-500 font-bold text-lg px-6 py-4 whitespace-no-wrap w-1/4 sm:w-auto").text("An error occurred while trying to get the categories. Please try again later.");
      errorRow.append(errorCell);
      $("#categoriesTable").prepend(errorRow);
      console.log(error);
    },
  });
}

$(document).ready(function () {
  const validacion = new Validacion();

  reloadTable();

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
              if (!messageAlert(response.message, response.code)) {
                setTimeout(() => {
                    messageAlert(response.message, response.code);
                }, 3500);
              }
              reloadTable();
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