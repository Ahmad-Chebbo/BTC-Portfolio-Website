@extends('layouts.dashboard.backend')



@section('content')


<div>
    <h2>WorkShop Projects</h2>
</div>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Project</li>
</ul>

<div class="row">
    <div class="col-md-12">
        <div class="tile mb-4">
            <div class="row">
                <div class="col-12">
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                @if ($wscategories->count() == 0)
                                <a data-toggle="modal" data-target="#No-Categories" class="btn btn-primary"
                                    style="color: white"  disabled><i class="fa fa-plus"></i>Add</a>
                                @else
                                <a data-toggle="modal" data-target="#AddModal" class="btn btn-primary"
                                    style="color: white"><i class="fa fa-plus"></i>Add</a>
                                @endif
                            </div>
                        </div><!-- end of row -->
                    </form><!-- end of form -->
                </div><!-- end of col 12 -->

            </div><!-- end of row -->
            <br>
            <div class="row">
                <div class="table-responsive">
                    @if ($wsprojects->count() > 0)
                    <table class="table" id="education_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wsprojects as $index=>$wsproject)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    <img style="width: 90px;height: 50px;" src="{{ $wsproject->image}}"
                                        alt="{{$wsproject->title}}">
                                </td>
                                <td>
                                    {{ $wsproject->title }}
                                </td>
                                <td>
                                    {{ $wsproject->category->name }}
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#Edit-Modal-{{ $wsproject->id }}"><i class="fa fa-edit mr-0"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="modal"
                                        data-target="#Delete-Modal-{{ $wsproject->id }}"><i
                                            class="fa fa-trash mr-0"></i> </button>
                                </td>
                            </tr>
                            
                            <!-- Edit-Modal -->
                            <div class="modal fade" id="Edit-Modal-{{ $wsproject->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit :
                                                {{ $wsproject->title }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('manage.wsproject.update' , $wsproject->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            {{ csrf_field() }}
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" value="{{ $wsproject->title }}"
                                                        placeholder="Enter title" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="category">Select a Category</label>
                                                    <select name="category_id" id="category_id" class="form-control"
                                                        required>
                                                        @foreach($wscategories as $wscategory)
                                                        <option value="{{$wscategory->id}}" @if ($wsproject->
                                                            category->id == $wscategory->id) selected @endif
                                                            >{{$wscategory->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <input type="file" name="image" class="form-control"
                                                        accept="image/*">
                                                </div>

                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="description" cols="30" rows="10"
                                                        placeholder="Enter description" class="form-control"
                                                        required>{{ $wsproject->description }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="title">Date From</label>
                                                    <input type="date" name="from" value="{{ $wsproject->from }}"
                                                        placeholder="Date From" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Date To</label>
                                                    <input type="date" name="to" value="{{ $wsproject->to }}"
                                                        placeholder="Date To" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="url">URL</label>
                                                    <input type="url" name="url" value="{{ $wsproject->url }}"
                                                        placeholder="Enter url" class="form-control">
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
                            <div class="modal fade" id="Delete-Modal-{{ $wsproject->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to
                                                delete "{{ $wsproject->title }}"</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('manage.wsproject.destroy', $wsproject->id) }}"
                                            method="POST" enctype="multipart/form-data">
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
                    {{ $wsprojects->appends(request()->query())->links() }}
                    @else
                    <p colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">No
                        Projects
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('manage.wsproject.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" placeholder="Enter title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="category">Select a Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($wscategories as $wscategory)
                            <option value="{{$wscategory->id}}">{{$wscategory->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="50" rows="20"
                            placeholder="Enter description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="title">Date From</label>
                        <input type="date" name="from" placeholder="Date From" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="title">Date To</label>
                        <input type="date" name="to" placeholder="Date To" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="url" name="url" placeholder="Enter url" class="form-control">
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


<div class="modal fade" id="No-Categories" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Please Add Some Categories First</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>        
            </div>
    </div>
</div>
@stop
