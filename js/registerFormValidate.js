$("#registerForm").validate({
        rules: {
            r_username:{
                required: true,
                minlength: 10,
                maxlength: 16
            },
            r_password: {
                required: true,
                minlength: 10,
                maxlength: 16
            },
            r_confirmPassword: {
                required: true,
                equalTo: "#r_password"
            }

        },
        messages: {
            r_password: {
                minlength: "Password must be at least 10 characters",
                maxlength: "Password can not be more than 16 characters"
            },
            r_confirmPassword: {
                required: "You must type a confirm password that matches the password field",
                equalTo: "Passwords must match"
            }
        }
}); //end validate function


$("#slideToggle").click(function(){
    //$("#slidePara").slideToggle("fast");

    $("p").slideToggle("fast");
}); //end slideToggle function

