@extends('layouts.dashboard.backend')



@section('content')

<div>
    <h2>Website Sections</h2>
</div>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Sections</li>
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Header</th>
                                <th>Section</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($sections as $index=>$section)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    {{ $section->header }}
                                </td>
                                <td>
                                    {{ $section->section }}
                                </td>
                                <td>
                                    @if ($section->enabled)
									<a href="{{ route('manage.settings.section.disabled', $section->id) }}"
                                        class="btn btn-sm btn-danger">Disable</a>
									@else
									<a href="{{ route('manage.settings.section.enabled', $section->id) }}"
										class="btn btn-sm btn-success">Enable</a>
									@endif
                                </td>
                                <td>
                                    <a data-toggle="modal" data-target="#Edit-Modal-{{ $section->id }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-edit mr-0"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $sections->appends(request()->query())->links() }}
                </div>
            </div>

        </div><!-- end of tile -->
    </div><!-- end of col -->
</div><!-- end of row -->

@foreach ($sections as $section)
<!-- Update Modal -->
<div class="modal fade" id="Edit-Modal-{{ $section->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit : {{ $section->section }}l</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.settings.section.update', $section->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-body">

                    <div class="form-group" hidden>
                        <label for="section">Section</label>
                        <input type="text" name="section" value="{{ $section->section }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="header">Header</label>
                        <input type="text" name="header" value="{{ $section->header }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="subtitle">Subtitle</label>
                        <textarea type="text" name="subtitle" class="form-control" required>{{ $section->subtitle }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@stop
