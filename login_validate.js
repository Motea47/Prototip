const loginValidation = new JustValidate("#loginForm", {
    rules: {
        username_or_email: {
            required: true,
        },
        password: {
            required: true,
        },
    },
    messages: {
        username_or_email: {
            required: "Email or username is required",
        },
        password: {
            required: "Password is required",
        },
    },
    submitHandler: function (form) {
        form.submit();
    },
    invalidFormCallback: function (errors) {
        errors.forEach((field) => {
            const fieldContainer = document.querySelector(field.selector).parentNode;
            fieldContainer.classList.add('invalid');
            const errorMessage = fieldContainer.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.textContent = field.errorMessage;
            }
        });
    }
});
