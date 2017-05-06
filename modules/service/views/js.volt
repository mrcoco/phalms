<script type="text/javascript">
    $(document).ready(function(){
        $('textarea').trumbowyg();
        var grid = $("#grid-selection").bootgrid({
            ajax: true,
            url: "{{ url("service/list") }}",
            selection: true,
            multiSelect: true,
            formatters: {
                "published": function(column, row)
                {
                    if(row.status == 1){
                        return "Yes";
                    }else{
                        return "No";
                    }
                },
                "commands": function(column, row)
                {
                    return "<button type=\"button\" class=\"btn btn-sm btn-primary command-edit\"  data-row-title=\""+row.title+"\"  data-row-page=\""+row.pageId+"\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " +
                            "<button type=\"button\" class=\"btn btn-sm btn-primary command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-trash-o\"></span></button>";
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function()
        {
            $(this).find(".command-edit").off();
            $(this).find(".command-delete").off();
            /* Executes after data is loaded and rendered */
            $(this).find(".command-edit").on("click", function(e)
            {
                myForm('edit',$(this));
                $("#myForm").ajaxForm({
                    url: '{{ url("service/edit") }}',
                    type: 'post',
                    success: function(data) {
                        myAlert(data);
                        $("#grid-selection").bootgrid("reload");
                        setTimeout(function(){
                            $('#myModal').modal('hide')
                        }, 10000);
                    }
                });

            }).end().find(".command-delete").on("click", function(e)
            {
                $.get( "{{ url('service/delete/') }}"+ $(this).data("row-id"), function( data ) {
                    myAlert(data);
                    $("#grid-selection").bootgrid("reload");
                });
            });
        });

        $(".actionBar").append(" <div class='btn btn-primary' id='create' class='command-add'><span class=\"fa fa-plus-square-o\"></span> New Service</div>");

        $("#create").on('click',function (e) {
            myForm('create',e);
            //$("#save").on('click',function(e){
                var cat_val = $("#page").val();
                $("#myForm").ajaxForm({
                    url: '{{ url("service/create") }}',
                    type: 'post',
                    beforeSubmit:  function(data) {
                        if(cat_val == 0){
                            var mesg = { alert : "error" , title : "Error no Page", _id : "cr1", msg: "no page Selected"};
                            myAlert(mesg);
                            $("#page").css("border-color","rgb(185, 74, 72)");
                            $("#lab_cat").append(" <span style='color: rgb(185, 74, 72);'>This is a required field</span>");
                            return false;
                        }
                    },
                    success: function(data) {
                        myAlert(data);
                        grid.bootgrid("reload");
                        setTimeout(function(){
                            $('#myModal').modal('hide');
                        }, 10000);
                    }
                });
            //});
        });

        function myForm(status,e) {
            $('#myForm')[0].reset();
            if(status == 'edit') {
                $('#myModal .modal-title').html('Edit Service '+e.data("row-title"));
                $.getJSON("{{ url('service/get/?id=') }}" + e.data("row-id"), function (data) {
                    //$('#summernote').text("");
                    $('#hidden_id').val(data.id);
                    $('#title').val(data.title);
                    $('#published').val(data.status);
                    $('#summernote').trumbowyg('html',data.content);
                });
                selectBox('edit', e);
            }else{
                $('#myModal .modal-title').html('Create New Service ');
                selectBox('create',e);
                $('#summernote').trumbowyg('html',"");
            }
            $('#myModal').modal('show');
        }

        function selectBox(status,e) {
            $('#page option').each(function(){
                if ($('#page option[value="'+$(this).val()+'"]').length) $(this).remove();
            });

            $.get( "{{ url('service/page') }}", function( data ) {
                $("#page").append( "<option value='0'>-- Page --</option>");
                $.each(data, function (index, element) {
                    $("#page").append( "<option value='"+element.id+"'>"+element.title+"</option>");
                });
                if(status == 'edit'){
                    $("#page").val(e.data("row-page"));
                }
            }, "json" );
        }

        function myAlert(e)
        {
            var mesg= [];
            mesg["alert"] = e.alert;
            mesg["title"] = e.msg;
            mesg["msg"] = "#page "+e._id+" "+e.msg;
            notif_show(mesg);
        }
    });
</script>