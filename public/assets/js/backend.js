/* 
 * Js for backend operations
 * 
 */

$(document).ready(function () {

    /* Length */

    var code_length = 4;

    /* Messages */

    var email_not_avail = "Email Not available";
    var email_invalid_format = "Invalid Email";
    var code_invalid = "Invalid Code";

    $('#send_mail_otp').on('click', function () {

        var fname = $("input[name='fname']").val();
        var lname = $("input[name='lname']").val();
        var email = $("input[name='email']").val();
        var location = $("select[name='location']").val();
        var birth_date = $("input[name='birth_date']").val();

        console.log("First name: "+fname);

        $.ajax({
            type: 'post',
            url: '/whisttler/api/postsignup',
            dataType: 'json',
            data: {'fname': fname, 'lname': lname, 'email': email, 'location': location, 'birth_date': birth_date},

        }).done(function (response) {

            if (response == 1) {

                $('#enter_email').removeAttr('disabled');
                $('#email_message').html('');
            }


        });


    })
    
    $('#set_primary_category').on('click', function () {

        var category = $("input[name='category']").val();

        $.ajax({
            type: 'post',
            url: '/api/setcategory',
            dataType: 'json',
            data: {'category': category},

        }).done(function (response) {

            if (response == 1) {

                $('#enter_email').removeAttr('disabled');
                $('#email_message').html('');
            }


        });


    })

    /* Email availablity */

    $('#signup_email_address').on('keyup', function () {

        var email = $(this).val();
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        $('#enter_email').attr('disabled', true);

        if (reg.test(email) == true)
        {
            $.ajax({
                type: 'post',
                url: '/api/checkemail',
                dataType: 'json',
                data: {email: email},
            }).done(function (response) {

                if (response == 1) {

                    $('#enter_email').removeAttr('disabled');
                    $('#email_message').html('');
                } else {

                    $('#email_message').empty();
                    $('#email_message').html(email_not_avail);
                }

            });
        } else {

            $('#email_message').empty();
            $('#email_message').html(email_invalid_format);

        }


    })


    $('#enter_email').on('click', function () {

        var email_address = $('#signup_email_address').val();

        $.ajax({
            type: 'post',
            url: '/api/postsignup',
            dataType: 'json',
            data: {email: email_address},
        }).done(function (response) {


            window.location.href = response.url;


        });

    });


    $('#verify_code').on('keyup', function () {

        $('#code_confirm').attr('disabled', true);
        var code = $(this).val();

        if (code.length == code_length) {

            $('#code_confirm').removeAttr('disabled');

        }

        $('#code_message').html('');
        $('#code_message').html(code_invalid);

    });


    $('#code_confirm').on('click', function () {

        var code = $('#verify_code').val();
        var email = $("input[name='email']").val();
        $.ajax({
            type: 'post',
            url: '/api/checkcode',
            dataType: 'json',
            data: {email: email, code: code},
        }).done(function (response) {


        });



    });

    $('#phone_code_send').on('click', function () {

        var phone = $("input[name='phone']").val();
        $.ajax({
            type: 'post',
            url: '/api/sendphonecode',
            dataType: 'json',
            data: {phone: phone},
        }).done(function (response) {

        });



    });

    $('#phone_code_confirm').on('click', function () {

        var code = $('#phone_verify_code').val();

        var phone = $("input[name='phone']").val();
        $.ajax({
            type: 'post',
            url: '/api/checkphonecode',
            dataType: 'json',
            data: {code: code, phone: phone},
        }).done(function (response) {



        });



    });

    $('#save_password').on('click', function () {


        var user_id = $('#hidden_id').val();
        var password = $('#signup_password').val();

        $.ajax({
            type: 'post',
            url: '/api/enterpassword',
            dataType: 'json',
            data: {user_id: user_id, password: password},
        }).done(function (response) {


            window.location.href = response.url;



        });


    });

    $('#save_details').on('click', function () {

        var user_id = $('#hidden_id').val();
        var user_name = $('#user_name').val();
        var brand_name = $('#brand_name').val();
        var industry_type = $('#industry_type').val();

        $.ajax({
            type: 'post',
            url: '/api/enterdetails',
            dataType: 'json',
            data: {industry_type: industry_type, brand_name: brand_name, user_name: user_name, user_id: user_id},

        }).done(function (response) {


            window.location.href = response.url;



        });



    });
});
/* End of document ready */
