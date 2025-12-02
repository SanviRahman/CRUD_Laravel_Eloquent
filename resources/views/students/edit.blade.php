@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Update Student</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('students.update', $student->id) }}" method="post">
                        @csrf
                        @method('PUT') <!-- এই line টি important -->
                        
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $student->name }}" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $student->phone }}" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $student->email }}" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update Student</button>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection