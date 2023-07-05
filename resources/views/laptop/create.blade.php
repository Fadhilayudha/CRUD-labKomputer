<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>  

    <div class="container" style="margin-top:90px;">
        <h1>CRUD Komputer Lab</h1>
        {{-- {{route('dashboard.index')}} --}}
        <br>
        <br>
        
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>  
    @endif

        <form  method="POST" action="{{route('lab-komputer.store')}}">
            {{-- {{ route('dashboard.store') }} --}}
        @csrf
            <div class="card shadow p-3 mb-5 bg-white rounded" style="margin-right: 235px;" >
            <div class="card-body justify-content" style=";">
                <div class="row col-md-6">
                    <div class="form-group">
                        <label>Komputer ID</label>
                        <input type="text" name="no_komputer" class="form-control" value=""  autocomplete="off">
                    {{-- @error('no_komputer')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror --}}
                    </div>
                </div>
                {{-- <div class="row col-md-6">
                    <div class="form-group">
                        <label>Ruang Penempatan</label>
                        <input type="text" name="ruang_penempatan" class="form-control"  value=""  autocomplete="off" >
                    @error('ruang_penempatan')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
                </div> --}}
                <br>
                <div class="row col-md-6">
                    <div class="form-group">
                        <label>Merk Komputer</label>
                        <input type="text" name="merk_komputer" class="form-control"  value=""  autocomplete="off" >
                    {{-- @error('merk_komputer')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror --}}
                    </div>
                </div>
                <br>
                <div class="row col-md-2">
                    <div class="form-group">
                        <label>Kondisi Komputer</label>
                        <select name="kondisi" class="form-select">
                            <option value="" selected="true" hidden disabled="disabled" class="fa fa-option">Silahkan Pilih</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                    </div>
                </div>
                <br>
                <a class="btn btn-danger" style="background-color:rgb(241, 40, 40); margin-right:10px;" href="{{route('lab-komputer.index')}}">Back</a>
                <button class="btn btn-primary" >Simpan</button>
                </form>
            </div>
        </div>
    </div>
        
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</html>