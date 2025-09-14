function showTab(tabId, buttonId) {
    const tabs = ['#attendanceHistoryTab', '#manageCoursesTab', '#manageExcusesTab'];
    tabs.forEach(id => {
        if (id === tabId) {
            $(id).addClass("block").removeClass("hidden");
        } else {
            $(id).addClass("hidden").removeClass("block");
        }
    });

    const buttons = ['#viewAttendancesButton', '#manageCoursesButton', '#manageExcusesButton'];
    buttons.forEach(id => {
        if (id != buttonId) {
            $(id).addClass("inline-block").removeClass("hidden");
        } else {
            $(id).addClass("hidden").removeClass("inline-block");
        }
    });
}

function showAttendanceHistoryTab() {
    showTab('#attendanceHistoryTab', '#viewAttendancesButton');
}

function showManageCoursesTab() {
    showTab('#manageCoursesTab', '#manageCoursesButton');
}

function showManageExcusesTab() {
    showTab('#manageExcusesTab', '#manageExcusesButton');
}


$('#viewAttendancesButton').on('click', function() {
    showAttendanceHistoryTab()
});

$('#manageCoursesButton').on('click', function() {
    showManageCoursesTab()
});

$('#manageExcusesButton').on('click', function() {
    showManageExcusesTab()
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



$('#attendance_studentYearLevelField, #attendance_studentCourseField').on('change', function() {
    refreshAttendanceAdminList()
})

$('#excuse_studentYearLevelField, #excuse_studentCourseField').on('change', function() {
    refreshExcuseLettersAdminList()
})

function refreshAttendanceAdminList() {
    const formData = {
        yearLevel: $('#attendance_studentYearLevelField').val(),
        courseCode: $('#attendance_studentCourseField').val(),
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

function refreshExcuseLettersAdminList() {
    const formData = {
        yearLevel: $('#excuse_studentYearLevelField').val(),
        courseCode: $('#excuse_studentCourseField').val(),
        refreshExcuseLettersAdminListRequest: 1
    };

    $.ajax({
        type: "POST",
        url: dynamicContentHandlerDirectory,
        data: formData,
        success: function(data) {
            $('#allStudentExcuseLetterRows').html(data);
        }
    })
}



$(document).on('click', '.viewExcuseLetterButton', function(event) {
    event.preventDefault();

    let status = "pending";
    //$('#selectExcuseStatus').prop('disabled', false);

    if($(this).data('excuse-status') == "APPROVED") {
        status = "approved";
        //$('#selectExcuseStatus').prop('disabled', true);
    } else if($(this).data('excuse-status') == "REJECTED") {
        status = "rejected";
        //$('#selectExcuseStatus').prop('disabled', true);
    }

    $('#studentName').text($(this).data('student-fullname'));
    $('#studentYear').text($(this).data('student-yearlevel'));
    $('#studentCourse').text($(this).data('student-coursename'));
    $('#excuseDate').text($(this).data('excuse-date'));
    $('#excuseContent').text($(this).data('excuse-content'));
    $('#selectExcuseStatus').val(status);
    $('#selectExcuseStatus').data('excuse-id', $(this).data('excuse-id'))
    $('#selectExcuseStatus').data('student-id', $(this).data('student-id'))

    $('#viewExcuseModal').addClass("flex");
    $('#viewExcuseModal').removeClass("hidden");
})

$('#closeExcuseModalButton').on('click', function(event) {
    event.preventDefault();

    $('#viewExcuseModal').removeClass("flex");
    $('#viewExcuseModal').addClass("hidden");
})



$('#selectExcuseStatus').on('change', function(event) {
    event.preventDefault();
    
    const formData = {
        excuseId: $(this).data('excuse-id'),
        studentId: $(this).data('student-id'),
        excuseStatus: $(this).val(),
        changeExcuseStatusRequest: 1
    }

    console.log(formData)

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
