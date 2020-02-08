$("#loginForm").validate({
        rules: {
            l_username:{
                required: true,
                minlength: 10,
                maxlength: 16
            },
            l_password: {
                required: true,
                minlength: 10,
                maxlength: 16
            }

        },
        messages: {
            l_username:{
                required: "Username is required",
                minlength: "Username must be at least 10 characters",
                maxlength: "Username can not be more than 16 characters"
            },
            l_password: {
                required: "Password is required",
                minlength: "Password must be at least 10 characters",
                maxlength: "Password can not be more than 16 characters"
            }
        },
        submitHandler: function(form){
            $.ajax({
                url: 'includes/login.php',
                type: 'post',
                data: $('#loginForm'.serialize()),
                success: function(response){
                    alert("sending data");
                },
                error: function(response){
                    alert("error");
                }
            });
        }
}); //end validate function