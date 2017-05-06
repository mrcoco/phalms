<style>
    #myModal .modal-dialog  {width:35%;}
    .table-user-information > tbody > tr {
        border-top: 1px solid rgb(221, 221, 221);
    }

    .table-user-information > tbody > tr:first-child {
        border-top: 0;
    }


    .table-user-information > tbody > tr > td {
        border-top: 0;
    }
</style>
<div>{{content()}}</div>
<div class="grid_3 grid_5">
<table id="grid-selection" class="table table-condensed table-hover table-striped">
    <thead>
    <tr>
        <th data-column-id="no" data-type="numeric" data-width="5%" data-sortable="false">no</th>
        <th data-column-id="name" data-sortable="false">Title</th>
        <th data-column-id="email" data-sortable="false">email</th>
        <th data-column-id="bank_name" data-sortable="false">Bank</th>
        <th data-column-id="bank_account" data-sortable="false">Bank Account</th>
        <th data-column-id="donation" data-sortable="false">donation</th>
        <th data-column-id="program" data-sortable="false">Program</th>
        <th data-column-id="confirmation" data-formatter="confirmation" data-sortable="false">confirmation</th>
        <th data-column-id="approve" data-formatter="approved" data-sortable="false">Approved</th>
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
                <table class="table table-user-information">
                    <tbody>
                    <tr>
                        <td>Name</td>
                        <td  id="name"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td id="email"></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td id="phone"></td>
                    </tr>
                    <tr>
                        <td>Bank</td>
                        <td id="bank_name"></td>
                    </tr>
                    <tr>
                        <td>Bank Account</td>
                        <td id="bank_account"></td>
                    </tr>
                    <tr>
                        <td>Donation</td>
                        <td id="donation"></td>
                    </tr>
                    <tr>
                        <td>program</td>
                        <td id="program"></td>
                    </tr>
                    <tr>
                        <td>confirmation</td>
                        <td id="confirmation"></td>
                    </tr>
                    </tbody>
                </table>
                <form id="myForm" method="post" enctype="multipart/form-data">
                    <div class="form-group" >
                        <label>Approved </label>
                        <input class="form-control" name="hidden_id" id="hidden_id" type="hidden" >
                        <select name="approved" id="approved" class="form-control">
                            <option>--Approved (Yes/No)--</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </div>

                    <div class="form-group" >
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>  close</button>
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