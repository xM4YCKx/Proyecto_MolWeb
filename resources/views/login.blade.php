<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/style.css') }}">
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
        <label>
          <input name="usuario" type="text" value="{{ old('usuario') }}" placeholder="nombre de ususario" required autofocus/>
        </label><br>
        @error('usuario') {{message}} @enderror
        <label>
          <input name="password" type="password" placeholder="contraseña" required/>
        </label><br>
        @error('password') {{message}} @enderror
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
</body>
</html>