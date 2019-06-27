@extends("layouts.global")
@section("title") User Student List @endsection
@section("content")

@if(session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
@endif
<div class="row">
  <div class="col-md-12">
    <form action="{{route('presences.index')}}">
        <div class="input-group mb-5">
        <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text" placeholder="Filter berdasarkan email"/>
            <div class="input-group-append">
                <input type="submit" value="Filter" class="btn btn-primary">
            </div>
        </div>
          <div class="col-6">
        <a href="{{route('presences.create')}}" class="btn btn-primary mb-3" style="margin-left:-10px; margin-top:-30px;">Create Student Attendance</a>
  </div>
    </form>
  </div>
</div>

<table class="table table-bordered">
        <thead>
                <tr>
                  <th><b>ROLL </b></th>
                  <th><b>STUDENT</b></th>
                  <th><b>DATE</b></th>
                  <th><b>STATUS</b></th>
                  <th><b>ACTIONS</b></th>
                </tr>
              </thead>
        <tbody>
            @foreach ($presences as $att)
            <tr>
                    <td>{{ $att->id }}</td>
                    <td>{{ $att->student }}</td>
                    <td>{{ $att->date }}</td>
                    <td>{{ $att->status }}</td>
                    <td>
                  <div class="btn-group">
                  <a class="btn btn-info text-white btn-sm" href="{{route('presences.edit', ['id'=>$att->id])}}">Edit</a>
                  <a href="{{route('presences.show', ['id' => $att->id])}}" class="btn btn-primary btn-sm">Detail</a>
                  <form onsubmit="return confirm('Delete this student attendance permanently?')" class="d-inline" action="{{route('presences.destroy', ['id' => $att->id ])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                  </form>
                </div>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{-- <div class="row">
        <div class="col-12 text-center">
          {{ $presence->links() }}
        </div>
      </div> --}}
@endsection
