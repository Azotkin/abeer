<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список студентов SPA-приложение</title>
</head>
<body>
<div class = "container text-center">

    <div class="row ">
        <div class="col">
            <a href="#">Расписание</a>
        </div>
        <div class="col">
            <a href="#">Студенты</a>
        </div>
        <hr>
    </div>

    <div class="testForm">
        @if($errors->any())
            @foreach($errors->all() as $error)
               <h1>{{$error}}</h1>
            @endforeach
        @endif
        <form action="http://localhost/test" method="post">
            @csrf
            <input type="text" name="value" >
            <button type="submit">submit</button>
        </form>
    </div>
</div>

</body>
</html>
