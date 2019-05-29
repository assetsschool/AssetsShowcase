@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @isset ($user)
                @if(isset($me))
                    <div class="card">
                        <div class="card-header"><h1>{{ $user->name }}</h1></div>

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form action="{{ route('edit-my-profile') }}" method="post" enctype="multipart/form-data">

                                @method('PUT')
                                @csrf

                                <div class="form-group">
                                    <label for="biography">Biography</label>
                                    <textarea name="biography" id="biography" class="form-control" placeholder="Enter your biography.">@isset ($user->profile){{ $user->profile->biography }}@endisset</textarea>
                                    <small id="emailHelp" class="form-text text-muted">Write a small description about yourself.</small>
                                </div>

                                <div class="form-group">
                                    <label for="photo">Profile Picture</label>
                                    <input type="file" name="photo" id="photo" accept="image/png,image/jpg,image/jpeg" class="form-control">
                                    <small class="form-text text-muted">Select an image you wish to use as your profile image.</small>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mb-2">Update</button>
                                    <small class="form-text text-muted">Update and save any profile changes.</small>
                                </div>

                            </form>
                        </div>
                    </div>
                @else
                <div class="card">
                    {{-- <div class="card-header"><h1 class="display-4">{{ $user->name }}</h1></div> --}}

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <h3 class="profile-header">
                            {{ $user->name }}
                            <small class="text-muted">Class of {{ $user->profile->class_of }}</small>
                            <hr>
                        </h3>

                        <i><p class="text-muted">Biography</p></i>
                        <p class="lead">
                            {{ $user->profile->biography }}
                        </p>


                    </div>
                </div>
                @endif
            @else
                <div class="alert alert-danger" role="alert">
                    Yikes! That user could not be found. You may be lost, let's get back to <a href="{{ route('home') }}">the main page</a>.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
