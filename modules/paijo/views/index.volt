<div class="col-md-12 col-sm-12">
    <div class="box">
        <header class="bg-alizarin text-white">
            <h4>Manage Paijo</h4>
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
        <table id="grid-paijo" class="table table-condensed table-hover table-striped">
            <thead>
            <tr>
                <th data-column-id="no" data-type="numeric" data-width="5%" data-sortable="false">no</th>
                <th data-column-id="nama" data-sortable="false">Nama</th>
	<th data-column-id="kelas" data-sortable="false">Kelas</th>
	<th data-column-id="jabaya" data-sortable="false">Jabaya</th>
	
                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
            </tr>
            </thead>
        </table>
        </div>
    </div>
</div>

<div id="mypaijo" class="modal fade modal-wide" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Paijo</h4>
            </div>
            <div class="modal-body">
                <form id="myForm" method="post" enctype="multipart/form-data">
                    <div class="form-group" >\n\t<label>Nama</label>\n\t<input type="text" class="form-control" name="nama" id="nama" >\n\t</div>\n\t<div class="form-group" >\n\t<label>Kelas</label>\n\t<input type="text" class="form-control" name="kelas" id="kelas" >\n\t</div>\n\t<div class="form-group" >\n\t<label>Jabaya</label>\n\t<input type="text" class="form-control" name="jabaya" id="jabaya" >\n\t</div>\n\t
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>