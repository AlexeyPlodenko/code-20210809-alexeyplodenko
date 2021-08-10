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

    $('#employeesShowBtn').click(() => {
        $.get('/employees', (data) => {
            if (!('response' in data)) {
                // handling empty list
                return;
            }

            const employeesJson = [];
            for (const employee of data.response) {
                const employeeJson = JSON.stringify(employee);
                employeesJson.push(employeeJson);
            }

            const employeesHtml = employeesJson.join('<hr>');
            $('#employeesShow').html(employeesHtml);
        });
    });
});
