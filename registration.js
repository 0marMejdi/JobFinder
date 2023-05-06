// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()


function validateForm() {
    var emailInput = document.getElementById('email');
    var passwordInput = document.getElementById('password');
    var confirmPasswordInput = document.getElementById('password-confirm');
    var fileInput = document.getElementById('myFile');
    var submitButton = document.getElementById('submit');

    var validEmail = emailInput.value.length >= 5 && emailInput.value.length <= 30;
    var validPassword = passwordInput.value.length > 8;
    var passwordMatch = passwordInput.value === confirmPasswordInput.value;
    var validFile = !fileInput.value || fileInput.files[0].type.startsWith('image/');

    if (!validEmail) {
        emailInput.classList.add('is-invalid');
    } else {
        emailInput.classList.remove('is-invalid');
    }

    if (!validPassword) {
        passwordInput.classList.add('is-invalid');
    } else {
        passwordInput.classList.remove('is-invalid');
    }

    if (!passwordMatch) {
        confirmPasswordInput.classList.add('is-invalid');
    } else {
        confirmPasswordInput.classList.remove('is-invalid');
    }

    if (!validFile) {
        fileInput.classList.add('is-invalid');
    } else {
        fileInput.classList.remove('is-invalid');
    }

    submitButton.disabled = !(validEmail && validPassword && passwordMatch && validFile);
}