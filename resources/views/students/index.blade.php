@extends('layouts.app')

@section('content')
<style>
    .students-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .page-title {
        color: #333;
        margin-bottom: 25px;
        padding-bottom: 10px;
        border-bottom: 2px solid #0069d9;
    }

    .students-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .students-table thead {
        background-color: #0069d9;
        color: white;
    }

    .students-table th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        border: 1px solid #ddd;
    }

    .students-table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
    }

    .students-table tbody tr {
        transition: background-color 0.3s;
    }

    .students-table tbody tr:hover {
        background-color: #f8f9fa;
    }

    .students-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .students-table tbody tr:nth-child(even):hover {
        background-color: #e9ecef;
    }

    .action-links {
        display: flex;
        gap: 10px;
    }

    .action-links a, .action-links form {
        display: inline-block;
    }

    .update-btn {
        display: inline-block;
        background-color: #ffc107;
        color: #212529;
        border: 1px solid #ffc107;
        padding: 6px 12px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        transition: all 0.3s;
    }

    .update-btn:hover {
        background-color: #e0a800;
        border-color: #d39e00;
        color: #212529;
    }

    .delete-btn {
        display: inline-block;
        background-color: #dc3545;
        color: white;
        border: 1px solid #dc3545;
        padding: 6px 12px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        transition: all 0.3s;
        cursor: pointer;
        border: none;
    }

    .delete-btn:hover {
        background-color: #c82333;
        border-color: #bd2130;
        color: white;
    }

    .empty-message {
        text-align: center;
        padding: 40px;
        color: #6c757d;
        font-size: 18px;
        background-color: #f8f9fa;
        border-radius: 8px;
        margin-top: 20px;
    }

    .add-new-btn {
        display: inline-block;
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 20px;
        font-weight: 600;
        transition: background-color 0.3s;
    }

    .add-new-btn:hover {
        background-color: #218838;
        color: white;
        text-decoration: none;
    }

    /* Success message */
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        padding: 12px;
        border-radius: 5px;
        margin-bottom: 20px;
        border: 1px solid #c3e6cb;
    }
</style>

<div class="students-container">
    <h2 class="page-title">📚 Students List</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('students.create') }}" class="add-new-btn">➕ Add New Student</a>

    @if(isset($students) && count($students) > 0)
    <table class="students-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td><strong>#{{ $student->id }}</strong></td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->email }}</td>
                <td>
                    <div class="action-links">
                        <!-- Update Link -->
                        <a href="{{ route('students.edit', $student->id) }}" class="update-btn">✏️ Edit</a>
                        
                        <!-- Delete Form -->
                        <form action="{{ route('students.delete', $student->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure?')">
                                🗑️ Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="empty-message">
        📝 No students found. Add your first student!
    </div>
    @endif
</div>

<script>
    // Confirm before delete
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('form[action*="destroy"]');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm('Are you sure you want to delete this student?')) {
                    e.preventDefault();
                }
            });
        });
    });
</script>
@endsection