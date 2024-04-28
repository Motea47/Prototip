const loginValidation = new JustValidate("#loginForm");

loginValidation
    .addField("#email", [
        {
            rule: "required",
            errorMessage: "Email is required"
        },
        {
            rule: "email",
            errorMessage: "Please enter a valid email"
        }
    ])
    .addField("#password", [
        {
            rule: "required",
            errorMessage: "Password is required"
        }
    ])
    .onSuccess((event) => {
        event.target.submit(); 
    })
    .onFail((fields) => {
        fields.forEach((field) => {
            const fieldContainer = document.querySelector(field.selector).parentNode;
            fieldContainer.classList.add('invalid');
            const errorMessage = fieldContainer.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.textContent = field.errorMessage;
            }
        });
    });
