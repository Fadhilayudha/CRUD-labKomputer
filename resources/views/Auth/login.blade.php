<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
    <div class="container col-md-4 offset-4" style="margin-top:200px; background-color:#f6f8fa">

        @if(Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
        @endif

        <form  method="POST" action="{{ route('login') }}" >
            @csrf

            @if($errors->any())
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
            @endif

            
            @if (Session::get('notAllowed'))
            <div class="alert alert-danger">
                {{ Session::get('notAllowed')}}
            </div> 
            @endif


            <div class="row text-center">
                <h2>Login</h2>
            </div>
                <div class="row">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value=""  autocomplete="off">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" min="6" value=""  autocomplete="off">
                    </div>
                </div>
                <br>
            <button type="submit" class="btn btn-primary btn-block btn-sm" style="margin-bottom: 20px">Login</button>
        </form>     
    </div>
     
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>