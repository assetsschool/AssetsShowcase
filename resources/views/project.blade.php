@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @isset($project)
                    <div class="card-header">
                        <h1>{{ $project->title }}</h1>
                    </div>

                    <div class="card-body">

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        {{ $project->description }}

                        {{-- <form action="{{ route('create-new-project') }}" method="post" enctype="multipart/form-data">

                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Project Title" value="{{ old('title') }}">
                                <small class="form-text text-muted">An interesting title for your project.</small>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Project Description">{{ old('description') }}</textarea>
                                <small class="form-text text-muted">A description about your project.</small>
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input name="date" type="date" id="date" class="form-control" placeholder="Project Description" value="{{ old('date') }}">
                                <small class="form-text text-muted">A date for the project. Examples: when the project is due, started, complete, etc.</small>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mb-2">Create</button>
                                <small class="form-text text-muted">Creates a new project.</small>
                            </div>

                        </form>
                    </div> --}}
                @else
                    <div class="card-header">
                        <h1>New Project</h1>
                    </div>

                    <div class="card-body">

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('create-new-project') }}" method="post" enctype="multipart/form-data">

                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Project Title" value="{{ old('title') }}">
                                <small class="form-text text-muted">An interesting title for your project.</small>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Project Description">{{ old('description') }}</textarea>
                                <small class="form-text text-muted">A description about your project.</small>
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input name="date" type="date" id="date" class="form-control" placeholder="Project Description" value="{{ old('date') }}">
                                <small class="form-text text-muted">A date for the project. Examples: when the project is due, started, complete, etc.</small>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mb-2">Create</button>
                                <small class="form-text text-muted">Creates a new project.</small>
                            </div>

                        </form>
                    </div>
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection
