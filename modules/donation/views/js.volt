<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd'
        });
        $('#requirement').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
        var grid = $("#grid-selection").bootgrid({
            ajax: true,
            url: "{{ url("donation/list") }}",
            selection: true,
            multiSelect: true,
            formatters: {
                "approved": function(column, row)
                {
                    if(row.approve == 1){
                        return "Yes";
                    }else{
                        return "No";
                    }
                },
                "confirmation": function(column, row)
                {
                    if(row.confirmation == 1){
                        return "Yes";
                    }else{
                        return "No";
                    }
                },
                "commands": function(column, row)
                {
                    return "<button type=\"button\" class=\"btn btn-sm btn-primary command-edit\" data-row-name=\""+row.name+"\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " +
                        "<button type=\"button\" class=\"btn btn-sm btn-primary command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-trash-o\"></span></button>";
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function()
        {
            $(this).find(".command-edit").off();
            $(this).find(".command-delete").off();
            $(this).find(".command-add").off();

            $(this).find(".command-edit").on("click", function(e)
            {
                $('#myModal .modal-title').html('Edit Donation '+$(this).data("row-name"));
                $('#hidden_id').val($(this).data("row-id"));
                $.getJSON("{{ url('donation/get/?id=') }}" + $(this).data("row-id"), function (data) {
                    //$('#summernote').text("");
                    $('#hidden_id').val(data.id);
                    $('#name').html(": "+data.name);
                    $('#email').html(": "+data.email);
                    $('#phone').html(": "+data.phone);
                    $('#bank_name').html(": "+data.bank_name);
                    $('#bank_account').html(": "+data.bank_account);
                    $('#donation').html(": "+data.donation);
                    $('#program').html(": "+data.program);
                    $('#confirmation').html(": "+data.confirmation);
                });
                $('#myModal').modal('show');
                $("#myForm").ajaxForm({
                    url: '{{ url("donation/edit") }}',
                    type: 'post',
                    success: function(data) {
                        myAlert(data);
                        $("#grid-selection").bootgrid("reload");
                        setTimeout(function(){
                            $('#myModal').modal('hide')
                        }, 5000);
                        return false;
                    }
                });

            }).end().find(".command-delete").on("click", function(e)
            {
                $.get( "{{ url('donation/delete/') }}"+ $(this).data("row-id"), function( data ) {
                    myAlert(data);
                    $("#grid-selection").bootgrid("reload");
                    notification();
                });

            });
        });

        $(".actionBar").append(" <div class='btn btn-primary' id='export'><span class=\"fa fa-plus-square-o\"></span> Export</div>");

        $("#export").on('click', function (e) {
            $.ajax({
                url: '{{ url("donation/download") }}',
                type: 'GET',
                success: function() {
                    window.location = '{{ url("donation/download") }}';
                }
            });
        });

        function myAlert(e)
        {
            //var obj = jQuery.parseJSON(e);
            var mesg= [];
            mesg["alert"] = e.alert;
            mesg["title"] = e.msg;
            mesg["msg"] = "#program "+e._id+" "+e.msg;
            notif_show(mesg);
        }

    });
</script>