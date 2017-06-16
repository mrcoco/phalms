$(document).ready(function(){
    var url_path = "http://phalms.dev/course/";
    var course_grid = $("#grid-course").bootgrid({
        ajax: true,
        url: url_path+"list",
        selection: true,
        multiSelect: true,
        templates: {
            header:"<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><div class=\"row\"><div class=\"col-sm-6 actionBar\"><div class=\"{{css.search}}\"></div></div><div class=\"col-sm-6\"><div class=\"{{css.actions}}\"></div> <div class='btn btn-primary' id='create' class='command-add'> <span class=\"fa fa-plus-square-o\"></span> New Course</div></div></div></div>",
        },
        formatters: {
            "picture" : function (column, row) {
                return "<img src='"+row.picture+"' height='75px'>";
            },
            "level": function(column, row)
            {
                switch(row.level){
                    case "1": 
                    return result = "Easy";
                    break;
                    case "2": 
                    return result = "Medium";
                    break;
                    case "3":
                    return result = "Hard";
                    break;
                }
            },
            "commands": function(column, row)
            {
                return "<button type=\"button\" class=\"btn btn-sm btn-primary command-edit\" data-row-title=\""+row.title+"\" data-row-category=\""+row.category+"\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " +
                        "<button type=\"button\" class=\"btn btn-sm btn-primary command-module\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-file-pdf-o\"></span></button> "+
                        "<button type=\"button\" class=\"btn btn-sm btn-primary command-share\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-paper-plane\"></span></button> "+
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
                    $("#grid-course").bootgrid("reload");
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
                $("#grid-course").bootgrid("reload");
            });

        });

        $(this).find(".command-module").on("click", function(e)
        {
            $('#myModules').modal('show');
            grid_modules("http://phalms.dev/course/modules",$(this).data("row-id"));
        }).end().find(".command-share").on("click", function(e)
        {
            $('#mySend').modal('show');
            grid_classroom("http://phalms.dev/course/classroom",$(this).data("row-id"));
        });

        $("#create").on("click",function(e)
        {
            myForm('create',e);
            $("#myForm").ajaxForm({
                url: url_path+'create',
                type: 'post',
                success: function(data) {
                    myAlert(data);
                    course_grid.bootgrid("reload");
                    setTimeout(function(){
                        $('#mycourse').modal('hide');
                    }, 10000);
                }
            });
        });
    });

    function grid_modules(url,id) 
    {
        var course_modules = $("#grid-modules").bootgrid({
            ajax: true,
            url: url+"/list/"+id,
            selection: true,
            multiSelect: true,
            templates: {
                header:"<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><div class=\"row\"> <form id=\"form-student\"><div class=\"col-sm-6\"><input id=\"search-student\" >  </div> <div class=\"col-sm-6\"><div class=\"awesomplete\"><input id=\"classroom_id\" type=\"hidden\" value=\""+id+"\"><div class='btn btn-sm btn-primary' id='add-student' class='command-add'> <span class=\"fa fa-plus-square-o\"></span> Add Class</div></div></div> </form></div></div>",
            },
            formatters: {
                "commands": function(column, row)
                {
                    return "<button type=\"button\" class=\"btn btn-sm btn-primary command-edit\" data-row-title=\""+row.title+"\" data-row-category=\""+row.category+"\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " +
                            "<button type=\"button\" class=\"btn btn-sm btn-primary command-module\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-file-pdf-o\"></span></button> "+
                            "<button type=\"button\" class=\"btn btn-sm btn-primary command-share\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-paper-plane\"></span></button> "+
                            "<button type=\"button\" class=\"btn btn-sm btn-primary command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-trash-o\"></span></button>";
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function()
            {
                $(this).find(".command-edit").off();
                $(this).find(".command-delete").off();
                $(this).find(".command-add").off();

            });
    }

    function grid_classroom(url,id)
    {
        var classroom = $("#grid-classroom").bootgrid({
            ajax: true,
            url: url+"/list/"+id,
            selection: true,
            multiSelect: true,
            templates: {
                header:"<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><div class=\"row\"> <form id=\"form-classroom\"><div class=\"col-sm-6\"><input id=\"search-classroom\" >  </div> <div class=\"col-sm-6\"><div class=\"awesomplete\"><input id=\"classroom_id\" type=\"hidden\" value=\""+id+"\"><div class='btn btn-sm btn-primary' id='add-student' class='command-add'> <span class=\"fa fa-plus-square-o\"></span> Add Class Room</div></div></div> </form></div></div>",
            },
            formatters: {
                "commands": function(column, row)
                {
                    return "<button type=\"button\" class=\"btn btn-sm btn-primary command-edit\" data-row-title=\""+row.title+"\" data-row-category=\""+row.category+"\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " +
                            "<button type=\"button\" class=\"btn btn-sm btn-primary command-module\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-file-pdf-o\"></span></button> "+
                            "<button type=\"button\" class=\"btn btn-sm btn-primary command-share\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-paper-plane\"></span></button> "+
                            "<button type=\"button\" class=\"btn btn-sm btn-primary command-delete\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-trash-o\"></span></button>";
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function()
            {
                $(this).find(".command-edit").off();
                $(this).find(".command-delete").off();
                $(this).find(".command-add").off();

                $.get( url+"/all", function( data ) {
                    var input = document.getElementById("search-classroom");
                    new Awesomplete(input, {
                        list: data
                    });
                });

            });
    }

    function myForm(status,e) {
        $('#myForm')[0].reset();
        if(status == 'edit') {

            $('#mycourse .modal-title').html('Edit course '+e.data("row-id"));
            $.getJSON(url_path+"get/?id=" + e.data("row-id"), function (data) {
                $('#hidden_id').val(data.id);
                //$('#teacher_id').val(data.teacher_id);
            	$('#name').val(data.name);
            	$('#description').val(data.description);
            	$('#picture').val(data.picture);
            	$('#level').val(data.level);
	            teacherBox(data.teacher_id);
            });
        }else{
            $('#mycourse .modal-title').html('Create New course ');
            teacherBox("");
        }

        $('#mycourse').modal('show');

    }

    function teacherBox(e){
        $.get( "classroom/teacher", function( data ) {
            selectBox("#teacher_id",data,e);
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
        mesg["msg"] = "#course "+e._id+" "+e.msg;
        notif_show(mesg);
    }

});