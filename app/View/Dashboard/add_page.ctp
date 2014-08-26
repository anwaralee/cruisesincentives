
<h1>Add new page</h1>
<form action="" method="post" id="myform">
<label>Page Title</label>
<input type="text" value="" name="title" class="required" />
<label>Page Description</label>
<textarea name="description" class="ckeditor required"></textarea>
<hr />
<input type="submit" value="Add" name="submit" class="btn btn-primary btn-large" />
</form>
<script>
$(function(){
   $('#myform').validate(); 
});
</script>