<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <ul class="nav justify-content-end" style="padding:20px">
        {{-- <li class="nav-item">
        <a class="nav-link active" href="#">ABSENSI</a>
        </li> --}}

        <li class="nav-item">
            <div class="text-right">
                {{-- <a href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-success btn-sm; margin-top:20px">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}"
                        method="POST" style="display: none; ">
                    @csrf
                </form> --}}
            </div>
        </li>
    </ul>
   
    
    <div class="container" style="margin-top:60px;">
        <h1>Lab Komputer</h1>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lab-komputer.index') }}">Lab Komputer</a>
            </li>
        </ul>

        <div class="card">
            {{-- <div class="card-body">
                Welcome, {{ auth()->user()->name }}
            </div> --}}
        </div>
    </div>
        
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</html>