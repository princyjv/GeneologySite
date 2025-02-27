@extends('layouts.layout')

@section('content')
    <h1>Create New Person</h1>

    <form action="{{ route('people.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="middle_names">Middle Names (Optional)</label>
            <input type="text" name="middle_names" id="middle_names" class="form-control">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="birth_name">Birth Name (Optional)</label>
            <input type="text" name="birth_name" id="birth_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create Person</button>
    </form>
@endsection
