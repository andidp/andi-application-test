<?php /* Smarty version Smarty-3.1.7, created on 2014-04-20 10:20:46
         compiled from "application/views/form_users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203025667053533d0ea9bff5-12351192%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e014c8d111b7080f165febece625d07b831aef7' => 
    array (
      0 => 'application/views/form_users.tpl',
      1 => 1397961216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203025667053533d0ea9bff5-12351192',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_mode' => 0,
    'record_id' => 0,
    'errors' => 0,
    'users_fields' => 0,
    'users_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_53533d0eb89ca',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53533d0eb89ca')) {function content_53533d0eb89ca($_smarty_tpl) {?><div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="users">Listing</a></li>
                        <li class="<?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>active<?php }?>"><a href="users/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        <?php if ($_smarty_tpl->tpl_vars['action_mode']->value=='create'){?>
                            <h3>Add new record</h3>
                        <?php }else{ ?>
                            <h3>Edit record: #<?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
</h3>
                        <?php }?>
                        <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)){?>
                            <div class="flash">
                                <div class="message error">
                                    <p><?php echo $_smarty_tpl->tpl_vars['errors']->value;?>
</p>
                                </div>
                            </div>
                        <?php }?>

                        <form class="form" method='post' action='users/<?php echo $_smarty_tpl->tpl_vars['action_mode']->value;?>
/<?php if (isset($_smarty_tpl->tpl_vars['record_id']->value)){?><?php echo $_smarty_tpl->tpl_vars['record_id']->value;?>
<?php }?>' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['role'];?>
</label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['users_data']->value['role'];?>
<?php }?>" name="role" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['username'];?>
</label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['users_data']->value['username'];?>
<?php }?>" name="username" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['email'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['users_data']->value['email'];?>
<?php }?>" name="email" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['password'];?>
</label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['users_data']->value['password'];?>
<?php }?>" name="password" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['user_status'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['users_data']->value['user_status'];?>
<?php }?>" name="user_status" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['token'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['users_data']->value['token'];?>
<?php }?>" name="token" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['last_login'];?>
<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['users_data']->value['last_login'];?>
<?php }?>" name="last_login" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['created'];?>
</label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['users_data']->value['created'];?>
<?php }?>" name="created" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label"><?php echo $_smarty_tpl->tpl_vars['users_fields']->value['updated'];?>
</label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users_data']->value)){?><?php echo $_smarty_tpl->tpl_vars['users_data']->value['updated'];?>
<?php }?>" name="updated" />
    		</div>
    		
    	</div>
    

                            <div class="group navform wat-cf">
                                    <button class="button" type="submit">
                                        <img src="asset/backend_skins/images/icons/tick.png" alt="Save"> Save
                                    </button>
                                    <span class="text_button_padding">or</span>
                                    <a class="text_button_padding link_button" href="javascript:window.history.back();">Cancel</a>
                            </div>
                        </form>
                    </div><!-- .inner -->
                </div><!-- .content -->
            </div><!-- .block -->
<?php }} ?>