<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/main.css">
</head>
<body>
<fieldset class="submit">
    <legend>Submit employees JSON</legend>
    <form action="/employees" method="post" id="employeesSubmit">
            <textarea class="submit_field" id="employeesData">
[{
    "id": 1,
    "first_name": "Aviva",
    "last_name": "Pryde",
    "email": "apryde0@cbsnews.com",
    "phone": "873-134-6659",
    "timezone": "Pacific/Pago_Pago"
}, {
    "id": 2,
    "first_name": "William",
    "last_name": "Clancy",
    "email": "wclancy1@slate.com",
    "phone": "995-708-1606",
    "timezone": "Europe/Athens"
}, {
    "id": 3,
    "first_name": "Abbe",
    "last_name": "Allchorn",
    "email": "aallchorn2@thetimes.co.uk",
    "phone": "843-381-9148",
    "timezone": "Europe/Ljubljana"
}, {
    "id": 4,
    "first_name": "Rollin",
    "last_name": "Snoday",
    "email": "rsnoday3@nature.com",
    "phone": "761-675-1364",
    "timezone": "Asia/Jakarta"
}]
            </textarea>
        <input type="submit">
    </form>
</fieldset>

<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script src="/main.js"></script>
</body>
</html>
