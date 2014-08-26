<?php

    $c = $content;
    
?>
<h1>Edit Page - <?php echo $c['Page']['title'];?></h1>
<form action="<?php echo $this->webroot; ?>dashboard/editPage/<?php echo $c['Page']['id']; ?>" method="post" id="myform">
<label>Page Title</label>
<input type="text" value="<?php echo $c['Page']['title'];?>" name="title" class="required" />
<label>Page Description</label>
<textarea name="description" class="CKEDITOR required" id="ck"><?php echo $c['Page']['description'];?></textarea>
<script type="text/javascript">
	var CustomHTML = CKEDITOR.replace( 'ck');
                        CKFinder.setupCKEditor( CustomHTML, '<?php echo $this->webroot;?>js/ckfinder/' );
</script>
<label>SEO title</label>
<input type="text" value="<?php echo $c['Page']['seo_title'];?>" name="seo_title" class="" />
<label>Seo Description</label>
<textarea name="seo_desc" class="" ><?php echo $c['Page']['seo_desc'];?></textarea>

<hr />

<input type="submit" value="Edit" name="submit" class="btn btn-primary btn-large" />
</form>
<script>
$(function(){
   $('#myform').validate(); 
});
</script>
