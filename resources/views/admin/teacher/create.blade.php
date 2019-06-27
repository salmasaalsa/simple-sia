@extends("layouts.global")
@section("title") Create New Teacher @endsection
@section("content")

  <div class="col-md-8">
        @if(session('status'))
        <div class="alert alert-success">
          {{session('status')}}
        </div>
      @endif 
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('teacher.store')}}" method="POST">
      @csrf
        <label for="name">Full Name :</label>
            <input class="form-control" type="text" name="full_name" id="name"/><br>
        <label for="birth">Date of birth :</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"></input><br>
        <label for="place_of_birth">Place of birth :</label><br>
            <input type="text" name="place_of_birth" class="form-control"><br>
        <label for="address">Address :</label>
            <input class="form-control" name="address" id="address"/><br>
        <label for="phone">Phone :</label><br>
            <input type="number" name="phone" class="form-control"><br>
        <label for="email">Email :</label>
            <input class="form-control" placeholder="user@mail.com" type="email" name="email" id="email"/><br>
            <br><br>
      <input class="btn btn-primary" type="submit" value="Save"/>
    </form>
  </div>

@endsection