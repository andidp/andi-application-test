<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="users">Listing</a></li>
                        <li><a href="users/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
						<h3>Details of {$table_name}, record #{$id}</h3>

						<table class="table" width="50%">
                        	<thead>
                                <th width="20%">Field</th>
                                <th>Value</th>
                        	</thead>
						    <tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.id}:</td>
                            <td>{$users_data.id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.role}:</td>
                            <td>{$users_data.role}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.username}:</td>
                            <td>{$users_data.username}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.email}:</td>
                            <td>{$users_data.email}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.password}:</td>
                            <td>{$users_data.password}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.user_status}:</td>
                            <td>{$users_data.user_status}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.token}:</td>
                            <td>{$users_data.token}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.last_login}:</td>
                            <td>{$users_data.last_login}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.created}:</td>
                            <td>{$users_data.created}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$users_fields.updated}:</td>
                            <td>{$users_data.updated}</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="users/edit/{$id}">
                                    <img src="asset/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
