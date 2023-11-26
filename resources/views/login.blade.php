<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <title>Login</title>
    <style>
      body {
      background-image: url('img/fondo.jpg');
      background-repeat: no-repeat;
      background-position: center center;
      background-attachment: fixed;
      background-size: cover;
    }
    </style>
</head>

<body>

<div id="principal" class="login-page">
    <div class="form">
      <form action="login" class="login-form" method="POST">
        @csrf 
        <img src="img/logo.png" top width="120" height="120">
        <br/>
        <br/>
        <div class="form-group">
          <input name="usuario" type="text" value="{{ old('usuario') }}" placeholder="nombre de ususario" autofocus/>
        </div>
        @error('usuario')
          <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <br>
        <div clas="form-group">
          <input name="password" type="password" placeholder="contraseña" />
        </div>
        @error('password')
          <div class="alert alert-danger">{{$message}}</div> 
        @enderror
        <br>
          <button type="submit" >Ingresar</button>
        <p class="message">En caso de no poder ingresar contactar a su supervisor</p>
      </form>
      <!--<form class="register-form">
        <input type="text" placeholder="name"/>
        <input type="password" placeholder="password"/>
        <input type="text" placeholder="email address"/>
        <button>create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>-->
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
  crossorigin="anonymous"></script>
</body>
</html>