<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notebook App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid bg-warning">
    <h1>Laravel Notebook App</h1>
</div>
<div class="container col-9 my-5" style="display:flex; justify-content:space-between">
  <div>Deine Notizb&uuml;cher</div>
  <button class="btn btn-success">Notizbuch anlegen</button>
</div>


<div class="container col-9 my-5" style="display:flex; justify-content:space-between">
@foreach($notebooks as $notebook) 
<div class="notebook-item" style="border: 1px solid #000; padding:2rem;">
<h1>
{{$notebook->name}}
</h1>
  <br>
  <a href="/notebooks/{{$notebook->id}}">
    <button class="btn btn-primary">Edit</button>
</a>
    <button class="btn btn-danger">Delete</button>
</div>
@endforeach
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
