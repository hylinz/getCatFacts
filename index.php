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
        let btn = document.getElementById('getFactButton');
        let err = document.getElementById('error');
        let input = document.getElementById('stuff');

        const fetchCatFact = () => {
            if (input.value === '' || input.value !== '42') {
                console.log(input.value)
                err.innerHTML = 'input 42 you dummy'
            } else {
                err.innerHTML = ''
                console.log('Button clicked'); // Debugging
                const parameterValue = input.value; // Replace with your desired parameter value

                // Construct the URL with the parameter
                const url = `getCatFact.php?param=${parameterValue}`;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        console.log('Data received:', data); // Debugging
                        if (data.trim() !== '') { // Check if data is not an empty string
                            document.querySelector('.fact').innerHTML = data;
                        } else {
                            document.querySelector('.fact').innerHTML = 'No cat fact yet';
                        }
                    })
                    .catch(error => console.error(error));
            }
            btn.addEventListener('click', function() {
                fetchCatFact()
            })
        }
    </script>
</body>

</html>