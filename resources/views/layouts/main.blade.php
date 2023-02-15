<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RenBook | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<style>
    .main{
        height: 100vh;  
    }

    .sidebar{
        background-color: silver;
    }

    .sidebar a{
        text-decoration: none;
        padding: 30px 10px;
        color: black;
        display: block;
    }

    .sidebar a:hover{
        background-color: #ECECEC;
    }
    .sidebar a.active{
        background-color: #ECECEC;
        border-right: solid 4px #473C33;
    }

    .books{
        background-color: #85CDFD;
        border-radius: 4px;
    }
    .card-data{
        padding: 20px 70px;
    }
    .card-data i{
        font-size: 40px;
    }
    .desc{
        font-size: 30px;
    }
    .count{
        font-size: 30px;
    }
    .category{
        background-color: #85CDFD;
        border-radius: 4px;
    }

    .user{
        background-color: #85CDFD;
        border-radius: 4px;
    }

    .body {
        background-image: url("paper.gif");
    }

</style>
<body class="background">

    <div class="main d-flex flex-column justify-content-between">
        
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">RenBook</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
      
    </div>
  </div>
</nav>

<div class=" body-main h-100">
    <div class="row g-0 h-100">
   
        <div class=" sidebar col-2 p-3 collapse d-lg-block" id="navbarSupportedContent">
            @if(Auth::user()->roles_id ==1)
            <a href="/dashboard" @if(request()->route()->uri == 'dashboard') class='active'> @endif><i class="bi bi-house-dash"></i>Dashaboard</a>
            <a href="/users"@if(request()->route()->uri == 'users') class='active'> @endif><i class="bi bi-person-circle p-1"></i>User</a>
            <a href="/category"@if(request()->route()->uri == 'category') class='active'> @endif><i class="i bi-bookmark-check p-1"></i>Category</a>
            <a href="/books"@if(request()->route()->uri == 'books') class='active'> @endif><i class="bi bi-book p-1"></i>Books</a>
            <a href="/rent_logs"@if(request()->route()->uri == 'rent_logs') class='active'> @endif><i class="bi bi-briefcase p-1"></i>Rent Logs</a>
            <a href="/logout"@if(request()->route()->uri == 'logout') class='active'> @endif><i class="bi bi-door-closed p-1"></i>Logout</a>
            @else
            <a href="/profile"@if(request()->route()->uri == 'profile') class='active'> @endif><i class="bi bi-person-fill-check p-1"></i>profile</a>
            <a href="/logout"><i class="bi bi-door-closed p-1"></i>Logout</a>
            @endif
        </div>
        <div class="content col-10 p-5 ">
            @yield('content')
        </div>
    </div>
 </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>