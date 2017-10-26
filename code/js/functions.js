function validateLogin() {
  var usernameInput = document.getElementById('usernameInput').value;
  var passwordInput = document.getElementById('passwordInput').value;

  if(usernameInput == "" || passwordInput == "") {
    alert("The fields are blank. Also, make them turn red.");
    return false;
  }
}
