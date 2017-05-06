<script>
    $(document).ready(function(){
        $('textarea').trumbowyg();
        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd'
        });
        $('#requirement').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
        var grid = $("#grid-program").bootgrid({
            ajax: true,
            url: "{{ url("program/list") }}",
            selection: true,
            multiSelect: true,
            formatters: {
                "published": function(column, row)
                {
                    if(row.publish == 1){
                        return "Yes";
                    }else{
                        return "No";
                    }
                },
                "commands": function(column, row)
                {
                    return "<button type=\"button\" class=\"btn btn-sm btn-primary command-edit\" data-row-location=\""+row.location+"\" data-row-title=\""+row.title+"\" data-row-category=\""+row.category+"\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " +
                            "<button type=\"button\" class=\"btn btn-sm btn-primary command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-trash-o\"></span></button>";
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function()
        {
            $(this).find(".command-edit").off();
            $(this).find(".command-delete").off();
            $(this).find(".command-add").off();
            $(this).find("tr.info").removeClass("info");
            $(this).find(".command-edit").on("click", function(e)
            {
                myForm('edit',$(this));
                $("#myForm").ajaxForm({
                    url: '{{ url("program/edit") }}',
                    type: 'post',
                    success: function(data) {
                        myAlert(data);
                        $("#grid-program").bootgrid("reload");
                        setTimeout(function(){
                            $('#myModal').modal('hide')
                        }, 5000);
                        return false;
                    }
                });

            }).end().find(".command-delete").on("click", function(e)
            {
                $.get( "{{ url('program/delete/') }}"+ $(this).data("row-id"), function( data ) {
                    myAlert(data);
                    $("#grid-program").bootgrid("reload");
                });

            });
        });

        $(".actionBar").append(" <div class='btn btn-primary' id='create' class='command-add'><span class=\"fa fa-plus-square-o\"></span> New program</div> <div class='btn btn-primary' id='export'><span class=\"fa fa-plus-square-o\"></span> Export</div>");

        $("#export").on('click', function (e) {
            $.ajax({
                url: '{{ url("program/download") }}',
                type: 'GET',
                success: function() {
                    window.location = '{{ url("program/download") }}';
                    //var mesg = { alert : "sukses" , title : "Download Program", _id : "cr1", msg: "Download Program sukses"};
                    //myAlert(mesg);
                }
            });
        });
        $("#create").on('click',function (e) {
            myForm('create',e);
            //$("#save").on('click',function(e){
                var cat_val = $("#category").val();
                $("#myForm").ajaxForm({
                    url: '{{ url("program/create") }}',
                    type: 'post',
                    beforeSubmit:  function(data) {
                        if(cat_val == 0){
                            var mesg = { alert : "error" , title : "Error no Category", _id : "cr1", msg: "no category Selected"};
                            myAlert(mesg);
                            $("#category").css("border-color","rgb(185, 74, 72)");
                            $("#lab_cat").append(" <span style='color: rgb(185, 74, 72);'>This is a required field</span>");
                            return false;
                        }
                    },
                    success: function(data) {
                        myAlert(data);
                        grid.bootgrid("reload");
                        setTimeout(function(){
                            $('#myModal').modal('hide');
                        }, 5000);
                        return false;
                    }
                });
            //});
        });

        function myForm(status,e) {
            $('#myForm')[0].reset();
            if(status == 'edit') {
                $('#myModal .modal-title').html('Edit program '+e.data("row-title"));
                $.getJSON("{{ url('program/get/?id=') }}" + e.data("row-id"), function (data) {
                    //$('#summernote').text("");
                    $('#hidden_id').val(data.id);
                    $('#title').val(data.title);
                    $('#published').val(data.status);
                    $('#start').val(data.start_date);
                    $('#end').val(data.end_date);
                    $('#benefit').val(data.benefit);
                    $('#requirement').val(data.requirement);
                    $('#summernote').trumbowyg('html',data.content);
                });
                selectBox('edit', e);
            }else{
                $('#myModal .modal-title').html('Create New program ');
                selectBox('create',e);
                $('#summernote').trumbowyg('html',"");
            }
            $('#myModal').modal('show');
        }

        function selectBox(status,e) {
            $('#category option').each(function(){
                if ($('#category option[value="'+$(this).val()+'"]').length) $(this).remove();
            });

            $('#location option').each(function(){
                if ($('#location option[value="'+$(this).val()+'"]').length) $(this).remove();
            });

            $.get( "{{ url('program/location') }}", function( data ) {
                $("#location").append( "<option value='0'>-- Location --</option>");
                $.each(data, function (index, element) {
                    $("#location").append( "<option value='"+element.id+"'>"+element.name+"</option>");
                });
                if(status == 'edit'){
                    $("#location").val(e.data("row-location"));
                }
            }, "json" );

            $.get( "{{ url('program/categories') }}", function( data ) {
                $("#category").append( "<option value='0'>-- Category --</option>");
                $.each(data, function (index, element) {
                    $("#category").append( "<option value='"+element.id+"'>"+element.name+"</option>");
                });
                if(status == 'edit'){
                    $("#category").val(e.data("row-category"));
                }
            }, "json" );
        }

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