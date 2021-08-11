$(() => {
    $('#employeesShowBtn').click(() => {
        const $employeesShow = $('#employeesShow');
        $employeesShow.html('<i>Loading...</i>');

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
            $employeesShow.html(employeesHtml);
        });
    });
});
