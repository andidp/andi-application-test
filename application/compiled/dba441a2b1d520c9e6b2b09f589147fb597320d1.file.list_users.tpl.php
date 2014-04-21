<?php /* Smarty version Smarty-3.1.7, created on 2014-04-20 10:20:44
         compiled from "application/views/list_users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68680542353533d0c3618b7-79361368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dba441a2b1d520c9e6b2b09f589147fb597320d1' => 
    array (
      0 => 'application/views/list_users.tpl',
      1 => 1397961216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68680542353533d0c3618b7-79361368',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table_name' => 0,
    'users_data' => 0,
    'users_fields' => 0,
    'row' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_53533d0c3e8f2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53533d0c3e8f2')) {function content_53533d0c3e8f2($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/var/www/andi-app-test/output/application/libraries/smarty/plugins/function.cycle.php';
?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first active"><a href="users">Listing</a></li>
                        <li><a href="users/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <h3>List of <?php echo $_smarty_tpl->tpl_vars['table_name']->value;?>
</h3>

                        <?php if (!empty($_smarty_tpl->tpl_vars['users_data']->value)){?>
                        <form action="users/delete" method="post" id="listing_form">
                            <table class="table">
                            	<thead>
                                    <th width="20"> </th>
                                    			<th><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['id'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['role'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['username'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['email'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['password'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['user_status'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['token'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['last_login'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['created'];?>
</th>
			<th><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['updated'];?>
</th>

                                    <th width="80">Actions</th>
                            	</thead>
                            	<tbody>
                                	<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                        <tr class="<?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
                                            <td><input type="checkbox" class="checkbox" name="delete_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" /></td>
                                            				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['role'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['password'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['user_status'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['token'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['last_login'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['created'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['updated'];?>
</td>

                                            <td width="80">
                                                <a href="users/show/<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><img src="asset/images/view.png" alt="Show record" /></a>
                                                <a href="users/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"><img src="asset/images/edit.png" alt="Edit record" /></a>
                                                <a href="javascript:chk('users/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
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