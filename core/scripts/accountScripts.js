$('#userRoleField').on('change', function() {
    if($(this).val() === "student") {
        $('#additionalStudentFields').addClass("block").removeClass("hidden").find('input, select').attr('required', true);
    } else if ($(this).val() === "admin") {
        $('#additionalStudentFields').addClass("hidden").removeClass("block").find('input, select').removeAttr('required');
    }
})

$('#registerUserForm').on('submit', function(event) {
    event.preventDefault();

    const formData = {
        username: $('#usernameField').val(),
        password: $('#passwordField').val(),
        first_name: $('#firstnameField').val(),
        last_name: $('#lastnameField').val(),
        user_role: $('#userRoleField').val(),
        year_level: $('#studentYearLevelField').val(),
        course_code: $('#studentCourseField').val(),
        registerUserRequest: 1
    };

    $.ajax({
        type: "POST",
        url: handlerDirectory,
        data: formData,
        dataType: 'json',
        statusCode: {
            200: function(data) {
                console.log('Success:', data.message);
                
                window.location.href = "index.php";
            },
            400: function(xhr) {
                const response = JSON.parse(xhr.responseText);

                console.log('Failed:', response.message);
                alert(response.message);

                window.location.href = "register.php";
            }
        }
    })
})

$('#loginUserForm').on('submit', function(event) {
    event.preventDefault();

    const formData = {
        username: $('#usernameField').val(),
        password: $('#passwordField').val(),
        loginUserRequest: 1
    };

    $.ajax({
        type: "POST",
        url: handlerDirectory,
        data: formData,
        dataType: 'json',
        statusCode: {
            200: function(data) {
                console.log('Success:', data.message);
                
                window.location.href = "index.php";
            },
            400: function(xhr) {
                const response = JSON.parse(xhr.responseText);

                console.log('Failed:', response.message);
                alert(response.message);

                window.location.href = "login.php";
            }
        }
    })
})

$('#logoutButton').on('click', function(event) {
    event.preventDefault();

    const formData = {
        logoutUserRequest: 1
    };

    $.ajax({
        type: 'POST',
        url: logoutDirectory,
        data: formData,
        dataType: 'json',
        statusCode: {
            200: function(data) {
                console.log('Success: Logout success.');
                
                window.location.href = "login.php";
            }
        }
    });
})