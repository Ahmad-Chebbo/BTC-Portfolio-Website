@extends('layouts.dashboard.backend')



@section('content')

<div>
    <h2>My Titles</h2>
</div>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Titles</li>
</ul>
{{-- data-toggle="modal" data-target="#Add-Modal" --}}
<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">
            <div class="row">
                <div class="col-12">
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="javascript:void(0)" id="createNewTitle" data-toggle="modal" data-target="#Add-Modal" style="color: white"
                                    class="btn btn-primary"><i class="fa fa-plus"></i>
                                    Add</a>
                            </div>
                        </div><!-- end of row -->
                    </form><!-- end of form -->
                </div><!-- end of col 12 -->

            </div><!-- end of row -->
            <br>
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-border" id="data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($titles as $index=>$title)
                            <tr>
                                <td>{{ $index+1 }}</td>
                            <td>
                                {{ $title->title }}
                            </td>
                            <td>
                                @if ($title->enabled)
                                <a href="{{ route('manage.settings.title.disabled', $title->id) }}"
                                    class="btn btn-sm btn-danger">Disable</a>
                                @else
                                <a href="{{ route('manage.settings.title.enabled', $title->id) }}"
                                    class="btn btn-sm btn-success">Enable</a>
                                @endif
                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#Edit-Modal-{{ $title->id }}"
                                    class="btn btn-warning btn-sm"><i class="fa fa-edit mr-0"></i>
                                </a>
                                <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="modal"
                                    data-target="#Delete-Modal-{{ $title->id }}"><i class="fa fa-trash mr-0"></i>
                                </button>
                            </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $titles->appends(request()->query())->links() }}
                </div>
            </div>

        </div><!-- end of tile -->
    </div><!-- end of col -->
</div><!-- end of row -->


<!-- Create Modal -->
<div class="modal fade" id="Add-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.settings.title.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="section">Title</label>
                        <input type="text" name="title" class="form-control" required>
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

@foreach ($titles as $title)
<!-- Update Modal -->
<div class="modal fade" id="Edit-Modal-{{ $title->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit : {{ $title->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.settings.title.update', $title->id) }}" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="section">Title</label>
                        <input type="text" name="title" id="title" value="{{ $title->title }}" class="form-control">
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
<!-- Delete Modal -->
<div class="modal fade" id="Delete-Modal-{{ $title->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete "{{ $title->title }}"?
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.settings.title.destroy', $title->id) }}" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('delete')
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@stop
