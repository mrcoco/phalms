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
            {{ form('submit',
            'method': 'post',
            'id': 'form',
            'role': 'form',
            'enctype': 'multipart/form-data') }}
            <div class="row">
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
                        <label>Subpackage</label>
                        <input class="form-control" type="text" name="subpackage" placeholder="subpackage" value="">
                    </div>
                    <div class="form-group">
                        <label>Copyright</label>
                        <input class="form-control" type="text" name="copyright" placeholder="copyright" value="MIT">
                    </div>
                    <div class="form-group">
                        <label>Module Description</label>
                        <textarea class="form-control" rows="4" name="description" placeholder="module description" required></textarea>
                    </div>
                    <p>Frontend</p>
                    <div class="radio-inline">
                        <label>
                            <input type="radio" checked="checked" name="frontend" value="true" selected="selected">True
                        </label>
                    </div>
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="frontend" value="false">False
                        </label>
                    </div>
                    <p>Backend</p>
                    <div class="radio-inline">
                        <label>
                            <input type="radio" checked="checked" name="backend" value="true" selected="selected">True
                        </label>
                    </div>
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="backend" value="false">False
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Fields <em>- id and order are already included</em></h4>
                    <div id="backendFields">
                        <div id="fields">
                            <div class="new-field" id="field-{{ count }}">
                                <hr>
                                <div class="form-group">
                                    <label>Field Name</label>
                                    <input required class="form-control" type="text" name="fields[{{ count }}][text]" value="" placeholder="Field Name">
                                </div>
                                <label>Field Data Type</label>
                                <select class="form-control" name="fields[{{ count }}][dbtype]">
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
                                <label>Field Input Type</label>
                                <select class="form-control" name="fields[{{ count }}][type]">
                                    <option value="input">Input</option>
                                    <option value="textarea">Textarea</option>
                                    <option value="dropdown">Dropdown</option>
                                    <option value="multiselect">Multiselect</option>
                                    <option value="checkbox">Checkbox</option>
                                    <option value="radio">Radio</option>
                                </select>
                                <div class="form-group">
                                    <label>Constraint <small>Empty or 0 is no constraint</small></label>
                                    <input class="form-control" type="number" name="fields[{{ count }}][constraint]" value="0">
                                </div>
                                <div class="form-group">
                                    <label>Default <small>Empty is no default</small></label>
                                    <input class="form-control" type="text" name="fields[{{ count }}][default]" value="">
                                </div>
                                <p><label>Is Null</label></p>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="fields[{{ count }}][null]" value="false"checked="checked">False
                                    </label>
                                </div>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="fields[{{ count }}][null]" value="true">True
                                    </label>
                                </div>
                                <br>
                                <label>Form Validation</label>
                                <p><a href="https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html#rulereference" target="_blank" title="CodeIgniter Rule Reference">View Rule Information</a></p>
                                <div class="form-group">
                                    {% set rules = ['required', 'alpha', 'alpha_dash', 'alpha_numeric', 'decimal', 'encode_php_tags', 'integer', 'is_natural', 'is_natural_no_zero', 'xss_clean'] %}
                                    {% set rules2 = ['trim', 'numeric', 'prep_for_form', 'prep_url', 'strip_image_tags', 'valid_base64', 'valid_email', 'valid_emails', 'valid_ip'] %}
                                    <div class="col-md-6">
                                        {% for index, rule in rules %}
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="fields[{{ count }}][validation][]" value="{{ rule }}">{{ rule }}
                                                </label>
                                            </div>
                                        {% endfor %}
                                    </div>
                                    <div class="col-md-6">
                                        {% for index, rule in rules2 %}
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="fields[{{ count }}][validation][]" value="{{ rule }}">{{ rule }}
                                                </label>
                                            </div>
                                        {% endfor %}
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <button class="btn btn-primary" id="addField">Add Another Field</button>
                        <button type="submit" name="generate" value="Generate" class="btn btn-success">Generate Module</button>
                        <button class="btn btn-danger" id="removeField" style="display: none">Remove This Field</button>
                    </div>
                </div></form>
            </div>
        </div>
    </div>
</div>