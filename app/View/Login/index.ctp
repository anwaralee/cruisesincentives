<div class="loginfrm">
<h3>ADMIN LOGIN</h3>
<form method="post" action="<?php echo $this->webroot;?>login/loginVerify">
<label>Username : </label><input type="text" name="un" />
<label>Password : </label><input type="password" name="pw" />
<hr />
<input type="submit" value="Login" name="submit" class="btn btn-primary btn-large" />
</form>
</div>