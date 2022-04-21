//Global variables used to determine if the details entered by the user meet all of the requirements
//If all are true, submit button is unlocked to complete registration
var userConfirm = false;
var pwConfirm = false;
var emailConfirm = false;

/* *** Username functions *** */

//Checks the username length
function usernameLength(username) {
    if (username.length < 8) {
        return false;
    } else {
        return true;
    }
}

//Checks to make sure username does not contain a character that is not a letter or a number
function checkUsernameCharacters(username) {
    let illegalChars = /[`!@#$%^&*\-_=+'\/.,\s()\[\]\\|;':"\{\}<>?]{1}/;
    if (username.match(illegalChars)){
        return false;
    } else {
        return true;
    }
}

/* *** Password functions *** */

//Checks the password length
function passwordLength(password) {
    if (password.length < 12) {
        return false;
    } else {
        return true;
    }
}

//Checks to make sure the password contains 2 Digits and 2 Special Characters
function checkPasswordCharacters(password) {
    let pwDigits = /[0-9]{2}/;
    let pwSpecialChars = /[`!@#$%^&*\-_=+'\/.,\s]{2}/;
    if(password.match(pwDigits) && password.match(pwSpecialChars)){
        return true;
    } else {
        return false;
    }
}

//Checks to make sure Password and Confirm Password fields are the same
function passwordMatch(password,confirmPassword) {
    if (password === confirmPassword && !(password === "")) {
        return true;
    } else {
        return false;
    }
}

/* *** Email functions *** */

//Checks to make sure Email and Confirm Email fields match
function emailMatch(email,confirmEmail) {
    if (email === confirmEmail && !(email === "")) {
        return true;
    } else {
        return false;
    }
}

/* *** Toggle submit button function *** */

//If all of the conditions are met, the submit button is enabled
function toggleSubmitButton() {
    if(userConfirm == true && pwConfirm == true && emailConfirm == true){
        $("#submit").prop("disabled", false);
    } else {
        $("#submit").prop("disabled", true);
    }
}

/* *** Confirm User Details functions *** */

//Runs all of the Username functions to determine if conditions are met
//A message is displayed to let the user know if the Username field meets the requirements
//If they are, userConfirm is set to true and toggleSubmitButton is ran to test if submit button can be enabled
function confirmUserDetails() {
    let username = document.getElementById("username").value;
    let usernameMessage = document.getElementById("usernameMessage");
    let length = usernameLength(username);
    let specialChars = checkUsernameCharacters(username);
    if(length == true && specialChars == true) {
        $('#usernameMessage').removeClass().addClass('correct');
        usernameMessage.innerHTML = "<span>&#10003;</span> Username is okay."
        userConfirm = true;
    } else {
        $('#usernameMessage').removeClass().addClass('incorrect');
        usernameMessage.innerHTML = "<span>&#10005;</span> <b>Username must be 8 characters long, with only letters and numbers.</b>"
        userConfirm = false;
    }
    toggleSubmitButton();
}

//Runs all of the Password functions to determine if conditions are met
//A message is displayed to let the user know if the Password/Confirm Password fields meet the requirements
//If they are, userConfirm is set to true and toggleSubmitButton is ran to test if submit button can be enabled
function confirmPasswordDetails() {
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;
    let passwordMessage = document.getElementById("passwordMessage");
    let length = passwordLength(password);
    let match = passwordMatch(password,confirmPassword);
    let specialChars = checkPasswordCharacters(password);
    if(length == true && match == true && specialChars == true){
        $('#passwordMessage').removeClass().addClass('correct');
        passwordMessage.innerHTML = "<span>&#10003;</span> Password is okay."
        pwConfirm = true;
    } else {
        $('#passwordMessage').removeClass().addClass('incorrect');
        passwordMessage.innerHTML = "<span>&#10005;</span> <b>Password MUST be 12 characters long, with 2 digits and 2 special characters, and match.</b>"
        pwConfirm = false;
    }
    toggleSubmitButton();
}

//Runs all of the Email functions to determine if conditions are met
//A message is displayed to let the user know if the Email/Confirm Email fields meets the requirements
//If they are, userConfirm is set to true and toggleSubmitButton is ran to test if submit button can be enabled
function confirmEmailDetails() {
    let email = document.getElementById("email").value;
    let confirmEmail = document.getElementById("confirmEmail").value;
    let emailMessage = document.getElementById("emailMessage");
    let match = emailMatch(email,confirmEmail);
    if(match == true) {
        $('#emailMessage').removeClass().addClass('correct');
        emailMessage.innerHTML = "<span>&#10003;</span> Emails match."
        emailConfirm = true;
    } else {
        $('#emailMessage').removeClass().addClass('incorrect');
        emailMessage.innerHTML = "<span>&#10005;</span> <b>Emails must match.</b>"
        emailConfirm = false;
    }
    toggleSubmitButton();
}