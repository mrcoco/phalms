$(document).ready(function(){
    var url_path = "http://phalms.dev/classroom/";
    var classroom_grid = $("#grid-classroom").bootgrid({
        ajax: true,
        url: url_path+"list",
        selection: true,
        multiSelect: true,
        templates: {
            header:"<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><div class=\"row\"><div class=\"col-sm-6 actionBar\"><div class=\"{{css.search}}\"></div></div><div class=\"col-sm-6\"><div class=\"{{css.actions}}\"></div> <div class='btn btn-primary' id='create' class='command-add'> <span class=\"fa fa-plus-square-o\"></span> New Classroom</div></div></div></div>",
        },
        formatters: {
            "file" : function (column, row) {
                return "<img src='"+row.file+"' height='75px'>";
            },
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
                return "<button type=\"button\" class=\"btn btn-sm btn-primary command-edit\" data-row-title=\""+row.title+"\" data-row-category=\""+row.category+"\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " +
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
                url: url_path+'edit',
                type: 'post',
                success: function(data) {
                    myAlert(data);
                    $("#grid-classroom").bootgrid("reload");
                    setTimeout(function(){
                        $('#myModal').modal('hide')
                    }, 10000);
                }
            });

        }).end().find(".command-delete").on("click", function(e)
        {
            $.get( url_path+"delete/"+ $(this).data("row-id"), function( data ) {
                //myAlert(data);
                toastr.success(data.msg, data.title);
                toastr.options.timeOut = 15;
                toastr.options.extendedTimeOut = 30;
                $("#grid-classroom").bootgrid("reload");
            });

        });

        $("#create").on("click",function(e)
        {
            myForm('create',e);
            $("#myForm").ajaxForm({
                url: url_path+'create',
                type: 'post',
                success: function(data) {
                    myAlert(data);
                    classroom_grid.bootgrid("reload");
                    setTimeout(function(){
                        $('#myclassroom').modal('hide');
                    }, 10000);
                }
            });
        });
    });


    function myForm(status,e) {
        $('#myForm')[0].reset();
        if(status == 'edit') {

            $('#myclassroom .modal-title').html('Edit classroom '+e.data("row-id"));
            $.getJSON(url_path+"get/?id=" + e.data("row-id"), function (data) {
                $('#hidden_id').val(data.id);
                $('#school_id').val(data.school_id);
            	$('#subject_id').val(data.subject_id);
            	$('#major_id').val(data.major_id);
            	$('#teacher_id').val(data.teacher_id);
            	$('#grade').val(data.grade);
            	$('#description').val(data.description);
	
            });
        }else{
            $('#myclassroom .modal-title').html('Create New classroom ');
            
        }

        $('#myclassroom').modal('show');

    }

    function subjectBox(status,e) {
        $('#school_id option').each(function(){
            if ($('#school_id option[value="'+$(this).val()+'"]').length) $(this).remove();
        });

        $.get( "school/data", function( data ) {
            $("#school_id").append( "<option value='0'>-- School --</option>");
            $.each(data, function (index, element) {
                $("#school_id").append( "<option value='"+element.id+"'>"+element.name+"</option>");
            });
            if(status == 'edit'){
                $("#school_id").val(e.data("row-category"));
            }
        }, "json" );
    }

    function myAlert(e)
    {
        var mesg= [];
        mesg["alert"] = e.alert;
        mesg["title"] = e.msg;
        mesg["msg"] = "#classroom "+e._id+" "+e.msg;
        notif_show(mesg);
    }

});