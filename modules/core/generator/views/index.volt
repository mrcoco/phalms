<div class="col-md-12 col-sm-12">
    <div class="box">
        <header class="bg-alizarin text-white">
            <h4>Module Generator</h4>
            <!-- begin box-tools -->
            <div class="box-tools">
                <a class="fa fa-fw fa-minus" href="#" data-box="collapse"></a>
                <a class="fa fa-fw fa-square-o" href="#" data-fullscreen="box"></a>
                <a class="fa fa-fw fa-refresh" href="#" data-box="refresh"></a>
                <a class="fa fa-fw fa-times" href="#" data-box="close"></a>
            </div>
            <!-- END: box-tools -->
        </header>
        <div class="box-body collapse in">
            {{ content() }}
            {{ form('generator',
            'method': 'post',
            'id': 'form',
            'role': 'form',
            'enctype': 'multipart/form-data') }}
            <div class="row">
                <div class="field-group">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Module Name</label>
                            <input class="form-control" type="text" name="generator_name" placeholder="module name" required>
                        </div>
                        <div class="form-group">
                            <label>Author Name</label>
                            <input class="form-control" type="text" name="author" placeholder="author name" value="">
                        </div>
                        <div class="form-group">
                            <label>Author Website</label>
                            <input class="form-control" type="text" name="website" placeholder="http://" value="">
                        </div>
                        <div class="form-group">
                            <label>Package</label>
                            <input class="form-control" type="text" name="package" placeholder="package" value="">
                        </div>
            
                        <div class="form-group">
                            <label>Copyright</label>
                            <input class="form-control" type="text" name="copyright" placeholder="copyright" value="MIT">
                        </div>
                        <div class="form-group">
                            <label>Module Description</label>
                            <textarea class="form-control" rows="4" name="description" placeholder="module description" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Fields <em>- id and order are already included</em></h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Field Name</label>
                                <input required class="form-control" type="text" name="fields[0][name]" value="" placeholder="Field Name">
                            </div>
                            <div class="col-md-6 form-group">
                            <label>Field Input Type</label>
                            <select class="form-control" name="fields[0][inputtype]">
                                <option value="input">Input</option>
                                <option value="textarea">Textarea</option>
                                <option value="dropdown">Dropdown</option>
                                <option value="multiselect">Multiselect</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="radio">Radio</option>
                            </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Default <small>Empty is no default</small></label>
                                <input class="form-control" type="text" name="fields[0][dbdefault]" value="">
                            </div>
                        
                            <div class="col-md-6 form-group">
                            <label>Field Data Type</label>
                            <select class="form-control" name="fields[0][dbtype]">
                                <option value="VARCHAR">VARCHAR</option>
                                <option value="TEXT">TEXT</option>
                                <option value="CHAR">CHAR</option>
                                <option value="DATE">DATE</option>
                                <option value="INT">INT</option>
                                <option value="DATETIME">DATETIME</option>
                                <option value="TIMESTAMP">TIMESTAMP</option>
                                <option value="BLOB">BLOB</option>
                                <option value="BOOL">BOOL</option>
                            </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Constraint <small>Empty or 0</small></label>
                                <input class="form-control" type="number" name="fields[0][constraint]" value="0">
                            </div>
                            <div class="col-md-6 form-group">
                                <p><label>Is Null</label></p>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="fields[0][isnull]" value="false"checked="checked">False
                                </label>
                              </div>
                              <div class="radio-inline">
                                <label>
                                  <input type="radio" name="fields[0][isnull]" value="true">True
                                </label>
                              </div>
                              <div class="radio-inline">
                                    <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
                              </div>
                            </div>
                            
                            <div id="generator_fields"></div>
                        </div>
                        <div>
                        <button class="btn btn-success" type="submit"> <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Generate</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>