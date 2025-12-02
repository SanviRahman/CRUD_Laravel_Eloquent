@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Add New Student</h3>
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('students.store') }}" method="post" class="mt-4">
        @csrf
        
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" 
                   value="{{ old('name') }}" required>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-3">
            <label>Phone:</label>
            <input type="text" name="phone" class="form-control" 
                   value="{{ old('phone') }}" required>
            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" 
                   value="{{ old('email') }}" required>
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        
        <button type="submit" class="btn btn-success">Save Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection