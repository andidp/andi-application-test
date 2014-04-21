<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="users">Listing</a></li>
                        <li><a href="users/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of {$table_name}</h3>

                        {if !empty( $users_data )}
                        <form action="users/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th>{$users_fields.id}</th>
			<th>{$users_fields.role}</th>
			<th>{$users_fields.username}</th>
			<th>{$users_fields.email}</th>
			<th>{$users_fields.password}</th>
			<th>{$users_fields.user_status}</th>
			<th>{$users_fields.token}</th>
			<th>{$users_fields.last_login}</th>
			<th>{$users_fields.created}</th>
			<th>{$users_fields.updated}</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	{foreach $users_data as $row}
                                        <tr class="{cycle values='odd,even'}">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.id}" /></td>
                                            				<td>{$row.id}</td>
				<td>{$row.role}</td>
				<td>{$row.username}</td>
				<td>{$row.email}</td>
				<td>{$row.password}</td>
				<td>{$row.user_status}</td>
				<td>{$row.token}</td>
				<td>{$row.last_login}</td>
				<td>{$row.created}</td>
				<td>{$row.updated}</td>

                                            <td width="80">
                                                <a href="users/show/{$row.id}"><img src="asset/images/view.png" alt="Show record" /></a>
                                                <a href="users/edit/{$row.id}"><img src="asset/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('users/delete/{$row.id}')"><img src="asset/images/delete.png" alt="Delete record" /></a>
                                            </td>
                            		    </tr>
                                	{/foreach}
                            	</tbody>
                            </table>
                            <div class="actions-bar wat-cf">
                                <div class="actions">
                                    <button class="button" type="submit">
                                        <img src="asset/backend_skins/images/icons/cross.png" alt="Delete"> Delete selected
                                    </button>
                                </div>
                                <div class="pagination">
                                    {$pager}
                                </div>
                            </div>
                        </form>
                        {else}
                            No records found.
                        {/if}

                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
