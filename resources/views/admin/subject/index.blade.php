@extends("layouts.global")
@section("title") Subject List @endsection 
@section("content")

@if(session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
@endif 
<div class="row">
  <div class="col-md-12">
    <form action="{{route('subject.index')}}">
        <div class="input-group mb-5">
        <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text" placeholder="Filter berdasarkan email"/>
            <div class="input-group-append">
                <input type="submit" value="Filter" class="btn btn-primary">
            </div>
        </div>
          <div class="col-6">
        <a href="{{route('subject.create')}}" class="btn btn-primary mb-3" style="margin-left:-10px; margin-top:-30px;">Create Subject Name</a>
  </div>
    </form>
  </div>
</div> 

<table class="table table-bordered">
        <thead>
          <tr>
            <th><b>No.</b></th>            
            <th><b>Subject Name</b></th>
            <th><b>Actions</b></th>
          </tr>
        </thead>
        <tbody>
          @foreach($subject as $sbj)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$sbj->subject}}</td>
                <td>
                  <a class="btn btn-info text-white btn-sm" href="{{route('subject.edit', ['id'=>$sbj->id_subject])}}">Edit</a>
                  <a href="{{route('subject.show', ['id' => $sbj->id_subject])}}" class="btn btn-primary btn-sm">Detail</a>
                  <form onsubmit="return confirm('Delete this user teacher permanently?')" class="d-inline" action="{{route('subject.destroy', ['id' => $sbj->id_subject])}}" method="POST">
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
          {{ $subject->links() }}
        </div>
      </div>
@endsection 