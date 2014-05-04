<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="users">Listing</a></li>
                        <li class="{if $action_mode == 'create'}active{/if}"><a href="users/create/">New record</a></li>
                    </ul>
                </div>

                <div class="content">
                    <div class="inner">
                        {if $action_mode == 'create'}
                            <h3>Add new record</h3>
                        {else}
                            <h3>Edit record: #{$record_id}</h3>
                        {/if}
                        {if isset($errors)}
                            <div class="flash">
                                <div class="message error">
                                    <p>{$errors}</p>
                                </div>
                            </div>
                        {/if}

                        <form class="form" method='post' action='users/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label">{$users_fields.role}</label>
    		<div>
                {form_dropdown('role', $role_options)}

    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label">{$users_fields.username}</label>
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
            <label class="label">{$users_fields.password}</label>
    		<div>
    	       	<input class="text_field" type="password" maxlength="255" value="{if isset($users_data)}{$users_data.password}{/if}" name="password" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label">{$users_fields.user_status}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($users_data)}{$users_data.user_status}{/if}" name="user_status" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label">{$users_fields.token}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($users_data)}{$users_data.token}{/if}" name="token" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label">{$users_fields.last_login}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($users_data)}{$users_data.last_login}{/if}" name="last_login" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label">{$users_fields.created}</label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($users_data)}{$users_data.created}{/if}" name="created" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label">{$users_fields.updated}</label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($users_data)}{$users_data.updated}{/if}" name="updated" />
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
