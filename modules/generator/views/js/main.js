var room = 1;
var count = 0;
function education_fields() {
    count++;
    room++;
    var objTo = document.getElementById('generator_fields')
    var divtest = document.createElement("div");
  divtest.setAttribute("class", "field-group removeclass"+room);
  var rdiv = 'removeclass'+room;
  //http://jdmweb.com/form-cloning-jquery-plugin
    divtest.innerHTML ='<div class="col-md-6 form-group"> <label>Field Name</label> <input required class="form-control" type="text" name="fields['+ count +'][name]" value="" placeholder="Field Name"> </div><div class="col-md-6 form-group"> <label>Field Input Type</label> <select class="form-control" name="fields['+ count +'][inputtype]"> <option value="input">Input</option> <option value="textarea">Textarea</option> <option value="dropdown">Dropdown</option> <option value="multiselect">Multiselect</option> <option value="checkbox">Checkbox</option> <option value="radio">Radio</option> </select> </div><div class="col-md-6 form-group"> <label>Default <small>Empty is no default</small></label> <input class="form-control" type="text" name="fields['+ count +'][dbdefault]" value=""> </div><div class="col-md-6 form-group"> <label>Field Data Type</label> <select class="form-control" name="fields['+ count +'][dbtype]"> <option value="VARCHAR">VARCHAR</option> <option value="TEXT">TEXT</option> <option value="CHAR">CHAR</option> <option value="DATE">DATE</option> <option value="INT">INT</option> <option value="DATETIME">DATETIME</option> <option value="TIMESTAMP">TIMESTAMP</option> <option value="BLOB">BLOB</option> <option value="BOOL">BOOL</option> </select> </div><div class="col-md-6 form-group"> <label>Constraint <small>Empty or 0</small></label> <input class="form-control" type="number" name="fields['+ count +'][constraint]" value="0"> </div><div class="col-md-6 form-group"> <p><label>Is Null</label></p><div class="radio-inline"> <label> <input type="radio" name="fields['+ count +'][isnull]" value="false" checked="checked">False </label> </div><div class="radio-inline"> <label> <input type="radio" name="fields['+ count +'][isnull]" value="true">True </label> </div><div class="radio-inline"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button> </div></div>';
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
     $('.removeclass'+rid).remove();
   }