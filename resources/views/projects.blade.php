@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($projects) > 0)
                @foreach($projects as $project)
                    <div class="card">
                        <div class="card-header"><h1>{{ $project->title }}</h1></div>

                        <div class="card-body">
                            <h5>{{ $project->user->name }} - {{ $project->date }}</h5>
                            <br>
                            {{ $project->description }}
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-danger" role="alert">
                    Hol up. There doesn't seem to be any projects in the database.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
