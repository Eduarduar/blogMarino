// varibles globales
let currentScroll = $(".layout").scrollTop();

let messageEstado = 0; // 0 activo, 1 desactivado

// class para contar los contenedores de texto e imagen
class Counts {
  #countContainers;
  #elements;

  // constructor de la clase
  constructor() {
    this.#countContainers = 0;
  }

  // metodo para quitar un contenedor de texto
  removeContainer() {
    this.#countContainers--;
  }

  // metodo para agregar un nuevo contenedor de texto
  addContainer() {
    this.#countContainers++;
  }

  // metodo para eliminar un contenedor de texto
  countContainers() {
    return this.#countContainers;
  }
}

function createDOMContent(counts) {
  count = counts.countContainers();
  // Crear un elemento div
  const div = $("<div>").addClass("mt-5 text-area-container container-module");

  // Crear un elemento label
  const label = $("<label>")
    .addClass("block text-sm font-medium text-gray-700")
    .text("Content")
    .attr("for", "content");

  // Crear un elemento textarea
  const textarea = $("<textarea>")
    .attr("id", `content${count}`)
    .attr("name", `content${count}`)
    .addClass(
      "p-2 mt-1 block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm min-h-[200px] text-lg textarea"
    )
    .attr("required", "");

  // Crear un elemento botón de eliminar
  const deleteButton = $("<button>")
    .addClass(
      "hover:bg-red-700 font-bold lg:py-4 lg:px-8 rounded border border-red-500 text-red-600 hover:text-white transition duration-300 mt-2 py-2 px-4 text-sm"
    )
    .attr("type", "button")
    .text("Delete Text");

  // Crear un elemento div contenedor para el botón de eliminar
  const buttonContainer = $("<div>")
    .addClass("flex justify-center")
    .append(deleteButton);

  // Agregar el label, textarea y buttonContainer al div
  div.append(label, textarea, buttonContainer);

  // Evento para el botón "Eliminar Texto"
  deleteButton.on("click", function () {
    counts.removeContainer();
    currentScroll -= 286;
    div.remove();
  });

  // Devolver el elemento div
  return div.get(0);
}

function createDOMImage(counts) {
  count = counts.countContainers();
  // Crear un elemento div
  const div = $("<div>").addClass("mt-5 image-container container-module");

  // Crear un elemento label
  const label = $("<label>")
    .addClass("block text-sm font-medium text-gray-700")
    .text("Imagen")
    .attr("for", `image${count}`);

  // Crear un elemento img
  const img = $("<img>")
    .attr("src", "../source/img/image.jpg")
    .attr("alt", "Image")
    .addClass(
      "w-50 object-cover rounded-md mx-auto max-h-[500px] hover:scale-95 transition duration-300 cursor-pointer"
    );

  // Crear un elemento input de tipo file
  const input = $("<input>")
    .attr("type", "file")
    .attr("id", `image${count}`)
    .attr("name", `image${count}`)
    .addClass("hidden image-input")
    .attr("required", "")
    .attr("accept", "image/*");

  // Crear un elemento botón de eliminar
  const deleteButton = $("<button>")
    .addClass(
      "hover:bg-red-700 font-bold lg:py-4 lg:px-8 rounded border border-red-500 text-red-600 hover:text-white transition duration-300 mt-2 py-2 px-4 text-sm"
    )
    .attr("type", "button")
    .text("Delete Image");

  // Crear un elemento div contenedor para el botón de eliminar
  const buttonContainer = $("<div>")
    .addClass("flex justify-center")
    .append(deleteButton);

  // Agregar el label, img, input y buttonContainer al div
  div.append(label, img, input, buttonContainer);

  // Evento para el botón "Eliminar Imagen"
  deleteButton.on("click", function () {
    counts.removeContainer();
    currentScroll -= 442;
    div.remove();
  });

  // Evento para el input:file
  input.on("change", function () {
    const files = input.get(0).files;

    // Validar que solo se haya seleccionado un archivo
    if (files.length !== 1) {
      messageAlert("Please select only one file.", 1);
      return;
    }

    const file = files[0];
    const reader = new FileReader();

    // Validar si se seleccionó una imagen
    if (!file) {
      return;
    }

    // Validar el tamaño del archivo
    const maxSize = 10 * 1024 * 1024; // 10MB
    if (file.size > maxSize) {
      messageAlert(
        "The file is too large. Please select a file smaller than 10MB.",
        1
      );
      input.val(""); // Reset the file input
      return;
    }

    // Validar la extensión del archivo
    const allowedExtensions = ["png", "jpg", "jpeg"];
    const fileExtension = file.name.split(".").pop().toLowerCase();
    if (!allowedExtensions.includes(fileExtension)) {
      messageAlert(
        "Invalid file format. Please select a PNG, JPG or JPEG file.",
        1
      );
      return;
    }

    // Lógica para cambiar la imagen
    reader.onload = function (e) {
      img.attr("src", e.target.result);
    };

    reader.readAsDataURL(file);
  });

  // Evento para el elemento img
  img.on("click", function () {
    input.click(); // Activar el evento click del input:file
  });

  // Devolver el elemento div
  return div.get(0);
}

function generateRandomFileName(name) {
  const extension = name.split(".").pop();
  const random = Math.random().toString(36).substring(2, 15);
  return `${random}.${extension}`;
}

function uploadImage(file, fileName) {
  let formData1 = new FormData();
  formData1.append("file", file);
  formData1.append("fileName", fileName);

  $.ajax({
    url: "../db/peticiones/manage.php",
    type: "POST",
    data: formData1,
    dataType: "json",
    processData: false,
    contentType: false,
    success: function (response) {
      console.log(response.message);
    },
    error: function (error) {
      // Mostrar el mensaje de error
      messageAlert(error.message, 1);
    },
  });
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
    // lo mandamos al inicio de la pagina para que vea el mensaje
    $(".layout").animate({ scrollTop: 0 }, "medium");
    return true;
  } else {
    return false;
  }
}

// Evento para el documento
$(document).ready(function () {
  let count = new Counts();

  // Evento para el botón "Agregar Imagen"
  $("#addImage").on("click", function (e) {
    const image = createDOMImage(count);
    // Agregar el elemento creado al final del formulario
    $("#container-post").append(image);
    // Incrementar el contador de contenedores de imagen
    count.addContainer();

    // ahora le sumamos una cantidad al scroll
    currentScroll += 442;
    $(".layout").animate({ scrollTop: currentScroll }, "slow");
  });

  // Evento para el botón "Agregar Texto"
  $("#addContent").on("click", function (e) {
    const content = createDOMContent(count);
    // Agregar el elemento creado al final del formulario
    $("#container-post").append(content);
    // Incrementar el contador de contenedores de texto
    count.addContainer();

    // ahora le sumamos una cantidad al scroll
    currentScroll += 286;
    $(".layout").animate({ scrollTop: currentScroll }, "slow");
    currentScroll += $(".layout").scrollTop();
  });

  // Evento para el botón "Submit"
  $("#submit").on("click", function () {
    let form = $("form")[0];
    let modules_form = $(".container-module");
    let title = $("#title").val();
    let category = $("#category").val();

    // Validamos el input del titulo y el select de categoria
    if (title === "" || category === "" || category === "0") {
      messageAlert("Please fill in the title and select a category.", 1);
      return;
    }

    let modules = [];
    let imageFiles = [];

    for (let i = 0; i < modules_form.length; i++) {
      let type, content, position;

      if ($(modules_form[i]).hasClass("text-area-container")) {
        type = "text";
        content = $(modules_form[i]).find("textarea").val();
        position = i;

        if (content === "") {
          messageAlert("Please fill in the content.", 1);
          return;
        }
      } else {
        type = "image";
        let fileInput = $(modules_form[i]).find("input");
        let files = fileInput[0].files;

        // Validar que solo se haya seleccionado un archivo por input
        if (files.length !== 1) {
          messageAlert("Please select only one file.", 1);
          return;
        }

        let file = files[0];

        if (!file) {
          return;
        }

        imageFiles.push(file); // push ingresa el archivo al final del array
        content = "";
        position = i;
      }

      modules.push({ type: type, content: content, position: position });
    }

    let modulesUpsated = [];

    // Validar las imágenes
    for (let i = 0; i < imageFiles.length; i++) {
      let file = imageFiles[i];
      let fileName = generateRandomFileName(file.name);
      let filePath = `../source/public/img/${fileName}`;

      // Validar el tamaño del archivo
      let maxSize = 10 * 1024 * 1024; // 10MB
      if (file.size > maxSize) {
        messageAlert("Image size exceeds the maximum limit of 10MB.", 1);
        return;
      }

      // Validar la extensión del archivo
      let allowedExtensions = ["png", "jpg", "jpeg"];
      let fileExtension = file.name.split(".").pop().toLowerCase();
      if (!allowedExtensions.includes(fileExtension)) {
        messageAlert(
          "Invalid file format. Please select a PNG, JPG or JPEG file.",
          1
        );
        return;
      }

      // Cambiar el contenido de los módulos de tipo imagen
      for (let i in modules) {
        if (modules[i].type === "image") {
          // si ya esta actualizado el modulo, no lo actualiza
          if (modulesUpsated.includes(modules[i])) {
            continue;
          }
          modules[i].content = filePath;
          modulesUpsated.push(modules[i]);
          break;
        }
      }

      // Subir la imagen al servidor
      uploadImage(file, fileName);
    }

    const formData = new FormData();
    formData.append("title", title);
    formData.append("category", category);
    formData.append("modules", JSON.stringify(modules));
    // Enviar la petición AJAX

    $.ajax({
      url: "../db/peticiones/manage.php",
      type: "POST",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.code == 0) {
          // Mostrar el mensaje de éxito
          if (!messageAlert("post added successfully", 0)) {
            setTimeout(() => {
              messageAlert("post added successfully", 0);
            }, 3500);
          }
        }
      },
      error: function (error) {},
    });

    // Limpiar el formulario
    form.reset();
    // Eliminar los contenedores de texto
    for (let i = 1; i < modules_form.length; i++) {
      if ($(modules_form[i]).hasClass("text-area-container")) {
        currentScroll -= 286;
      } else {
        currentScroll -= 442;
      }
      $(modules_form[i]).remove();
    }
    // Eliminar los contenedores de imagen
    $(".image-container").remove();
    // Reiniciar el contador de contenedores
    count = new Counts();
  });
});
