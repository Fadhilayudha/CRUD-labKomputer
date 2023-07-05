<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="{{asset('https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dashboard.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/ds2.css')}}"> --}}
</head>
<body id="body-pd"> 
    <header class="header " id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="pull-right">Hello, {{ auth()->user()->name }}</div>
        <!-- <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div> -->
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> 
                    <span class="nav_logo-name">Lab-Komputer</span> 
                </a>
                <div class="nav_list"> 
                    <a href="/lab-komputer" class="nav_link" style="text-decoration: none"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a> 
                </div>
                <div class="nav_list"> 
                    <a href="/broken" class="nav_link  active " style="text-decoration: none"> 
                        <i class='bx bx-laptop nav_icon'></i> 
                        <span class="nav_name">Komputer Rusak</span> 
                    </a> 
                </div>
            </div> 
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="text-decoration: none" class="nav_link"> 
                <form id="logout-form" action="{{ route('logout') }}"
                method="POST" style="display: none; ">
                 @csrf
                </form>
                <i class='bx bx-log-out nav_icon'></i> 
                <span class="nav_name">Logout</span> 
            </a>
            {{-- <ul class="nav justify-content-end" style="paddingpx:20">
                <li class="nav-item">
                    <div class="text-right">
                        <a href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="bx bx-log-out nav_icon" style="color:rgb(255, 255, 255);">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}"
                                method="POST" style="display: none; ">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul> --}}
        </nav>
    </div>  



        <div class="container" style="margin-top:100px;">


        <h1>Komputer Rusak</h1>
        <br>

        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  ...
                </div>
              </div>
            </div>
          </div> --}}
          
        <div class="card" >
            <div class="card-body" >
                {{-- <a href="{{route('lab-komputer.create')}}" class="btn btn-primary">Tambah Komputer</a>
                <br>
                <br> --}}
        @csrf
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
        @endif 

        @if (Session::get('notAllowed'))
        <div class="alert alert-danger">
            {{ Session::get('notAllowed')}}
        </div>  
        @endif  

                <table class="table text-center "  width="100%">
                    {{-- <div class="header font-weight-bold"> --}}
                        <tr class="font-weight-bold">
                            <td>No. </td>
                            <td>Komputer ID</td>
                            <td>Merk Komputer</td>
                            <td>Kondisi</td>
                            <td>Ruang Penempatan</td>
                            <td class="text-center">Action</td>
                        </tr>
                    @foreach($komputers  as $index => $item)
                        <tr>
                            <td>{{ $index+1 }}.</td>
                            <td>{{ $item->no_komputer }}</td>
                            <td>{{ $item->merk_komputer}}</td>
                            <td>{{ $item->kondisi == 'Baik' ? 'Baik' : 'Rusak'}}</td>
                            <td>{{ $item->ruang_penempatan }}</td>
                            <td class="text-center">
                                <a href="{{ route('lab-komputer.edit', $item->id) }}" class="fa fa-edit" style="color: rgb(109, 255, 143); margin-right:15px;"></a>
                                <a href="{{ route('lab-komputer.destroy', $item->id) }}"  onclick="event.preventDefault();document.getElementById('delete_{{$item->id}}').submit();" class="fa fa-trash" style="color: rgb(247, 71, 71)"></a>
                                <form id="delete_{{$item->id}}" action="{{ route('lab-komputer.destroy', $item->id) }}"
                                        method="POST" style="display: none; ">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
        
    </body>
    <script src="{{asset('assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</html>