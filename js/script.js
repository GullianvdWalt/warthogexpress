// Form Validation
function validateEmail() {
    var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var emailInput = document.getElementById("email");
    if (emailInput === emailFormat) {
        document.registrationform.email.focus();
        return (true)
    } else {
        alert("You have entered an invalid email address!")
        document.registrationform.email.focus()
        return (false)
    }


}