@extends('layouts.app')

@section('content')
<div class="container">
    <br/>
    <h3 align="center">How to Delete or Remove Data From Mysql in Laravel 6 using Ajax</h3>
    <br/>
    <div align="right">
        <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
    </div>
    <br/>
    <div class="table-responsive">
        <table id="user_table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="35%">First Name</th>
                    <th width="35%">Last Name</th>
                    <th width="30%">Action</th>
                </tr>
            </thead>
        </table>
    </div>
    <br/>
</div>

<!-- Modal -->
<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Record</h4>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="sample_form" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-4">First Name:</label>
                        <div class="col-md-8">
                            <input type="text" name="first_name" id="first_name" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Last Name:</label>
                        <div class="col-md-8">
                            <input type="text" name="last_name" id="last_name" class="form-control" />
                        </div>
                    </div>
                    <br />
                    <div class="form-group" align="center">
                        <input type="hidden" name="action" id="action" value="Add" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $('#user_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ jroute('users.index') }}',
        columns: [
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'action', name: 'action', orderable: false}
        ]
    });
});
</script>
@endpush 
