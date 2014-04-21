<?php /* Smarty version Smarty-3.1.7, created on 2014-04-21 10:17:07
         compiled from "application/views/form_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173544377053533572c5e0b6-24361801%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7967ac88265606bd1ec936c53f92c8cfede7ae4' => 
    array (
      0 => 'application/views/form_login.tpl',
      1 => 1398050110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173544377053533572c5e0b6-24361801',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_53533572c658d',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53533572c658d')) {function content_53533572c658d($_smarty_tpl) {?>
    <div id="box">
      <div class="block" id="block-login">
        <h2>Please login</h2>
        <div class="content login">
		<?php if (isset($_smarty_tpl->tpl_vars['error']->value)){?>
          <div class="flash">
            <div class="message error">
              <p>Incorrect username or password!</p>
            </div>
          </div>
		<?php }?>
          <form action="login/validate" class="form login" method="post" enctype="multipart/form-data">
            <div class="group wat-cf">
              <div class="left">
                <label class="label right">Login</label>
              </div>
              <div class="right">
                <input type="text" name="user" class="text_field" />
              </div>
            </div>
            <div class="group wat-cf">
              <div class="left">
                <label class="label right">Password</label>
              </div>
              <div class="right">
                <input type="password" name="pass" class="text_field" />
              </div>
            </div>
            <div class="group navform wat-cf">
              <div class="right">
                <button class="button" type="submit">
                  <img src="asset/backend_skins/images/icons/key.png" alt="Save" /> Login
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
<?php }} ?>