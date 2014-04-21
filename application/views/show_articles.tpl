<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="articles">Listing</a></li>
                        <li><a href="articles/create/">New record</a></li>
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
                            <td>{$articles_fields.id}:</td>
                            <td>{$articles_data.id}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$articles_fields.title}:</td>
                            <td>{$articles_data.title}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$articles_fields.content}:</td>
                            <td>{$articles_data.content}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$articles_fields.publication_date}:</td>
                            <td>{$articles_data.publication_date}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$articles_fields.created}:</td>
                            <td>{$articles_data.created}</td>
                        </tr><tr class="{cycle values='odd,even'}">
                            <td>{$articles_fields.modified}:</td>
                            <td>{$articles_data.modified}</td>
                        </tr>
						</table>
                        <div class="actions-bar wat-cf">
                            <div class="actions">
                                <a class="button" href="articles/edit/{$id}">
                                    <img src="asset/backend_skins/images/icons/application_edit.png" alt="Edit record"> Edit record
                                </a>
                            </div>
                        </div>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
