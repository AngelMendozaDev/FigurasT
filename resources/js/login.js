function checkInfo() {
  flag = true;
  if ($("#mail").val() != $("#mail2").val()) {
    $("#mail").addClass("error");
    $("#mail2").addClass("error");
    flag = false;
  }

  if ($("#pass1").val() != $("#pass2").val()) {
    $("#pass1").addClass("error");
    $("#pass2").addClass("error");
    flag = false;
  }

  if (flag == true) {
    $("#mail").removeClass("error");
    $("#mail2").removeClass("error");
    $("#pass1").removeClass("error");
    $("#pass2").removeClass("error");
  }
  return flag;
}

function setLogin() {
  $.ajax({
    url: "controllers/login.php",
    type: "POST",
    data: $("#form-log").serialize(),
    success: function (response) {
      if (response.trim() == 1) {
        window.location.href = "templates/user/inicio.php";
      } else {
        swal("Opps!", "Usuario/contraseña Erroneos", "info").then((value) => {
          $("#form-log")[0].reset();
        });
      }
    }
  });
  return false;
}

function setInfo() {
  flag = checkInfo();
  if (flag == true) {
    $.ajax({
      url: "controllers/login.php",
      type: "POST",
      data: $("#form-reg").serialize(),
      success: function (response) {
        if (response.trim() == 1) {
          swal("Registro exitoso!", "Inicia sesión", "success").then(
            (value) => {
              $("#form-reg")[0].reset();
              $(".register").hide();
              $(".login").show("slow");
            }
          );
        } else if (response.trim() == -1) {
          swal(
            "Opps!",
            "Esta dirección de correo ya ha sido registrada!",
            "info"
          ).then((value) => {
            $("#form-reg")[0].reset();
            $(".register").hide();
            $(".login").show("slow");
          });
        } else {
          swal("Lo sentimos, ocurrio un error", "intentalo mas tarde", "error");
        }
      },
    });
  }
  return false;
}

$(function () {
  $(".register").hide();
  $(".login").show("slow");

  $("#mail2").keyup(function () {
    checkInfo();
  });

  $("#pass2").keyup(function () {
    checkInfo();
  });

  $("#regis").click(function () {
    $(".register").show("slow");
    $(".login").hide();
  });

  $("#logi").click(function () {
    $(".register").hide();
    $(".login").show("slow");
  });
});
