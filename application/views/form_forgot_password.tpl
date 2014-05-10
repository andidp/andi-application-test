<div class="block" id="block-tables">


    <div class="content">
        <div class="inner">
            <h3>Forgot password</h3>
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
                    <label class="label">{$users_fields.email}<span class="error">*</span></label>
                    <div>
                        <input class="text_field" type="email" maxlength="255" name="email" placeholder="Please type your email" />
                    </div>

                </div>

                <div class="group navform wat-cf">
                    <button class="button" type="submit">
                        <img src="asset/backend_skins/images/icons/tick.png" alt="Save"> Send
                    </button>
                    <span class="text_button_padding">or</span>
                    <a class="text_button_padding link_button" href="javascript:window.history.back();">Cancel</a>
                </div>
            </form>
        </div><!-- .inner -->
    </div><!-- .content -->
</div><!-- .block -->
