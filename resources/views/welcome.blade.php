<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/mycss.css">
    <title>Welcome</title>
    @livewireStyles
</head>

<body style="background-color:white;">
    <div class="container">
        @livewire('keypad')
    </div>
    @livewireScripts
</body>

</html>
