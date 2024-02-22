<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Страница авторизации</title>
</head>
<body>
<header>
    <div class="container text align-items-center">
        <div class="logo"><img src="../../../../../public/img/devilerer_logo.png" alt="Logo"></div>
        <div><h1>Железная доставка</h1></div>
    </div>
    <hr>
</header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3 text-center m-auto">
            @error('email')
            <h4>{{$message}}</h4>
            @enderror
            @error('password')
            <h4>{{$message}}</h4>
            @enderror
            @error('password_confirmed')
            <h4>{{$message}}</h4>
            @enderror
            <form method="POST" action="{{route('authenticate')}}">
                @csrf
                <label  for="emailInput">Введите свой email</label>
                <input name="email" class="form-control" type="email" id="emailInput" placeholder="Email">
                <label for="passwordInput">Введите свой пароль</label>
                <input name="password" class="form-control" type="password" id="passwordInput" placeholder="Пароль">
                <div class="">
                    <a class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover p-2" href="{{ route('login') }}">У меня есть логин и пароль</a>
                </div>
                <button class="btn btn-success m-3">Зарегистрироваться</button>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <span class="mb-3 mb-md-0 text-body-secondary">© {{date("Y")}} Железная доставка</span>
        </div>
    </footer>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</body>
</html>
