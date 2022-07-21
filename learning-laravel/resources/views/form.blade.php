<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/unicode" method='post'>
        <input type="text" name="username">
        <input type="hidden" name="method" value="put">
        <button type="submit">submit</button>
        @csrf
    </form>
</body>
</html>