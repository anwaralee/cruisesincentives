<h1>Admin Settings</h1>
<form action="" method="post" id="myform">
    <label>Username</label>
    <input type="text" name="username" value="<?php echo $a['Admin']['username'];?>" class="required" />
    
    <label>Email</label>
    <input type="text" name="email" value="<?php echo $a['Admin']['email'];?>" class="required" />
    
    <label>Password</label>
    <input type="password" name="password" value="<?php echo $a['Admin']['password'];?>" class="required" />
    
    <hr />
    <input type="submit" value="Change Setting" class="btn btn-large btn-primary" />
</form>
<script>
$(function(){
   $('#myform').validate(); 
});
</script>