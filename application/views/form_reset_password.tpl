<div class="block" id="block-tables">


    <div class="content">
        <div class="inner">
            <h3>Change password</h3>
            {if isset($message)}
                <div class="flash">
                    <div class="message error">
                        <p>{$message}</p>
                    </div>
                </div>
            {/if}
            {if isset($errors)}
                <div class="flash">
                    <div class="message error">
                        <p>{$errors}</p>
                    </div>
                </div>
            {/if}

            <form class="form" method='post' action='front/{$action_mode}' enctype="multipart/form-data">

                <div class="group">
                    <label class="label">{$users_fields.password}<span class="error">*</span></label>
                    <div>
                        <input class="text_field" type="password" maxlength="255" name="password" placeholder="Please type your password" />
                        <input type="hidden" name="id" value="{$user.id}" />
                        <input type="hidden" name="token" value="{$user.token}" />
                        <input type="hidden" name="email" value="{$user.email}" />
                    </div>

                </div>
                <div class="group">
                    <label class="label">Confirm password<span class="error">*</span></label>
                    <div>
                        <input class="text_field" type="password" maxlength="255" name="confirm_password" placeholder="Please type your confirm password" />
                    </div>

                </div>

                <div class="group navform wat-cf">
                    <button class="button" type="submit">
                        <img src="asset/backend_skins/images/icons/tick.png" alt="Save"> Change Password
                    </button>
                    <span class="text_button_padding">or</span>
                    <a class="text_button_padding link_button" href="javascript:window.history.back();">Cancel</a>
                </div>
            </form>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
