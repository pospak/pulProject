// Get the form and submit button elements
const form = document.querySelector('form');
const submitButton = document.querySelector('input[type="submit"]');
const passwordInput = document.querySelector('input[name="password"]');
const passVerifyInput = document.querySelector('input[name="passVerify"]');
// Add an event listener to the form's input elements
form.addEventListener('input', () => {
    function checkPasswordMatch() {
        if (passwordInput.value !== passVerifyInput.value) {
            submitButton.disabled = true;
        } else {
            submitButton.disabled = false;
        }
    }
    // Check if any required input is empty
    const inputs = Array.from(form.querySelectorAll('input[required]'));
    passwordInput.addEventListener('input', checkPasswordMatch);
    passVerifyInput.addEventListener('input', checkPasswordMatch);
    const isAnyInputEmpty = inputs.some(input => input.value.trim() === '');

    // Disable or enable the submit button based on the input status
    submitButton.disabled = isAnyInputEmpty;

    // Apply different styles to the submit button based on its disabled status
    if (submitButton.disabled) {
        submitButton.style.textDecoration="none";
        submitButton.style.color = "white";
        submitButton.style.background = "transparent";
        submitButton.style.border = "none";
    } else {
    submitButton.style.width= "100%";
    submitButton.style.padding= "10px";
    submitButton.style.margin = "10px 0";
    submitButton.style.borderRadius=  "5px";
    submitButton.style.border = "1px solid #02f869";
    submitButton.style.backgroundColor = "#02f869";
    submitButton.style.color = "white";
    submitButton.style.cursor = "pointer";
    
    }
});
