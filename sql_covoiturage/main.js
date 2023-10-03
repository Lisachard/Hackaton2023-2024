let docTitle = document.title;
window.addEventListener("blur", () => {
  document.title = "Revient !";
});
window.addEventListener("focus", () => {
  document.title = docTitle;
});

function checkForm() {
  var elements = document.forms[0].elements;
  var cansubmit = true;
  for (var i = 0; i < elements.length; i++) {
    if (elements[i].value.length == 0 && elements[i].type != "button") {
      cansubmit = false;
    }
  }
  document.getElementById("submit").disabled = !cansubmit;
}

function changeNameCV() {
  let input = document.getElementById("first_name").value;
  document.getElementById("first_name_text").innerHTML = input;
}
function changeLastNameCV() {
  let input = document.getElementById("last_name").value;
  document.getElementById("last_name_text").innerHTML = input;
}
function changeGenderCV() {
  let input = document.getElementById("gender").value;
  document.getElementById("gender_text").innerHTML = input;
}
function changeEmailCV() {
  let input = document.getElementById("email").value;
  document.getElementById("email_text").innerHTML = input;
}
function changePhoneNumberCV() {
  let input = document.getElementById("phone_number").value;
  document.getElementById("phone_number_text").innerHTML = input;
}
function changeAddressCV() {
  let input = document.getElementById("address").value;
  document.getElementById("address_text").innerHTML = input;
}
function changeImageCV() {
  let input = document.getElementById("profile_pic").value;
  console.log(document.getElementById("image_cv").src);
  if (
    document.getElementById("image_cv").src == "http://localhost/formulaire.php"
  ) {
    document.getElementById("image_cv").src =
      "https://upload.wikimedia.org/wikipedia/commons/2/2c/Default_pfp.svg";
  } else {
    document.getElementById("image_cv").src = input;
  }
}