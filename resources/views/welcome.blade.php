@extends('layouts.app')

@section('content')
<a href="{{ route('students.create') }}">Add Student</a>
<h1>Welcome to Customer Management System</h1>

<p><strong>What you can do:</strong></p>
<ul>
    <li>Create new customers</li>
    <li>View all customers</li>
    <li>Edit customer information</li>
    <li>Delete customers</li>
</ul>

<p><a href="3">Go to Customers →</a></p>

<hr>

<h2>Quick Actions:</h2>
<p>
    <a href="#">Add New Customer</a> |
    <a href="#">View All Customers</a>
</p>
@endsection