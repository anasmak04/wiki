<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/wiki/public/css/styles.css">
</head>

<body>

    <form action="saveTag" method="POST"  id="myForm">
        <label for="multipleValues">Enter multiple values:</label>
        <input type="text" name="name" id="multipleValues">
        <button type="submit" name="submitTag">Submit</button>
    </form>

    <!-- <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const inputElement = document.getElementById('multipleValues');
            const enteredValue = inputElement.value.trim();
            const selectedValues = enteredValue.split(',').map(value => value.trim());
            console.log('Selected values:', selectedValues);
        });
    </script> -->




</body>

</html>