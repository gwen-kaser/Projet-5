class ValidationForm {
    constructor() {
        let formValid = document.getElementById("button_confirm");
        formValid.addEventListener("click", (event) => {
            event.preventDefault();
            let emailValid = this.validationEmail();
            let passValid = this.validationPass2();
            if (emailValid && passValid) {
                document.getElementById("form").submit();
            }
        });
    }

    validationEmail() {
    let email = document.getElementById("email");
    let missingEmail = document.getElementById("missing_email");
    let emailValid = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        // Si le champ est vide
        if (email.validity.valueMissing) {
            missingEmail.textContent = "Entrez votre adresse email";
            missingEmail.style.color = "red";
            return false;
        // Si le format de données est incorrect
        } else if (emailValid.test(email.value) == false) {
            missingEmail.textContent = "Format incorrect";
            missingEmail.style.color = "red";
            return false;
        }
        return true;
    }

    validationPass2() {
    let pass2 = document.getElementById("pass2");
    let missingPass2 = document.getElementById("missing_pass2");
        // Si le champs est vide
        if (pass2.validity.valueMissing) {
            missingPass2.textContent = "Confirmez votre mot de passe";
            missingPass2.style.color = "red"; 
            return false;
        }
        return true;
    }
}

