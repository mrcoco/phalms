<style>
    .modal-wide .modal-dialog {
        width: 25%; /* or whatever you wish */
    }
</style>
<div class="grid_3 grid_5">
    <table id="grid-selection" class="table table-condensed table-hover table-striped">
        <thead>
        <tr>
            <th data-column-id="no" data-type="numeric" data-identifier="true" >NO</th>
            <th data-column-id="name" data-order="desc">Title</th>
            <th data-column-id="slug">Slug</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
        </tr>
        </thead>
    </table>
</div>
<div id="myModal" class="modal fade modal-wide" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <div id="result-form"></div>
                <form id="myForm" method="post">

                    <div class="form-group" >
                        <label>Title</label>
                        <input class="form-control" name="hidden_id" id="hidden_id" type="hidden" >
                        <input class="form-control" name="title" id="title" >
                    </div>

                    <div class="form-group" >
                         <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>  Cancel</button>
                         <button type="submit" name="save" class="btn btn-primary" id="save"><i class="fa fa-save"></i>  Save </button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                {#<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>#}
                {#<button type="submit" class="btn btn-primary" id="save">Save changes</button>#}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->