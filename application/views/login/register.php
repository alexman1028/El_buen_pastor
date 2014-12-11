<div class="content">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div class="register-default-box">
        <h1>Registrar Pastores</h1>
        <!-- register form -->
        <form method="post" action="<?php echo URL; ?>login/register_action" name="registerform">
            <!-- the user name input field uses a HTML5 pattern check -->
            <label for="login_input_username">
                Usuario
                <span style="display: block; font-size: 14px; color: #999;">(unicamente letras y numeros *se recomienda minusculas)</span>
            </label>
            <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
            <!-- the email input field uses a HTML5 email type check -->
            <label for="login_input_username">
                Ciudad de origen
                <span style="display: block; font-size: 14px; color: #999;">(unicamente letras hasta 64 caracteres)</span>
            </label>
            <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_city" required />
            <!-- the email input field uses a HTML5 email type check -->
            <label for="login_input_email">
                Email
                <span style="display: block; font-size: 14px; color: #999;">
                    (Por favor ingresar <span style="text-decoration: underline; color: mediumvioletred;">un email real</span>
                    )
                </span>
            </label>
            <input id="login_input_email" class="login_input" type="email" name="user_email" required />
            <!---->
                 <label for="login_input_email">
                    Nivel de usuarios: (0=Pastor)(1=Admin)
                    
                </label>
               <!-- <input id="login_input_email" class="login_input" type="text" name="user_account_type" required />-->
                <select name="user_account_type">
                    <option value=""> </option>
                    <option value="1">Pastor</option>
                    <option value="0">Admin</option>
                </select>
            <!---->
            <label for="login_input_password_new">
                Contraseña (min. 6 caracteres!
                <span class="login-form-password-pattern-reminder">
                </span>
            </label>
            <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
            <label for="login_input_password_repeat">Repetir contraseña</label>
            <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
            <!-- show the captcha by calling the login/showCaptcha-method in the src attribute of the img tag -->
            <!-- to avoid weird with-slash-without-slash issues: simply always use the URL constant here 
            <img id="captcha" src="<?php //echo URL; ?>login/showCaptcha" /> 
            <span style="display: block; font-size: 11px; color: #999; margin-bottom: 10px">
                 quick & dirty captcha reloader 
                <a href="#" onclick="document.getElementById('captcha').src = '<?php //echo URL; ?>login/showCaptcha?' + Math.random(); return false">[ Reload Captcha ]</a>
            </span>
            <label>
                Please enter these characters
                <span style="display: block; font-size: 11px; color: #999;">
                    Please note: This captcha will be generated when the img tag requests the captcha-generation
                    (and a real image) from YOURURL/login/showcaptcha. As this is a client-side triggered request, the
                    $_SESSION["captcha"] dump in the footer will not show the captcha characters. The captcha generation
                    happens AFTER the rendering of the footer.
                </span>
            </label>
            <input type="text" name="captcha" required /> -->
            <input type="submit"  name="register" value="Register" />

        </form>
    </div>

    <?php if (FACEBOOK_LOGIN == true) { ?>
        <div class="register-facebook-box">
            <h1>or</h1>
            <a href="<?php echo $this->facebook_register_url; ?>" class="facebook-login-button">Register with Facebook</a>
        </div>
    <?php } ?>

</div>
