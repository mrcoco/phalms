<div class="col-md-12 col-sm-12">
    <div class="box">
        <header class="bg-alizarin text-white">
            <h4>Manage Gallery</h4>
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
            <table id="grid-selection" class="table table-condensed table-hover table-striped">
                <thead>
                <tr>
                    <th data-column-id="no" data-type="numeric" data-width="6%" data-sortable="false">no</th>
                    <th data-column-id="title" data-sortable="false">Title</th>
                    <th data-column-id="gallery" data-sortable="false">Gallery</th>
                    <th data-column-id="description" data-width="35%" data-sortable="false">Description</th>
                    <th data-column-id="file_name" data-formatter="file_name" data-sortable="false">Image thumb</th>
                    <th data-column-id="created" data-order="desc">Created</th>
                    <th data-column-id="updated" data-order="desc">Updated</th>
                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div id="myGallery" class="modal fade modal-wide" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">List gallery</h4>
            </div>
            <div class="modal-body">
                <table id="grid-gallery" class="table table-condensed table-hover table-striped">
                    <thead>
                    <tr>
                        <th data-column-id="no" data-type="numeric" data-width="5%" data-sortable="false">no</th>
                        <th data-column-id="title" data-sortable="false">Title</th>
                        <th data-column-id="path" data-sortable="false">Path</th>
                        <th data-column-id="description" data-width="35%" data-sortable="false">Description</th>
                        <th data-column-id="created" data-order="desc">Created</th>
                        <th data-column-id="updated" data-order="desc">Updated</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                {#<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>#}
                {#<button type="submit" class="btn btn-primary" id="save">Save changes</button>#}
            </div>
        </div>
    </div>
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
                        <input class="form-control" name="title" id="title" >
                    </div>

                    <div class="form-group" >
                        <label>Content</label>
                        <textarea id="summernote" name="description" class="form-control col-xs-12 summernote"></textarea>
                    </div>

                    <div class="form-group" >
                        <div class="row">

                            <div class="col-xs-4">
                                <label>Image </label>
                                Upload <input type="file" id="file" name="file" class="btn btn-primary btn-file">
                            </div>

                            <div class="col-xs-4">
                                <label id="label-gallery">Gallery</label>
                                <select name="gallery" id="gallery" class="form-control">
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <br>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i>  close</button>
                                <button type="submit" name="save" class="btn btn-primary" id="save"><i class="fa fa-save"></i>  Save </button>
                            </div>
                        </div>
                    </div>

                    {#<div class="form-group" >#}
                        {#<div class="row">#}
                            {#<div class="col-xs-3 col-xs-offset-9">#}
                                {#<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>  close</button>#}
                                {#<button type="submit" name="save" class="btn btn-primary" id="save"><i class="fa fa-save"></i>  Save </button>#}
                            {#</div>#}
                        {#</div>#}
                    {#</div>#}

                </form>
            </div>
            <div class="modal-footer">
                {#<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>#}
                {#<button type="submit" class="btn btn-primary" id="save">Save changes</button>#}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="myFormGallery" class="modal fade modal-wide" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Gallery</h4>
            </div>
            <div class="modal-body">
                <div id="result-form"></div>
                <form id="manage-gallery" method="post">

                    <div class="form-group" >
                        <label>Title</label>
                        <input class="form-control" name="hidden_id" id="gallery_hidden_id" type="hidden" >
                        <input class="form-control" name="title" id="gallery_title" >
                    </div>

                    <div class="form-group" >
                        <label>Content</label>
                        <textarea id="description" name="description" class="form-control col-xs-12 summernote" rows="4"></textarea>
                    </div>

                    <div class="form-group" >
                    <div class="row">
                    <div class="col-xs-12">
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