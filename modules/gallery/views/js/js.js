$(document).ready(function(){
    $('textarea').trumbowyg();
    var elm = $(".actionBar").closest(".container");

    var gallery = $("#grid-gallery").bootgrid({
        ajax: true,
        url: "gallery/list",
        selection: true,
        multiSelect: true,
        templates: {
            header:"<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><div class=\"row\"><div class=\"col-sm-6 actionBar\"><div class=\"{{css.search}}\"></div></div><div class=\"col-sm-6\"><div class=\"{{css.actions}}\"></div> <div class='btn btn-primary' id='create_gallery' class='command-add'><span class=\"fa fa-user\"></span> New Gallery</div></div></div></div>",
        },
        formatters: {
            "file_name": function(column, row)
            {
                return "<img src='"+row.file_name+"' height='75px'>";
            },
            "commands": function(column, row)
            {
                return "<button type=\"button\" class=\"btn btn-sm btn-primary command-edit\" data-row-title=\""+row.title+"\" data-row-gallery=\""+row.gallery_id+"\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " +
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
            myGallery('edit',$(this));
            $("#manage-gallery").ajaxForm({
                url: 'gallery/edit',
                type: 'post',
                success: function(data) {
                    myAlert(data);
                    $("#grid-gallery").bootgrid("reload");
                    setTimeout(function(){
                        $('#myFormGallery').modal('hide')
                    }, 10000);
                }
            });

        }).end().find(".command-delete").on("click", function(e)
        {
            $.get( "gallery/delete/"+ $(this).data("row-id"), function( data ) {
                myAlert(data);
                $("#grid-gallery").bootgrid("reload");
            });

        });
    });

    var grid = $("#grid-selection").bootgrid({
        ajax: true,
        url: "image/list",
        selection: true,
        multiSelect: true,
        templates: {
            header:"<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><div class=\"row\"><div class=\"col-sm-6 actionBar\"><div class=\"{{css.search}}\"></div></div><div class=\"col-sm-6\"><div class=\"{{css.actions}}\"></div> <div class='btn btn-primary' id='create' class='command-add'><span class=\"fa fa-user\"></span> New Image</div> <div class='btn btn-primary' id='list_gallery' class='command-list'><span class=\"fa fa-database\"></span> List Gallery</div></div></div></div>",
        },
        formatters: {
            "file_name": function(column, row)
            {
                return "<img src='"+row.file_name+"' height='75px'>";
            },
            "commands": function(column, row)
            {
                return "<button type=\"button\" class=\"btn btn-sm btn-primary command-edit\" data-row-title=\""+row.title+"\" data-row-gallery=\""+row.gallery_id+"\" data-row-id=\"" + row.id + "\"><span class=\"fa fa-pencil\"></span></button> " +
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
                url: 'image/edit',
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
            $.get( "image/delete/"+ $(this).data("row-id"), function( data ) {
                myAlert(data);
                $("#grid-selection").bootgrid("reload");
            });

        });
    });

    $("#grid-selection-header .actionBar").append("");

    $("#grid-gallery-header .actionBar").append(" ");


    $("#create").on('click',function (e) {
        myForm('create',e);
        $("#save").on('click',function(e){
        	var g_val = $("#gallery").val();

        		$("#myForm").ajaxForm({
	                url: 'image/create',
	                type: 'post',
	                beforeSubmit:  function(data) {
			            if(g_val == 0){
			            	//alert("no Gallery selected");
			            	var mesg = { alert : "error" , title : "Error no Gallery", _id : "cr1", msg: "no Gallery Selected"};
			            	myAlert(mesg);
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
      
        });
    });
    $("#create_gallery").on('click',function (e) {
        $('#myFormGallery .modal-dialog').css("width", "35%");
        myGallery('create',e);
        $('#myFormGallery').modal('show');
        $("#manage-gallery").ajaxForm({
            url: 'gallery/create',
            type: 'post',
            success: function(data) {
                myAlert(data);
                gallery.bootgrid("reload");
                setTimeout(function(){
                    $('#myFormGallery').modal('hide');
                }, 10000);
            }
        });
    });

    $("#list_gallery").on('click',function (e) {
        $('#myGallery').modal('show');
    });

    function myForm(status,e) {
        $('#myForm')[0].reset();
        if(status == 'edit') {

            $('#myModal .modal-title').html('Edit Image '+e.data("row-title"));
            $.getJSON("image/?id=" + e.data("row-id"), function (data) {
                $('#hidden_id').val(data.id);
                $('#title').val(data.title);
                $('#summernote').trumbowyg('html',data.description);
            });
            selectBox('edit', e);
        }else{
            $('#myModal .modal-title').html('Create New Image ');
            selectBox('create',e);
            $('#summernote').trumbowyg('html',"");
            //$('#summernote').summernote();
        }

        $('#myModal').modal('show');

    }

    function myGallery(status,e) {
        $('#manage-gallery')[0].reset();
        $('#myFormGallery .modal-dialog').css("width", "35%");
        if(status == 'edit') {
            $('#myFormGallery .modal-title').html('Edit Gallery '+e.data("row-title"));
            $.getJSON("gallery/get/?id=" + e.data("row-id"), function (data) {
                $('#gallery_hidden_id').val(data.id);
                $('#gallery_title').val(data.title);
                $('#description').trumbowyg('html',data.description);
            });
            selectBox('edit', e);
        }else{
            $('#myFormGallery .modal-title').html('Create New Gallery ');
            selectBox('create',e);
            $('#description').trumbowyg('html',"");
        }

        $('#myFormGallery').modal('show');
    }

    function selectBox(status,e) {
        $('#gallery option').each(function(){
            if ($('#gallery option[value="'+$(this).val()+'"]').length) $(this).remove();
        });

        $.get( "gallery/gallery", function( data ) {
            $("#gallery").append( "<option value='0'>-- Gallery --</option>");
            $.each(data, function (index, element) {
                $("#gallery").append( "<option value='"+element.id+"'>"+element.title+"</option>");
            });
            if(status == 'edit'){
                $("#gallery").val(e.data("row-gallery"));
            }
        }, "json" );
    }

    function myAlert(e)
    {
        //var obj = jQuery.parseJSON(e);
        var mesg= [];
        mesg["alert"] = e.alert;
        mesg["title"] = e.msg;
        mesg["msg"] = "# "+e._id+" "+e.msg;
        notif_show(mesg);
    }
});