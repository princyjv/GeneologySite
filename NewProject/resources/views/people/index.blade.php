@extends('layouts.layout')  <!-- Ensure correct path to the layout -->

@section('content')
    <h1 class="my-4">People List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('people.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus"></i> Create New Person
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($people as $person)
                        <tr>
                            <td>{{ $person->first_name }} {{ $person->last_name }}</td>
                            <td>{{ optional($person->creator)->name }}</td>
                            <td>
                                <a href="{{ route('people.show', $person->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $people->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
