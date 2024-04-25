<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <button id="myButton">Нажми меня</button>
<script>
    document.getElementById('myButton').addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'query.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            } else {
                console.log('Request failed.  Returned status of ' + xhr.status);
            }
        };
        xhr.send();
    });
</script>

</body>

</html>