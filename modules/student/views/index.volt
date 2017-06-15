<style type="text/css">
.trumbowyg-box.trumbowyg-editor-visible {
  min-height: 150px;
}

.trumbowyg-editor {
  min-height: 150px;
}
</style>
<div class="col-md-12 col-sm-12">
    <div class="box">
        <header class="bg-alizarin text-white">
            <h4>Manage Student</h4>
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
        <table id="grid-student" class="table table-condensed table-hover table-striped">
            <thead>
            <tr>
                <th data-column-id="no" data-type="numeric" data-width="5%" data-sortable="false">no</th>
                <th data-column-id="user_name" data-sortable="false">Name</th>
				<th data-column-id="nis" data-sortable="false">Nis</th>
				<th data-column-id="nisn" data-sortable="false">Nisn</th>
				<th data-column-id="religion" data-sortable="false">Religion</th>
				<th data-column-id="birthplace" data-sortable="false">Birthplace</th>
				<th data-column-id="birthday" data-sortable="false">Birthday</th>
				<th data-column-id="phone" data-sortable="false">Phone</th>
                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
            </tr>
            </thead>
        </table>
        </div>
    </div>
</div>

<div id="mystudent" class="modal fade modal-wide" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Student</h4>
            </div>
            <div class="modal-body">
                <form id="myForm" method="post" enctype="multipart/form-data">
                <div class="row">
	                <div class="col-md-6">
	                    <div class="form-group" >
						<label>Name</label>
						<input type="hidden" class="form-control" name="user_id" id="user_id" >
						<input type="text" class="form-control" name="user_name" id="user_name" >
						</div>
						<div class="form-group" >
						<label>Nis</label>
						<input type="text" class="form-control" name="nis" id="nis" >
						</div>
						<div class="form-group" >
						<label>Nisn</label>
						<input type="text" class="form-control" name="nisn" id="nisn" >
						</div>
						<div class="form-group" >
						<label>Religion</label>
						<select class="form-control" name="religion" id="religion" ></select>
						</div>
						<div class="form-group" >
						<label>Phone</label>
						<input type="text" class="form-control" name="phone" id="phone" >
						</div>
						
	                </div>
	                <div class="col-md-6">
						<div class="form-group" >
						<label>Birthplace</label>
						<input type="text" class="form-control" name="birthplace" id="birthplace" >
						</div>
						<div class="form-group" >
						<label>Birthday</label>
						<input type="text" class="form-control" name="birthday" id="birthday" >
						</div>
						<div class="form-group" >
						<label>Parrent</label>
						<input type="text" class="form-control" name="parrent" id="parrent" >
						</div>
						<div class="form-group" >
						<label>Guardian</label>
						<input type="text" class="form-control" name="guardian" id="guardian" >
						</div>
						<div class="form-group" >
						<label>Parrent_phone</label>
						<input type="text" class="form-control" name="parrent_phone" id="parrent_phone" >
						</div>
	                </div>
                </div>
                    
					
					<div class="form-group" >
					<label>Address</label>
					<textarea class="form-control" name="address" id="address" >
					</textarea>
					</div>
					
					<!-- <div class="form-group" >
					<label>Picture</label>
					<input type="text" class="form-control" name="picture" id="picture" >
					</div>
					<div class="form-group" >
					<label>Cover</label>
					<input type="text" class="form-control" name="cover" id="cover" >
					</div> -->

					<div class="form-group" >
					<label>Bio</label>
					<textarea type="text" class="form-control" name="bio" id="bio"></textarea>
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