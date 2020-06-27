<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Title;
use Session;
use App\ColorSetting;
// use DataTables;
use Yajra\Datatables\Datatables;

class TitleController extends Controller
{

    public function index(Request $request){

        if ($request->ajax()) {
            $data = Title::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'
                        " data-original-title="Edit" class="edit btn btn-warning btn-sm editTitle">Edit</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'
                        " data-original-title="Delete" class="btn btn-danger btn-sm deleteTitle">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('manage.settings.title.index',compact('titles'))->with('color',ColorSetting::first());
    }

    public function store(Request $request)
    {
        Title::updateOrCreate(['id' => $request->title_id],
                ['title' => $request->title, 'enabled' => true]);        
        return response()->json(['success'=>'Title saved successfully.']);
    }

    public function edit($id)
    {
        $title = Title::find($id);
        return response()->json($title);
    }

    public function destroy($id)
    {
        Title::find($id)->delete();
        return response()->json(['success'=>'Title deleted successfully.']);
    }

    public function enabled(Title $title)
    {
        $title->enabled = 1;
        $title->save();
        session()->flash('success', 'Title Link enabled successfully'); 
        return redirect()->back();

    } 
    public function disabled(Title $title)
    {
        $title->enabled = 0;
        $title->save();
        session()->flash('success', 'Title Link disabled successfully'); 
        return redirect()->back();
    }

}



// <div class="modal fade" id="ajaxModel" aria-hidden="true">
//     <div class="modal-dialog">
//         <div class="modal-content">
//             <div class="modal-header">
//                 <h4 class="modal-title" id="modelHeading"></h4>
//             </div>
//             <div class="modal-body">
//                 <form id="titleForm" name="titleForm" class="form-horizontal">
//                     <input type="hidden" name="title_id" id="title_id">
//                     <div class="form-group">
//                         <label for="title" class="col-sm-2 control-label">Title</label>
//                         <div class="col-sm-12">
//                             <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title"
//                                 value="" maxlength="50" required="">
//                         </div> <br>
//                         <label for="enabled" class="col-sm-2 control-label">Enabled</label>
//                         <div class="col-sm-12">
//                             <input type="text" class="form-control" id="enabled" name="enabled" placeholder="Enter Title"
//                                 value="" maxlength="50" required="">
//                         </div>
//                     </div>
//                     <div class="col-sm-offset-2 col-sm-10">
//                         <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save</button>
//                     </div>
//                 </form>
//             </div>
//         </div>
//     </div>
// </div>

// <script type="text/javascript">
//     $(function () {
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//         var table = $('#data-table').DataTable({
//             processing: true,
//             serverSide: true,
//             ajax:"{{ route('manage.settings.title.index') }}",
//             columns: [{
//                     data: 'DT_RowIndex',
//                     name: 'DT_RowIndex'
//                 },
//                 {
//                     data: 'title',
//                     name: 'title'
//                 },
//                 {
//                     data: 'enabled',
//                     name: 'enabled'
//                 },
//                 {
//                     data: 'action',
//                     name: 'action',
//                     orderable: false,
//                     searchable: false
//                 },
//             ]
//         });
//         $('#createNewTitle').click(function () {
//             $('#saveBtn').val("create-title");
//             $('#title_id').val('');
//             $('#titleForm').trigger("reset");
//             $('#modelHeading').html("Create New Title");
//             $('#ajaxModel').modal('show');
//         });
//         $('body').on('click', '.editTitle', function () {
//             var product_id = $(this).data('id');
//             $.get("{{ route('manage.settings.title.index') }}" + '/' + title_id + '/edit', function (data) {
//                 $('#modelHeading').html("Edit Title");
//                 $('#saveBtn').val("edit-user");
//                 $('#ajaxModel').modal('show');
//                 $('#title_id').val(data.id);
//                 $('#title').val(data.title);
//                 $('#enabled').val(data.enbaled);
//             })
//         });
//         $('#saveBtn').click(function (e) {
//             e.preventDefault();
//             $(this).html('Sending..');
//             $.ajax({
//                 data: $('#titleForm').serialize(),
//                 url: "{{ route('manage.settings.title.store') }}",
//                 type: "POST",
//                 dataType: 'json',
//                 success: function (data) {

//                     $('#titleForm').trigger("reset");
//                     $('#ajaxModel').modal('hide');
//                     table.draw();
//                 },
//                 error: function (data) {
//                     console.log('Error:', data);
//                     $('#saveBtn').html('Save Changes');
//                 }
//             });
//         });
//         $('body').on('click', '.deleteTitle', function () {
//             var title_id = $(this).data("id");
//             confirm("Are You sure want to delete !");
//             $.ajax({
//                 type: "DELETE",
//                 url: "{{ route('manage.settings.title.store') }}" + '/' + title_id,
//                 success: function (data) {
//                     table.draw();
//                 },
//                 error: function (data) {
//                     console.log('Error:', data);
//                 }
//             });
//         });
//     });

// </script>
