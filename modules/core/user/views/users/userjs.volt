<script>
    $(document).ready(function(){
        $('textarea').trumbowyg();
        var grid = $("#grid-selection").bootgrid({
            ajax: true,
            url: "{{ url("users/list") }}",
            selection: true,
            multiSelect: true,
            formatters: {
                "active": function(column, row)
                {
                    if(row.active == "Y"){
                        return "Yes";
                    }else{
                        return "No";
                    }
                },
                "banned": function(column, row)
                {
                    if(row.banned == "Y"){
                        return "Yes";
                    }else{
                        return "No";
                    }
                },
                "suspended": function(column, row)
                {
                    if(row.suspended == "Y"){
                        return "Yes";
                    }else{
                        return "No";
                    }
                },
                "commands": function(column, row)
                {
                    return "<button type=\"button\" class=\"btn btn-sm btn-primary command-edit\" data-row-profile=\""+row.profilesId+"\" data-row-name=\""+row.name+"\" data-row-email=\""+row.email+"\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " +
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
            
                myForm('edit',$(this));
                $("#myForm").ajaxForm({
                    url: '{{ url("users/edit") }}',
                    type: 'post',
                    success: function(data) {
                        myAlert(data);
                        $("#grid-selection").bootgrid("reload");
                        setTimeout(function(){
                            $('#myModal').modal('hide')
                        }, 10000);
                        return false;
                    }
                });

            }).end().find(".command-delete").on("click", function(e)
            {
                $.get( "{{ url('users/delete/') }}"+ $(this).data("row-id"), function( data ) {
                    myAlert(data);
                    $("#grid-selection").bootgrid("reload");
                });

            });
        });

        $(".actionBar").append(" <div class='btn btn-primary' id='create' class='command-add'><span class=\"fa fa-plus-square-o\"></span> New Page</div>");

        $("#create").on('click',function (e) {
            myForm('create',e);
            //$("#save").on('click',function(e){
                var cat_val  = $("#profile").val();
                var id_pass  = $("#password").val();
                var con_pass = $("#confirmpassword").val();
                $("#myForm").ajaxForm({
                    url: '{{ url("users/create") }}',
                    type: 'post',
                    beforeSubmit:  function(data) {
                        if(cat_val == 0){
                            var mesg = { alert : "error" , title : "Error no Profile", _id : "cr1", msg: "no profile Selected"};
                            myAlert(mesg);
                            $("#profile").css("border-color","rgb(185, 74, 72)");
                            $("#lab_cat").append(" <span style='color: rgb(185, 74, 72);'>This is a required field</span>");
                            return false;
                        }
                        if(id_pass !== con_pass)
                        {
                            $("#password").css("border-color","rgb(185, 74, 72)");
                            $("#confirmpassword").css("border-color","rgb(185, 74, 72)");
                            return false;
                        }
                    },
                    success: function(data) {
                        myAlert(data);
                        grid.bootgrid("reload");
                        setTimeout(function(){
                            $('#myModal').modal('hide');
                        }, 10000);
                        return false;
                    }
                });
            //});
        });

        function myForm(status,e) {
            $('#myForm')[0].reset();
            if(status == 'edit') {
                $('#myModal .modal-title').html('Edit User '+e.data("row-name"));
                $.getJSON("{{ url('users/get/?id=') }}" + e.data("row-id"), function (data) {
                    //$('#summernote').text("");
                    $('#hidden_id').val(data.id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#banned').val(data.banned);
                    $('#suspended').val(data.suspended);
                    $('#active').val(data.active);
                    $('#summernote').trumbowyg('html',data.content);
                });
                selectBox('edit', e);
            }else{
                $('#myModal .modal-title').html('Create New User ');
                selectBox('create',e);
                $('#summernote').trumbowyg('html',"");
            }

            $('#myModal').modal('show');

        }

        function selectBox(status,e) {
            $('#profile option').each(function(){
                if ($('#profile option[value="'+$(this).val()+'"]').length) $(this).remove();
            });

            $.get( "{{ url('profiles/list') }}", function( data ) {
                $("#profile").append( "<option value='0'>-- Profile --</option>");
                $.each(data, function (index, element) {
                    $("#profile").append( "<option value='"+element.id+"'>"+element.name+"</option>");
                });
                if(status == 'edit'){
                    $("#profile").val(e.data("row-profile"));
                }
            }, "json" );
        }

        function myAlert(e)
        {
            //var obj = jQuery.parseJSON(e);
            var mesg= [];
            mesg["alert"] = e.alert;
            mesg["title"] = e.msg;
            mesg["msg"] = "#user "+e._id+" "+e.msg;
            notif_show(mesg);
        }

    });
</script>