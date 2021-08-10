$(() => {
    $('#employeesSubmit').on('submit', () => {
        const data = $('#employeesData').val();

        $.ajax({
            type: 'POST',
            url: '/employees',
            data: data,
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            success: (data) => {
                alert('Success.\nYour data was submitted.');
            },
            error: function(errMsg) {
                alert('Error.\nSomething went wrong. Check the console for the details.');
                console.error(errMsg);
            }
        });

        return false;
    });
});
