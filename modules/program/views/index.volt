<style>
#myModal .modal-dialog  {width:75%;}
.trumbowyg-box.trumbowyg-editor-visible {
  min-height: 150px;
}

.trumbowyg-editor {
  min-height: 150px;
}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.2.13/css/tableexport.css">
<div>{{content()}}</div>
<div class="grid_3 grid_5">
<table id="grid-program" class="table table-condensed table-hover table-striped">
        <thead>
        <tr>
            <th data-column-id="no" data-type="numeric" data-width="5%" data-sortable="false">no</th>
            <th data-column-id="title" data-sortable="false">Title</th>
            <th data-column-id="content" data-sortable="false">Content</th>
            <th data-column-id="locations" data-sortable="false">Location</th>
            <th data-column-id="requirement" data-sortable="false">Requirement</th>
            <th data-column-id="donation" data-sortable="false">Collected</th>
            <th data-column-id="benefit" data-sortable="false">Benefit</th>
            <th data-column-id="categories" data-sortable="false">Category</th>
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
                <form id="myForm" method="post" enctype="multipart/form-data">

                    <div class="form-group" >
                        <label>Title</label>
                        <input class="form-control" name="hidden_id" id="hidden_id" type="hidden" >
                        <input class="form-control" name="title" id="title" data-validation="required">
                    </div>

                    <div class="form-group" >
                        <label>Content</label>
                        <textarea id="summernote" name="content" class="form-control col-xs-12 summernote" rows="7"></textarea>
                    </div>
                    <div class="form-group" >
                        <div class="row">
                            <div class="col-xs-2">
                                <label>Start date</label>
                                <input type="text" id="start" name="start" class="form-control datepicker">
                            </div>
                            <div class="col-xs-2">
                                <label>End date</label>
                                <input type="text" id="end" name="end" class="form-control datepicker">
                            </div>
                            <div class="col-xs-2">
                                <label>Benefit </label>
                                <input type="text" id="benefit" name="benefit" class="form-control">
                            </div>
                            <div class="col-xs-3">
                                <label>Requirement </label>
                                <input type="text" id="requirement" name="requirement" class="form-control">
                            </div>
                            <div class="col-xs-3">
                                <label>Location </label>
                                <select name="location" id="location" class="form-control"></select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" >
                        <div class="row">

                            <div class="col-xs-4">
                                <label>Image </label>
                                Upload (280 × 326) <input type="file" id="file" name="file" class="btn btn-primary btn-file">
                            </div>

                            <div class="col-xs-4">
                                <label id="lab_cat">Category</label>
                                <select name="category" id="category" class="form-control">
                                </select>
                            </div>

                            <div class="col-xs-4">
                                <label>Publish </label>
                                <select name="publish" id="published" class="form-control">
                                    <option>--Publish (Yes/No)--</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="form-group" >
                        <div class="row">
                            <div class="col-xs-3 col-xs-offset-9">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>  close</button>
                                <button type="submit" name="save" class="btn btn-primary" id="save"><i class="fa fa-save"></i>  Save </button>
                            </div>
                        </div>
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