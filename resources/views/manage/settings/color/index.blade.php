@extends('layouts.dashboard.backend')


@section('content')

<div>
    <h2>Website Colors</h2>
</div>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item">Setting</li>
    <li class="breadcrumb-item active">Colors</li>
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">
            <form action="{{ route('manage.settings.color.update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="primary">Primary Color</label>
                    <input type="color" name="primary" value="{{ $color->primary }}" placeholder="Default is #0000FF"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label for="secondary">Secondary Color</label>
                    <input type="color" name="secondary" value="{{ $color->secondary }}" placeholder="Default is #333"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label for="footer">Footer Color</label>
                    <input type="color" name="footer" value="{{ $color->footer }}" placeholder="Default is #28023D"
                        class="form-control">
                </div>
                <div class="from-group">
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Update Colors</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="jumbotron">
            <h4>Default Colors: </h4>
            <hr class="my-2">
            <p class="lead">Primary : #0000FF</p>
            <hr class="my-2">
            <p class="lead">Secondary : #333</p>
            <hr class="my-2">
            <p class="lead">Footer : #28023D</p>
            <hr class="my-2">
        </div>
    </div>
</div>

@stop
