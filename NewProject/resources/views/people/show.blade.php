@extends('layouts.layout')

@section('content')
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0">Person Details</h3>
        </div>
        <div class="card-body">
            <!-- Person Information -->
            <div class="row">
                <div class="col-md-6">
                    <p><strong>First Name:</strong> {{ $person->first_name }}</p>
                    <p><strong>Middle Names:</strong> {{ $person->middle_names ?? 'N/A' }}</p>
                    <p><strong>Last Name:</strong> {{ $person->last_name }}</p>
                    <p><strong>Birth Name:</strong> {{ $person->birth_name ?? 'N/A' }}</p>
                    <p><strong>Date of Birth:</strong> {{ $person->date_of_birth ? \Carbon\Carbon::parse($person->date_of_birth)->format('d M, Y') : 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Created By:</strong> {{ $person->creator ? $person->creator->name : 'Unknown' }}</p>
                </div>
            </div>
            <hr>
            
            <!-- Parents and Children Details -->
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-3">Parents:</h5>
                    @if($person->parents->isEmpty())
                        <p>No parents listed.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($person->parents as $parent)
                                <li class="list-group-item">
                                    {{ $parent->parent->first_name }} {{ $parent->parent->last_name }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3">Children:</h5>
                    @if($person->children->isEmpty())
                        <p>No children listed.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($person->children as $child)
                                <li class="list-group-item">
                                    {{ $child->child->first_name }} {{ $child->child->last_name }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('people.index') }}" class="btn btn-secondary">Back to People List</a>
        </div>
    </div>
@endsection
