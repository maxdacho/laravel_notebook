<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notebook App</title>
    <link href="/css/general.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
  <div class="container-fluid bg-warning" style="display: flex; justify-content: space-between;">
    <h1>Laravel Notebook App</h1>  
    <div class="my-3">
      @if(Auth::user())
      <span>Willkommen {{Auth::user()->name}}</span>
      @else
      <a href="/login">Login</a>
      <br>
      <a href="/register">Registrieren</a>
      @endif
      </div>
      <div class="my-2">
      <a href="{{url('/logout')}}"
        onclick="event.preventDefault();
        document.getElementById('logut-form').submit();">
                <button class="btn btn-danger">Ausloggen</button>
      </a>
      </div>
      <form id="logut-form" action="{{url('/logout')}}" method="POST">
      {{csrf_field()}}
      </form>
</div>
<div class="container col-9 my-5">
<h2>{{$note->title}}</h2>

<p>
{{$note->body}}
</p>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
