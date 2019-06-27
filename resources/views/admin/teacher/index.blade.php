@extends("layouts.global")
@section("title") User Teacher List @endsection 
@section("content")

@if(session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
@endif 
<div class="row">
  <div class="col-md-12">
    <form action="{{route('teacher.index')}}">
        <div class="input-group mb-5">
        <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text" placeholder="Filter berdasarkan email"/>
            <div class="input-group-append">
                <input type="submit" value="Filter" class="btn btn-primary">
            </div>
        </div>
          <div class="col-6">
        <a href="{{route('teacher.create')}}" class="btn btn-primary mb-3" style="margin-left:-10px; margin-top:-30px;">Create User Teacher</a>
  </div>
    </form>
  </div>
</div> 

<table class="table table-bordered">
        <thead>
          <tr>
            <th><b>No.</b></th>            
            <th><b>Full Name</b></th>
            <th><b>Date of Birth</b></th>
            <th><b>Place of Birth</b></th>
            <th><b>Address</b></th>
            <th><b>Phone</b></th>
            <th><b>Email</b></th>
            <th><b>Actions</b></th>
          </tr>
        </thead>
        <tbody>
          @foreach($teacher as $tch)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$tch->full_name}}</td>
                <td>{{$tch->date_of_birth}}</td>
                <td>{{$tch->place_of_birth}}</td>
                <td>{{$tch->address}}</td>
                <td>{{$tch->phone}}</td>
                <td>{{$tch->email}}</td>
                <td>
                  <a class="btn btn-info text-white btn-sm" href="{{route('teacher.edit', ['id'=>$tch->id_teacher])}}">Edit</a>
                  <a href="{{route('teacher.show', ['id' => $tch->id_teacher])}}" class="btn btn-primary btn-sm">Detail</a>
                  <form onsubmit="return confirm('Delete this user teacher permanently?')" class="d-inline" action="{{route('teacher.destroy', ['id' => $tch->id_teacher])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                  </form>
                </td>
            </tr>
          @endforeach 
        </tbody>
      </table>
      <div class="row">
        <div class="col-12 text-center">
          {{ $teacher->links() }}
        </div>
      </div>
@endsection 