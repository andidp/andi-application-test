<div class="block" id="block-tables">

    <div class="secondary-navigation">
        <ul class="wat-cf">
            <li class="first active"><a href="articles">Listing</a></li>
            <li><a href="articles/create/">New record</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="inner">
            <h3>List of {$table_name}</h3>

            {if !empty( $articles_data )}
                <form action="articles/delete" method="post" id="listing_form">
                    <table class="table">
                        <thead>
                        <th width="20"> </th>
                        <th>{$articles_fields.id}</th>
                        <th>{$articles_fields.title}</th>
                        <th>{$articles_fields.content}</th>
                        <th>{$articles_fields.publication_date}</th>
                        <th>{$articles_fields.created}</th>
                        <th>{$articles_fields.modified}</th>

                        <th width="80">Actions</th>
                        </thead>
                        <tbody>
                            {foreach $articles_data as $row}
                                <tr class="{cycle values='odd,even'}">
                                    <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="{$row.id}" /></td>
                                    <td>{$row.id}</td>
                                    <td>{$row.title}</td>
                                    <td>{$row.content}</td>
                                    <td>{$row.publication_date}</td>
                                    <td>{$row.created}</td>
                                    <td>{$row.modified}</td>

                                    <td width="80">
                                        <a href="articles/show/{$row.id}"><img src="asset/images/view.png" alt="Show record" /></a>
                                        <a href="articles/edit/{$row.id}"><img src="asset/images/edit.png" alt="Edit record" /></a>
                                        <a href="javascript:chk('articles/delete/{$row.id}')"><img src="asset/images/delete.png" alt="Delete record" /></a>
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
