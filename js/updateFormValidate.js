$("#updateForm").validate({
    rules: {
        u_username:{
            required: true,
            minlength: 5,
            maxlength: 16
        },
        u_password: {
            required: true,
            minlength: 5,
            maxlength: 16
        },
        u_confirmPassword: {
            required: true,
            equalTo: "#u_password"
        },
        u_email: {
            required: true,
            email: true
        }
    },
    messages: {
        u_username:{
            required: "Username is required",
            minlength: "Username must be at least 5 characters",
            maxlength: "Username can not be more than 16 characters"
        },
        u_password: {
            required: "Password is required",
            minlength: "Password must be at least 5 characters",
            maxlength: "Password can not be more than 16 characters"
        },
        u_confirmPassword: {
            required: "Confirm password is required",
            required: "You must type a confirm password that matches the password field",
            equalTo: "Passwords must match"
        },
        u_email: {
            required: "You must enter an email address",
            email: "You must enter a valid email address"
        }
    },
    submitHandler: function(form){
        $.ajax({
            url: 'includes/update.php',
            type: 'post',
            data: $('#updateForm').serialize(),
            success: function(response){
                if(response=="ok"){
                    $("#u_submit").html('<img src="images/ajax-loader.gif" />   Updating ...');
                    setTimeout('window.location.href = "index.php"; ',4000);
                    } else {
                    $("#updateError").fadeIn(1000, function(){
                        $("#updateError").html('<div class="alert alert-danger"><i class="fas fa-info-circle"></i>   '+response+' !</div>');
                        $("#u_submit").html('<i class="fas fa-sign-in-alt"></i>   Update');
                    });
                }
            }
        });
        return false;
    }

}); //end validate function