
    <div id="box">
      <div class="block" id="block-login">
        <h2>Please login</h2>
        <div class="content login">
        {if isset($message)}
            <div class="flash">
                <div class="message error">
                    <p>{$message}</p>
                </div>
            </div>
        {/if}
		{if isset($error)}
          <div class="flash">
            <div class="message error">
              <p>Incorrect username or password!</p>
            </div>
          </div>
		{/if}
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
                  <a href="front/forgot_password">Forgot password ?</a>
              </div>
            </div>
          </form>
        </div>
      </div>
