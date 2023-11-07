<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
</head>

<body>
    <h1 class='fact'>

    </h1>

    <button id='getFactButton' onclick="fetchCatFact()">
        Press the fucking button to get a nice ol' cat fact you bitch cunt 
    </button>
    <p style="color: red" id='error'></p>
    <input id='stuff' type='text' placeholder='number 42' />



<script>
    const btn = document.getElementById('getFactButton');
    const err = document.getElementById('error');
    const input = document.getElementById('stuff');

    const fetchCatFact = () => {
        const parameterValue = input.value;

        if (parameterValue === '' || parameterValue !== '42') {
            err.innerHTML = 'Input must be "42"';
            return;
        }

        err.innerHTML = '';

        const url = `getCatFact.php?param=${parameterValue}`;

        fetch(url)
            .then(response => {
                if (response.status === 200) {
                    return response.text();
                } else {
                    err.innerHTML = 'Request failed with status: ' + response.status;
                    return Promise.reject('Request failed');
                }
            })
            .then(data => {
                document.querySelector('.fact').innerHTML = data;
            })
            .catch(error => console.error(error));
    }

</script>
</body>
</html>


</body>

</html>