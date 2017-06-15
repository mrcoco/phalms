$(document).ready(function(){
    $('textarea').trumbowyg();
    var url_path = "http://phalms.dev/student/";
    var student_grid = $("#grid-student").bootgrid({
        ajax: true,
        url: url_path+"list",
        selection: true,
        multiSelect: true,
        templates: {
            header:"<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><div class=\"row\"><div class=\"col-sm-6 actionBar\"><div class=\"{{css.search}}\"></div></div><div class=\"col-sm-6\"><div class=\"{{css.actions}}\"></div> </div></div></div>",
        },
        formatters: {
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
                    $("#grid-student").bootgrid("reload");
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
                $("#grid-student").bootgrid("reload");
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
                    student_grid.bootgrid("reload");
                    setTimeout(function(){
                        $('#mystudent').modal('hide');
                    }, 10000);
                }
            });
        });
    });


    function myForm(status,e) {
        $('#myForm')[0].reset();
        if(status == 'edit') {
            $.getJSON(url_path+"get/?id=" + e.data("row-id"), function (data) {
                $('#mystudent .modal-title').html('Edit student '+data.user_name);
                $('#user_name').val(data.user_name);
                $('#user_id').val(data.user_id);
            	$('#nis').val(data.nis);
            	$('#nisn').val(data.nisn);
            	//$('#religion').val(data.religion);
            	$('#birthplace').val(data.birthplace);
            	$('#birthday').val(data.birthday);
            	$('#phone').val(data.phone);
            	//$('#address').val(data.address);
            	$('#parrent').val(data.parrent);
            	$('#guardian').val(data.guardian);
            	$('#parrent_phone').val(data.parrent_phone);
            	$('#picture').val(data.picture);
            	$('#cover').val(data.cover);
            	//$('#bio').val(data.bio);
                religion(data.religion);
                $('#address').trumbowyg('html',data.address);
                $('#bio').trumbowyg('html',data.bio);
            });
        }else{
            $('#mystudent .modal-title').html('Create New student ');
            religion("");
            $('#address').trumbowyg('html',"");
            $('#bio').trumbowyg('html',"");
        }
        $('#mystudent').modal('show');

    }

    function religion(e) {
        $.get( "religion/data", function( data ) {
            selectBox("#religion",data,e);
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
        mesg["msg"] = "#student "+e._id+" "+e.msg;
        notif_show(mesg);
    }

});