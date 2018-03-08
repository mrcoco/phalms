{{ content() }}
<div class="col-md-12 col-sm-12">
    <div class="box">
        <header class="bg-alizarin text-white">
            <h4>User Manager</h4>
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
            <table id="grid-selection" class="">
                <thead>
                <tr>
                    <th data-column-id="no" data-type="numeric" data-sortable="false">no</th>
                    <th data-column-id="name" data-sortable="false">Name</th>
                    {#<th data-column-id="slug" data-sortable="false">Slug</th>#}
                    <th data-column-id="email" data-sortable="false">Email</th>
                    <th data-column-id="profile" data-sortable="false">Profile</th>
                    <th data-column-id="banned" data-formatter="banned" data-sortable="false">Banned</th>
                    <th data-column-id="suspended" data-formatter="suspended" data-sortable="false">Suspended</th>
                    <th data-column-id="active" data-formatter="active" data-sortable="false">Active</th>
                    <th data-column-id="commands"  data-formatter="commands" data-sortable="false">Action</th>
                </tr>
                </thead>
            </table>
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
                <form id="myForm" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" >
                                <label>Name</label>
                                <input class="form-control" name="hidden_id" id="hidden_id" type="hidden" >
                                <input class="form-control" name="name" id="name" data-validation="required">
                            </div>
                            <div class="form-group" >
                                <label>Password</label>
                                <input class="form-control" name="password" type="password" id="password" data-validation="required">
                            </div>
                            <div class="form-group" >
                                <label>Banned</label>
                                <select name="banned" id="banned" class="form-control">
                                    <option>--Banned (Yes/No)--</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                            <div class="form-group" >
                                <label>Profile</label>
                                <select name="profile" id="profile" class="form-control">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" >
                                <label>Email</label>                    
                                <input class="form-control" name="email" id="email" data-validation="required">
                            </div>
                            <div class="form-group" >
                                <label>Confirm Password</label>
                                <input class="form-control" type="password" name="confirmpassword" id="confirmpassword" data-validation="required">
                            </div>
                            <div class="form-group" >
                                <label>Suspended</label>
                                <select name="suspended" id="suspended" class="form-control">
                                    <option>--Suspended (Yes/No)--</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                            <div class="form-group" >
                                <label>Active</label>
                                <select name="active" id="active" class="form-control">
                                    <option>--Active (Yes/No)--</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                            <div class="form-group" >                            
                                <!--<div class="row">
                                    <div class="col-xs-6 col-md-6 col-xs-offset-6 col-md-offset-6">-->
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>  close</button>
                                        <button type="submit" name="save" class="btn btn-primary" id="save"><i class="fa fa-save"></i>  Save </button>
                                    <!-- </div> -->
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