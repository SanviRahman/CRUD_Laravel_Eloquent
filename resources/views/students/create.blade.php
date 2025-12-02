@extends('layouts.app')

@section('content')
<div class="container h-100 mt-5">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Add a student</h3>
      <form action="{{ route('students.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
         <div class="form-group">
          <label for="phone">Phone</label>
          <input type="phone" class="form-control" id="phone" name="phone" required>
        </div>
         <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection
