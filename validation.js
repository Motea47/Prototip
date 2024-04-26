const validation = new JustValidate("#signup");

validation
    .addField("#lname", [
        {
            rule: "required"
        }
    ])
	
	 .addField("#fname", [
	 
        {
            rule: "required"
        }
    ])
	
	.addField("#mname", [
        {
            rule: "required"
        }
    ])
	
	.addField("#num", [
        {
            rule: "required"
        }
    ])
	
	.addRequiredGroup('#gender_radio_group')
	

    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        },
    ])
    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password"
        }
    ])
    .addField("#password_confirmation", [
        {
            validator: (value, fields) => {
                return value === fields["#password"].elem.value;
            },
            errorMessage: "Passwords should match"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });
    
    
    
    
    
    
    
    
    
    
    
    
    