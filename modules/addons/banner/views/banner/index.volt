<div class="col-md-12 col-sm-12">
    <div class="box">
        <header class="bg-alizarin text-white">
            <h4>Manage Banner</h4>
            <!-- begin box-tools -->
            <div class="box-tools">
                <a class="fa fa-fw fa-minus" href="#" data-box="collapse"></a>
                <a class="fa fa-fw fa-square-o" href="#" data-fullscreen="box"></a>
                <a class="fa fa-fw fa-refresh" href="#" data-box="refresh"></a>
                <a class="fa fa-fw fa-times" href="#" data-box="close"></a>
            </div>
            <!-- END: box-tools -->
        </header>
        <div class="box-body collapse in">
            {{ content() }}
        <table id="grid-banner" class="table table-condensed table-hover table-striped">
            <thead>
            <tr>
                <th data-column-id="no" data-type="numeric" data-width="5%" data-sortable="false">no</th>
                <th data-column-id="file" data-formatter="file" data-sortable="false">Image thumb</th>
                <th data-column-id="description" data-width="35%" data-sortable="false">Description</th>
                <th data-column-id="link" data-sortable="false">Link</th>
                <th data-column-id="created" data-order="desc">Created</th>
                <th data-column-id="publish" data-formatter="published" data-order="desc">Publish</th>
                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
            </tr>
            </thead>
        </table>
        </div>
    </div>
</div>

<div id="myBanner" class="modal fade modal-wide" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Banner</h4>
            </div>
            <div class="modal-body">
                <form id="myForm" method="post" enctype="multipart/form-data">
                    <div class="form-group" >
                        <input class="form-control" name="hidden_id" id="hidden_id" type="hidden" >
                        <label>Description</label>
                        <input class="form-control" name="description" id="description" >
                        <label>Description 1</label>
                        <input class="form-control" name="description1" id="description1" >
                    </div>
                    <div class="form-group" >
                        <label>Link</label>
                        <input class="form-control" name="link" id="link" >
                    </div>
                    <div class="form-group" >
                        <div class="row">

                            <div class="col-xs-6">
                                <label>Image </label>
                                Upload (1440 x 500) <input type="file" id="file" name="file" class="btn btn-primary btn-file">
                            </div>

                            <div class="col-xs-6">
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
                            <div class="col-xs-4 col-xs-offset-8">
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i>  close</button>
                                <button type="submit" name="save" class="btn btn-primary" id="save"><i class="fa fa-save"></i>  Save </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>