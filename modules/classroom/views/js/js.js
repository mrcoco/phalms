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
                //$('#school_id').val(data.school_id);
            	//$('#subject_id').val(data.subject_id);
            	//$('#major_id').val(data.major_id);
            	//$('#teacher_id').val(data.teacher_id);
            	//$('#grade').val();
            	$('#description').val(data.description);
                schoolBox(data.school_id);
                subjectBox(data.subject_id);
                majorBox(data.major_id);
                teacherBox(data.teacher_id);
	            gradeBox(data.grade);
            });
        }else{
            $('#myclassroom .modal-title').html('Create New classroom ');
            schoolBox();
            subjectBox();
            majorBox();
            teacherBox();
            gradeBox();
        }

        $('#myclassroom').modal('show');

    }

    function schoolBox(e) {
        $.get( "school/data", function( data ) {
            selectBox("#school_id",data,e);
        }, "json" );
    }

    function subjectBox(e){
        $.get( "subject/data", function( data ) {
            selectBox("#subject_id",data,e);
        }, "json" );
    }

    function majorBox(e){
        $.get( "majors/data", function( data ) {
            selectBox("#major_id",data,e);
        }, "json" );
    }

    function teacherBox(e){
        $.get( "classroom/teacher", function( data ) {
            selectBox("#teacher_id",data,e);
        }, "json" );
    }

    function gradeBox(e) {
        $.get( "grade/data", function( data ) {
            selectBox("#grade",data,e);
        }, "json" );
    }

    function selectBox(selector,datasource,selectedOption)
    {
        var select = $(selector);
        if(select.prop) {
          var options = select.prop('options');
        }
        else {
          var options = select.attr('options');
        }
        $('option', select).remove();
        datasource.unshift(
            {id: "0", name: " -Pilih-"}
        );
        $.each(datasource, function(val, text) {
            options[options.length] = new Option(text.name, text.id);
        });
        if(selectedOption){
            select.val(selectedOption);
        }
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