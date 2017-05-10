<div class="col-md-12 col-sm-12">
    <div class="box">
        <header class="bg-alizarin text-white">
            <h4>Manage Testing</h4>
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
        <table id="grid-testing" class="table table-condensed table-hover table-striped">
            <thead>
            <tr>
                <th data-column-id="no" data-type="numeric" data-width="5%" data-sortable="false">no</th>
                <th data-column-id="nama" data-sortable="false">Nama</th>
	<th data-column-id="kelas" data-sortable="false">Kelas</th>
	
                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
            </tr>
            </thead>
        </table>
        </div>
    </div>
</div>

<div id="mytesting" class="modal fade modal-wide" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Testing</h4>
            </div>
            <div class="modal-body">
                <form id="myForm" method="post" enctype="multipart/form-data">
                    <div class="form-group" >
	<label>Nama</label>
	<input type="text" class="form-control" name="nama" id="nama" >
	</div>
	<div class="form-group" >
	<label>Kelas</label>
	<input type="text" class="form-control" name="kelas" id="kelas" >
	</div>
	
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>