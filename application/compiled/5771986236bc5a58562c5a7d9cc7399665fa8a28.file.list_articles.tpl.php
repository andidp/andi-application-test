<?php /* Smarty version Smarty-3.1.7, created on 2014-04-20 10:20:15
         compiled from "application/views/list_articles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155424798853533cef11e942-92581925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5771986236bc5a58562c5a7d9cc7399665fa8a28' => 
    array (
      0 => 'application/views/list_articles.tpl',
      1 => 1397961216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155424798853533cef11e942-92581925',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table_name' => 0,
    'articles_data' => 0,
    'articles_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_53533cef177d6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53533cef177d6')) {function content_53533cef177d6($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/andi-app-test/output/application/libraries/smarty/plugins/function.cycle.php';
?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="articles">Listing</a></li>
                        <li><a href="articles/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>

                        <?php if (!empty($_smarty_tpl->tpl_vars['articles_data']->value)){?>
                        <form action="articles/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th><?php echo $_smarty_tpl->tpl_vars['articles_fields']->value['id'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['articles_fields']->value['title'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['articles_fields']->value['content'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['articles_fields']->value['publication_date'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['articles_fields']->value['created'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['articles_fields']->value['modified'];?>
</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" /></td>
                                            				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['publication_date'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['created'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['modified'];?>
</td>

                                            <td width="80">
                                                <a href="articles/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><img src="asset/images/view.png" alt="Show record" /></a>
                                                <a href="articles/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><img src="asset/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('articles/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
')"><img src="asset/images/delete.png" alt="Delete record" /></a>
                                            </td>
                            		    </tr>
                                	<?php } ?>
                            	</tbody>
                            </table>
                            <div class="actions-bar wat-cf">
                                <div class="actions">
                                    <button class="button" type="submit">
                                        <img src="asset/backend_skins/images/icons/cross.png" alt="Delete"> Delete selected
                                    </button>
                                </div>
                                <div class="pagination">
                                    <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

                                </div>
                            </div>
                        </form>
                        <?php }else{ ?>
                            No records found.
                        <?php }?>

                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
<?php }} ?>