<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>     
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/67e5dc5a6a.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
        
        <title>@yield('title')</title>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-dark bg-dark">
                <div>
                    <a href="{{url('/')}}" class="title"> Oficina 2.0</a>
                    <a href="{{url('/')}}" class="title"> Orçamentos</a>
                    <a href="{{url('/cadastro/')}}" class="title"> Cadastro</a>
                    
                </div>
                
            </nav>
        </header>
        @yield('content')
    </body>
</html>