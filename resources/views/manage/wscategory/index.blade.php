@extends('layouts.dashboard.backend')



@section('content')


<div>
    <h2>WorkShop Categories</h2>
</div>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Category</li>
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">
            <div class="row">
                <div class="col-12">
                        <div class="row">
                            <div class="col-md-4">
                                <a data-toggle="modal" data-target="#AddModal" class="btn btn-primary"
                                    style="color: white"><i class="fa fa-plus"></i>Add</a>
                            </div>
                            
                        </div><!-- end of row -->
                </div><!-- end of col 12 -->

            </div><!-- end of row -->
            <br>
            <div class="row">
                <div class="table-responsive">
                    @if ($wscategories->count() > 0)
                    <table class="table" id="education_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="35%">Name</th>
                                <th width="35%">Status</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wscategories as $index=>$wscategory)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    {{ $wscategory->name }}
                                </td>
                                <td>
                                    
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#Edit-Modal-{{ $wscategory->id }}"><i class="fa fa-edit mr-0"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#Delete-Modal-{{ $wscategory->id }}"><i class="fa fa-trash mr-0"></i> </button>
                                </td>
                            </tr>
                            <!-- Edit-Modal -->
                            <div class="modal fade" id="Edit-Modal-{{ $wscategory->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit :
                                                {{ $wscategory->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('manage.wscategory.update' , $wscategory->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" value="{{ $wscategory->name }}"
                                                        placeholder="Enter name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="Delete-Modal-{{ $wscategory->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete "{{ $wscategory->name }}"</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('manage.wscategory.destroy', $wscategory->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $wscategories->appends(request()->query())->links() }}
                    @else
                    <p colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">No
                        Categories
                        Here</p>
                    @endif
                </div>
            </div>
        </div><!-- end of tile -->
    </div><!-- end of col -->

</div><!-- end of row -->


<!-- Create Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.wscategory.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Enter name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
