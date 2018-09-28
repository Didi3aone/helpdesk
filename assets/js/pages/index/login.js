$(document).ready(function(){
    // Validation
    $("#login-form").validate({
        // Rules for form validation
        rules: {
            username: {
                required: true,
                minlength: 3,
                maxlength: 100,
            },
            password: {
                required: true,
                minlength: 4,
                maxlength: 20,
            },
        },
        // Messages for form validation
        messages: { },
        // Do not change code below
        errorPlacement: function(error, element)
        {
            error.insertAfter(element.parent());
        }
    });
    
    $("#forgotpass-form").validate({
        // Rules for form validation
        rules: {
            email: {
                required: true,
                email: true,
            },
        },
        // Messages for form validation
        messages: { },
        // Do not change code below
        errorPlacement: function(error, element)
        {
            error.insertAfter(element.parent());
        }
    });
});
