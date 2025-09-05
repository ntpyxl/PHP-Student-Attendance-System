function showManageCoursesTab() {
    $('#attendanceHistoryTab').addClass("hidden").removeClass("block");
    $('#manageCoursesTab').addClass("block").removeClass("hidden");

    $('#manageCoursesButton').addClass("hidden").removeClass("inline-block");
    $('#viewAttendancesButton').addClass("inline-block").removeClass("hidden");
}

function showAttendanceHistoryTab() {
    $('#manageCoursesTab').addClass("hidden").removeClass("block");
    $('#attendanceHistoryTab').addClass("block").removeClass("hidden");

    $('#viewAttendancesButton').addClass("hidden").removeClass("inline-block");
    $('#manageCoursesButton').addClass("inline-block").removeClass("hidden");
}

$('#manageCoursesButton').on('click', function() {
    showManageCoursesTab()
});

$('#viewAttendancesButton').on('click', function() {
    showAttendanceHistoryTab()
});

$('#addCourseButton').on('click', function(event) {
    event.preventDefault();

    const formData = {
        courseName: $('#courseNameField').val(),
        courseCode: $('#courseCodeField').val().toUpperCase(),
        courseTimeIn: $('#courseTimeInField').val(),
        addCourseRequest: 1
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

                window.location.href = "index.php";
            }
        }
    })
});

$('#clearFieldsButton').on('click', function() {
    $('#courseNameField').val('');
    $('#courseCodeField').val('');
});



$('.editCourseButton').on('click', function() {
    $('#editCourseModal').removeClass("hidden");
    $('#editCourseModal').addClass("flex");

    $('#confirmEditCourseButton').data('course-id', $(this).data('course-id'))
    $('#editCourseNameField').val($(this).data('course-name'));
    $('#editCourseCodeField').val($(this).data('course-code'));
    $('#editCourseTimeInField').val($(this).data('course-time-in'));
})

$('#confirmEditCourseButton').on('click', function(event) {
    event.preventDefault();

    const formData = {
        courseId: $(this).data('course-id'),
        courseName: $('#editCourseNameField').val(),
        courseCode: $('#editCourseCodeField').val().toUpperCase(),
        courseTimeIn: $('#editCourseTimeInField').val(),
        editCourseRequest: 1
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

                window.location.href = "index.php";
            }
        }
    })
})

$('#cancelEditCourseButton').on('click', function() {
    $('#editCourseModal').removeClass("flex");
    $('#editCourseModal').addClass("hidden");
})



$('#studentYearLevelField, #studentCourseField').on('change', function() {
    refreshAttendanceAdminList()
})

function refreshAttendanceAdminList() {
    const formData = {
        yearLevel: $('#studentYearLevelField').val(),
        courseCode: $('#studentCourseField').val(),
        refreshAttendanceAdminListRequest: 1
    };

    $.ajax({
        type: "POST",
        url: dynamicContentHandlerDirectory,
        data: formData,
        success: function(data) {
            $('#allStudentAttendanceRows').html(data);
        }
    })
}
