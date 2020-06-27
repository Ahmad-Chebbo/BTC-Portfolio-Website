@extends('layouts.dashboard.backend')


@section('content')

<div>
    <h2>Website Media</h2>
</div>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Setting</li>
    <li class="breadcrumb-item active">Media</li>
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">
            <form action="{{ route('manage.settings.media.update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group image-upload">
                            <label for="profile">Profile Image <br> <br>
                                <img src="{{ $media->profile }}" alt="" width="200" height="200">
                            </label>
                            <input type="file" id="profile" name="profile" value="{{ $media->profile }}"
                                class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group image-upload">
                            <label for="background">Background Image <br> <br>
                                <img src="{{ $media->background }}" alt="" width="200" height="200">
                            </label>
                            <input type="file" id="background" name="background" value="{{ $media->background }}"
                                class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group image-upload">
                            <label for="counter">Counter Image <br> <br>
                                <img src="{{ $media->counter }}" alt="" width="200" height="200">
                            </label>
                            <input type="file" id="counter" name="counter" value="{{ $media->counter }}"
                                class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group image-upload">
                            <label for="quote">Quote Image <br> <br>
                                <img src="{{ $media->quote }}" alt="" width="200" height="200">
                            </label>
                            <input type="file" id="quote" name="quote" value="{{ $media->quote }}" class="form-control"
                                accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group image-upload">
                            <label for="favicon">Favicon Image <br> <br>
                                <img src="{{ $media->favicon }}" alt="" width="20" height="20">
                            </label>
                            <input type="file" id="favicon" name="favicon" value="{{ $media->favicon }}" class="form-control"
                                accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cv">CV</label>
                            <input type="file" name="cv" value="{{ $media->cv }}" class="form-control" accept="pdf">
                        </div>
                    </div>
                </div>


                <div class="from-group">
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Update Media</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .image-upload>input {
        display: none;
    }

</style>
@stop
