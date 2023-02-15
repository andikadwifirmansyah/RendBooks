<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Rent Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <style>
    .form-login{
      border: 1px solid;
      padding: 10px;
      border-radius:10px;
    }
  </style>
  <body>
    
  
        <div class="container d-flex justify-content-center align-items-center position-relative position-absolute top-50 start-50 translate-middle">
            <div class="form-login">

            @if (session('status'))
            <div class="alert alert-danger">
            {{ session('message') }}
            </div>
            @endif
        
        <form action="" method="post" style="width: 500px;">
        @csrf
        <div class="mb-3 text-center">
                <h2>Login</h2>
            </div>
  <div class="mb-3">
    <label for="username" class="form-label">username</label>
    <input type="text" name="username" class="form-control" id="username">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">password</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>
  <button type="submit" class="btn btn-primary w-100">Login</button>
  <div class="mp3 text-center">
    <p>don't Have account? <a href="/register" style="text-decoration: none;">Register</a></p>
  </div>
</form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
