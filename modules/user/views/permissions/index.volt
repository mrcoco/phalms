<div class="col-md-12 col-sm-12">
	<div class="box">
		<header class="bg-alizarin text-white">
			<h4>Manage Permissions</h4>
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

			<form method="post">

				<div align="center">

					<table class="perms">
						<tr>
							<td><label for="profileId"> Profile</label> </td>
							<td> {{ select('profileId', profiles, 'using': ['id', 'name'], 'useEmpty': true, 'emptyText': '...', 'emptyValue': '', 'class':'form-control') }}</td>
							<td> {{ submit_button('Search', 'class': 'btn btn-primary') }} </td>
						</tr>
					</table>

				</div>

                {% if request.isPost() and profile %}

                    {% for resource, actions in acl.getResources() %}

						<h3>{{ resource }}</h3>

						<table class="table table-bordered table-striped" align="center">
							<thead>
							<tr>
								<th width="5%"></th>
								<th>Description</th>
							</tr>
							</thead>
							<tbody>
                            {% for action in actions %}
								<tr>
									<td align="center"><input type="checkbox" name="permissions[]" value="{{ resource ~ '.' ~ action }}"  {% if permissions[resource ~ '.' ~ action] is defined %} checked="checked" {% endif %}></td>
									<td>{{ acl.getActionDescription(action) ~ ' ' ~ resource }}</td>
								</tr>
                            {% endfor %}
							</tbody>
						</table>

                    {% endfor %}

                {% endif %}

			</form>
		</div>
	</div>
</div>