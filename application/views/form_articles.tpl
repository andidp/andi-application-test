<div class="block" id="block-tables">

                <div class="secondary-navigation">
                    <ul class="wat-cf">
                        <li class="first"><a href="articles">Listing</a></li>
                        <li class="{if $action_mode == 'create'}active{/if}"><a href="articles/create/">New record</a></li>
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

                        <form class="form" method='post' action='articles/{$action_mode}/{if isset($record_id)}{$record_id}{/if}' enctype="multipart/form-data">

                            
    	<div class="group">
            <label class="label">{$articles_fields.title}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($articles_data)}{$articles_data.title}{/if}" name="title" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label">{$articles_fields.content}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($articles_data)}{$articles_data.content}{/if}" name="content" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label">{$articles_fields.publication_date}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($articles_data)}{$articles_data.publication_date}{/if}" name="publication_date" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label">{$articles_fields.created}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($articles_data)}{$articles_data.created}{/if}" name="created" />
    		</div>
    		
    	</div>
    
    	<div class="group">
            <label class="label">{$articles_fields.modified}<span class="error">*</span></label>
    		<div>
    	       	<input class="text_field" type="text" maxlength="255" value="{if isset($articles_data)}{$articles_data.modified}{/if}" name="modified" />
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
