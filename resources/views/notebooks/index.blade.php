<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notebook App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
<div class="container col-9 my-5" style="display:flex; justify-content:space-between">
  <div>Deine Notizb&uuml;cher</div>
  <div class="search">
    <input type="search" name="search" id="search" placeholder="Suche nach Notizen" class="form-control">  
  </div>
  <a href="/notebooks/create">
  <button class="btn btn-success">Notizbuch anlegen</button>
  </a>
</div>



<div class="container col-9 my-5" style="display:flex; justify-content:space-between">
<table>
<tbody class="alldata">
@foreach($notebooks as $notebook) 
<div class="notebook-item" style="border: 1px solid #000; padding:2rem;">
<h1>
  <a href="{{route("notebooks.show",$notebook->id)}}">
{{$notebook->name}}
</a>
</h1>
  <br>
  <a href="{{route("notebooks.edit",$notebook->id)}}">
    <button class="btn btn-primary">Edit</button>
</a>
<form action="/notebooks/{{$notebook->id}}" method="POST">
{{csrf_field()}}
{{method_field('DELETE')}}
    <input class="btn btn-danger" type="submit" value="Delete">
</form>
</div>
@endforeach
</tbody>
</table>
<table>
<tbody id="content" class="searchdata"></tbody>
</table>


</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $('#search').on('keyup',function()
    {
        $value=$(this).val();
        if($value){
          $('.alldata').hide();
          $('.searchdata').show();
        }
        elese{
          $('.alldata').show();
          $('.searchdata').hide();
        }


        $.ajax({
            type: 'get',
            url: '{{URL::to('search')}}',
            data: {'search':$value},

            success:function(data){
              console.log(data);
              $('#content').html(data);
            }

        });
    })
    </script>
  </body>
</html>
