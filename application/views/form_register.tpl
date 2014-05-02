<div class="block" id="block-tables">


    <div class="content">
        <div class="inner">
            <h3>User registration</h3>
            
            {if isset($errors)}
                <div class="flash">
                    <div class="message error">
                        <p>{$errors}</p>
                    </div>
                </div>
            {/if}

            <form class="form" method='post' action='front/{$action_mode}' enctype="multipart/form-data">

                <div class="group">
                    <label class="label">{$users_fields.username}<span class="error">*</span></label>
                    <div>
                        <input class="text_field" type="text" maxlength="255" value="{if isset($users_data)}{$users_data.username}{/if}" name="username" />
                    </div>

                </div>

                <div class="group">
                    <label class="label">{$users_fields.email}<span class="error">*</span></label>
                    <div>
                        <input class="text_field" type="text" maxlength="255" value="{if isset($users_data)}{$users_data.email}{/if}" name="email" />
                    </div>

                </div>

                <div class="group">
                    <label class="label">{$users_fields.password}<span class="error">*</span></label>
                    <div>
                        <input class="text_field" type="password" maxlength="255" value="{if isset($users_data)}{$users_data.password}{/if}" name="password" />
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
