$('#fileAttendanceButton').on('click', function(event) {
    $('#fileAttendanceModal').removeClass("hidden");
    $('#fileAttendanceModal').addClass("flex");
})

$('#closeAttendanceModalButton').on('click', function(event) {
    $('#fileAttendanceModal').removeClass("flex");
    $('#fileAttendanceModal').addClass("hidden");
})

$('#submitAttendanceButton').on('click', function(event) {
    event.preventDefault();

    const formData = {
        date: $('#attendanceDateField').val(),
        time: $('#attendanceTimeField').val(),
        fileAttendanceRequest: 1
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



$('#submitExcuseButton').on('click', function(event) {
    $('#submitExcuseModal').removeClass("hidden");
    $('#submitExcuseModal').addClass("flex");
})

$('#closeExcuseModalButton').on('click', function(event) {
    $('#submitExcuseModal').removeClass("flex");
    $('#submitExcuseModal').addClass("hidden");
})

$('#excuseTextField').on('input', function() {
    const isEmpty = $(this).val().trim() === '';
    $('#confirmSubmitExcuseButton').prop('disabled', isEmpty);
});


$('#confirmSubmitExcuseButton').on('click', function(event) {
    event.preventDefault();

    const formData = {
        date: $('#excuseDateField').val(),
        content: $('#excuseTextField').val(),
        submitExcuseRequest: 1
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