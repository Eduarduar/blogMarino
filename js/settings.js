let messageEstado = 0;

class ValidacionPass {
  #status = {
    nPass: false,
    cPass: false,
  };
  #inputNewPass;
  #inputConfirmPass;
  #inputCurrentPass;

  constructor() {
    this.#inputNewPass = $("#newPassword");
    this.#inputConfirmPass = $("#confirmPassword");
    this.#inputCurrentPass = $("#currentPassword");
  }

  #validarCampo = function (pass) {
    const expreccionPassword = /^[a-zA-Z0-9.,_-]*$/;
    if (expreccionPassword.test(pass)) {
      return true;
    }
    return false;
  };

  validarCampos = function () {
    this.#status.nPass = this.#validarCampo(this.#inputNewPass.val());
    if (this.#inputNewPass.val().length < 8) {
      messageAlert("The password must have a minimum of 8 characters", 1);
      return false;
    }
    if (this.#inputNewPass.val().length > 50) {
      messageAlert("The password must have a maximum of 50 characters", 1);
      return false;
    }
    if (
      this.#inputNewPass.val() == "" ||
      this.#inputConfirmPass.val() == "" ||
      this.#inputCurrentPass.val() == ""
    ) {
      messageAlert("Fill in all the spaces", 1);
      return false;
    }
    if (!this.#status.nPass) {
      messageAlert(
        "Your new password must not contain spaces or special characters",
        1
      );
      return false;
    }
    if (this.#inputNewPass.val() != this.#inputConfirmPass.val()) {
      messageAlert("Your new password does not match", 1);
      return false;
    }
    return true;
  };

  limpiarCampos = function () {
    this.#inputNewPass.val("");
    this.#inputConfirmPass.val("");
    this.#inputCurrentPass.val("");
    this.#status.nPass = false;
    this.#status.cPass = false;
  };
}

class Validacion {
  #status = {
    name: false,
    lastName: false,
    userName: false,
    email: false,
  };
  #inputName;
  #inputLastName;
  #inputUserName;
  #inputEmail;
  #name;
  #lastName;
  #userName;
  #email;

  constructor() {
    this.#inputName = $("#name");
    this.#inputLastName = $("#lastName");
    this.#inputUserName = $("#userName");
    this.#inputEmail = $("#email");
    this.#name = this.#inputName.val();
    this.#lastName = this.#inputLastName.val();
    this.#userName = this.#inputUserName.val();
    this.#email = this.#inputEmail.val();
  }

  #validarCampo(valorClase, valorInput, input) {
    if (valorInput.length > 100) {
      messageAlert(`The ${input} must have a maximum of 100 characters`, 1);
      return false;
    }
    if (valorClase == valorInput) {
      return false;
    }
    return true;
  }

  validarCambios(name, lastName, userName, email) {
    this.#status.name = this.#validarCampo(this.#name, name, "Name");
    this.#status.lastName = this.#validarCampo(
      this.#lastName,
      lastName,
      "Last Name"
    );
    (this.#status.userName = this.#validarCampo(this.#userName, userName)),
      "User Name";
    this.#status.email = this.#validarCampo(this.#email, email, "E-Mail");
    if (
      this.#status.name ||
      this.#status.lastName ||
      this.#status.userName ||
      this.#status.email
    ) {
      return true;
    }
    return false;
  }

  changeClassValues(name, lastName, userName, email) {
    if (this.validarCambios(name, lastName, userName, email)) {
      this.#name = this.#inputName.val();
      this.#lastName = this.#inputLastName.val();
      this.#userName = this.#inputUserName.val();
      this.#email = this.#inputEmail.val();
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

$(document).ready(function () {
  // ? ---------------------------------- Change Password ---------------------------//

  const modalFormPassword = $("#changePasswordModal"),
    btnShowFormPassword = $("#showFormPassword"),
    btnHideFormPassword = $("#hideFormPassword"),
    btnSavePassword = $("#savePassword"),
    inputConfirmPass = $("#confirmPassword"),
    inputCurrentPass = $("#currentPassword"),
    validacionPass = new ValidacionPass();

  // funcion para mostrar el modal de 'change password'
  btnShowFormPassword.on("click", function () {
    modalFormPassword.removeClass("hidden");
    modalFormPassword.addClass("active");
  });

  // funcion para ocultar el modal de 'change password'
  btnHideFormPassword.on("click", function () {
    modalFormPassword.removeClass("active");
    modalFormPassword.addClass("hide");
    setTimeout(function () {
      modalFormPassword.addClass("hidden");
      modalFormPassword.removeClass("hide");
    }, 500);
  });

  btnSavePassword.on("click", function () {
    event.preventDefault(); // Cancela el evento del formulario
    if (validacionPass.validarCampos()) {
      const formData = new FormData();
      formData.append("nPass", inputConfirmPass.val());
      formData.append("cPass", inputCurrentPass.val());

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
            btnHideFormPassword.click();
            validacionPass.limpiarCampos();
            if (
              !messageAlert("Your password has been successfully updated", 0)
            ) {
              setTimeout(() => {
                messageAlert("Your password has been successfully updated", 0);
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
    }
  });

  // funcion para mostrar o ocultar las contraseñas
  $('button[data-togglePass="true"]').click(function () {
    var input = $(this).prev();
    if (input.attr("type") === "password") {
      input.attr("type", "text");
      $(this).html(
        '<i class="ri-lock-unlock-line text-red-500 text-lg transition duration-300 mr-2"></i>'
      );
    } else {
      input.attr("type", "password");
      $(this).html(
        '<i class="ri-lock-password-line text-green-500 text-lg transition duration-300 mr-2"></i>'
      );
    }
  });

  // ? ------------------------------- User Info ---------------------------//

  const name = $("#name"),
    lastName = $("#lastName"),
    userName = $("#userName"),
    email = $("#email"),
    validacion = new Validacion();

  const btnSubmit = $("#submit");

  btnSubmit.on("click", function () {
    if (
      validacion.validarCambios(
        name.val(),
        lastName.val(),
        userName.val(),
        email.val()
      )
    ) {
      const formData = new FormData();

      formData.append("myName", name.val());
      formData.append("myLastName", lastName.val());
      formData.append("myUserName", userName.val());
      formData.append("myEmail", email.val());

      $.ajax({
        url: "../db/peticiones/manage.php",
        type: "POST",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (response) {
          if (response.code == 0) {
            validacion.changeClassValues(name, lastName, userName, email);
            $("aside .pro-sidebar-logo h5").html(userName.val());
            $("aside .pro-sidebar-logo div").html(userName.val()[0]);
            // Mostrar el mensaje de éxito
            if (!messageAlert("changes were saved correctly", 0)) {
              setTimeout(() => {
                messageAlert("changes were saved correctly", 0);
              }, 3500);
            }
          } else {
            // Mostrar el mensaje de éxito
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
    } else {
      messageAlert("you need to make changes before saving", 1);
    }
  });
});
