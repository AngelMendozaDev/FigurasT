var file;
var urlFile;
var fondo = "0";
var principal;

dragArea = document.querySelector("#drag-area");
contD = document.querySelector(".cont-drag");
button = document.querySelector('.button')
input = document.querySelector('#inp');
img = document.querySelector(".imgs");
img.style.display = "none";

var colorThief = new ColorThief();

button.onclick = () => {
  input.click();
}

input.addEventListener('change', function () {
  file = this.files[0];
  displayFile()
});

function displayFile() {
  let fileType;
  let validateExtensions = ["image/jpeg", "image/jpg", "image/png"];
  fileType = file.type;

  if (validateExtensions.includes(fileType)) {
    let fileReader = new FileReader();

    fileReader.onload = () => {
      urlFile = fileReader.result;
      //console.log(urlFile);
      $(".imgs").attr("src", urlFile);
      contD.style.display = "none";
      img.style.display = "block";
    };

    fileReader.readAsDataURL(file);
  }
}

const rgbToHex = (r, g, b) =>
  "#" +
  [r, g, b]
    .map((x) => {
      const hex = x.toString(16);
      return hex.length === 1 ? "0" + hex : hex;
    })
    .join("");


$(function () {
  $(".campo").prop("disabled", true);
  $("#zone-cot").hide(100);

  $('#btn-newC').click(function () {
    $("#zone-cot").show("slow");
  })

  $('#btn-closeC').click(function () {
    $("#zone-cot").hide(100);
  })

  $('#uso').change(function () {
    $('#lienzo').empty();
    if ($('#uso').val() == 'otro') {
      $('#lienzo').append('<div class="input-group mb-3">' +
        '<label class="input-group-text">' +
        'Describe el uso:' +
        '</label>' +
        '<input type="text" class="form-control campo" style="border: solid 1px rgba(0,0,0,0.3);" name="otro" required>' +
        '</div>');
    }
  });

  img.addEventListener("load", function () {
    principal = colorThief.getColor(img);
    paleta = colorThief.getPalette(img, 8);
    $(".color-lienzo-p").empty();

    count = 0;
    $.each(paleta, function (key, item) {
      color = rgbToHex(item[0], item[1], item[2]);
      count++;
      $(".color-lienzo-p").append(
        "<div class='groupC'>" +
        "<label for='col-" + count + "' class='circle' style='background-color: " +
        color +
        ";'>" +
        "<span>" +
        color +
        "</span>" +
        "</label>" +
        "<input type='checkbox'  name='color[]' value=" +
        color +
        " id='col-" + count + "'>" +
        "</div>"
      );
    });

    $(".campo").prop("disabled", false);
  });

  /*$("#drag-area").bind("dragover", function (event) {
    event.preventDefault();
    console.log("Ahi vamos we");
    $("#drag-area").addClass("active");
  });

  $("#drag-area").bind("dragleave", function () {
    console.log("Estas afuera mamon");
    $("#drag-area").removeClass("active");
  });

  dragArea.addEventListener("drop", (event) => {

    event.preventDefault();
    file = event.dataTransfer.files[0];
    
    //console.log(file)

    displayFile()
  });*/
});
