function toggleCheckboxStyle(checkbox) {
  if (checkbox.checked) {
    checkbox.classList.add("bg-[#03e9f4]");
  } else {
    checkbox.classList.remove("bg-[#03e9f4]");
  }
}

$(document).ready(function () {
  const checkbox = $('input[name="accept_terms"]'),
    btnSumit = $(".log"),
    user = $(".user"),
    pass = $(".pass");

  btnSumit.click(function (event) {
    event.preventDefault(); // Cancels the form submission event

    if (user.val() != "" && pass.val() != "" && checkbox.is(":checked")) {
      const formData = new FormData();
      formData.append("user", user.val());
      formData.append("pass", pass.val());
      $.ajax({
        url: "./db/peticiones/login.php",
        type: "POST",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (response) {
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
              window.location.href = "./";
            }, 3250);
          } else {
            $(".error-box").removeClass("display-none");
            $(".error-box").addClass("active");

            $("body").addClass("error");
            $(".error-box").addClass("display-block active");

            $(".log").addClass("display-none");
            $(".container-button").addClass("height-108");

            setTimeout(function () {
              $(".error-box").removeClass("active");
              $(".error-box").addClass("display-none");
              $("body").removeClass("error");
              $(".container-button").removeClass("display-none");
              $(".log").removeClass("display-none");
              $(".container-button").removeClass("height-108");
            }, 3500);
          }
        },
        error: function (error) {
          console.error(error);
        },
      });
    }
  });

  if (window.matchMedia("(max-width: 768px)").matches)
    $("body").addClass("responsive");

  checkbox.click(function () {
    toggleCheckboxStyle(this);
  });
});
