@extends('layout')
@section('content')

    <h1>CRUD Computer Lab</h1>
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
            <a href="{{route('lab-komputer.create')}}" class="btn btn-primary">Tambah Komputer</a>
            <br>
            <br>
            
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
            @endif 

            @if (Session::get('NotAllowed'))
            <div class="alert alert-danger">
                {{ Session::get('NotAllowed')}}
            </div> 
            @endif

            <table class="table text-center  "  width="100%">
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
@endsection