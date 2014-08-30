<aside class="left_body1 addArticles contentPage">
<div class="line"></div>
<h1>ADD/EDIT Cruiseline </h1>
<div class="line"></div>
<div class="form">
    <form action="<?php echo $this->webroot;?>admin/<?php echo (isset($cruise) && $cruise['Cruiseline']['id']!="")? "cruiseline_edit/".$cruise['Cruiseline']['id']:"cruiseline_add" ;?>" method="post" id="myform">
        <label>Cruiselines:
        <select name="parent_id" class="required">
            <option value="0"> Select Cruiseline</option>
            <?php foreach($cruiselines as $c)
            {?>
               <option value="<?php echo $c['Cruiseline']['id'];?>"<?php echo(isset($cruise)&& $c['Cruiseline']['id']==$cruise['Cruiseline']['parent_id'])?"selected='selected'":"";?> ><?php echo $c['Cruiseline']['title'];?></option> 
            <?php
            }?>
        </select></label>
        <label> Title</label>
        <input type="text" value="<?php if(isset($cruise)&& $cruise['Cruiseline']['title']!= "" )echo $cruise['Cruiseline']['title'];?>" name="title" class="required" />
        <label>Description</label>
        <textarea name="desc" class="CKEDITOR required" id="ck">
        <?php   if(isset($cruise)&& $cruise['Cruiseline']['desc']!= "" )echo $cruise['Cruiseline']['desc'];?></textarea>
        <script type="text/javascript">
        	var CustomHTML = CKEDITOR.replace( 'ck');
                                CKFinder.setupCKEditor( CustomHTML, '<?php echo $this->webroot;?>js/ckfinder/' );
        </script>
        <label>SEO Title</label>
        <input type="text" value="<?php if(isset($cruise)&& $cruise['Cruiseline']['seo_title']!= "" )echo $cruise['Cruiseline']['seo_title'];?>" name="seo_title" class="" />
        <label>SEO Description</label>
        <textarea name="seo_desc" class="" ><?php if(isset($cruise)&& $cruise['Cruiseline']['seo_desc']!= "" )echo $cruise['Cruiseline']['seo_desc'];?></textarea>
        
        <hr />
        
        <input type="submit" value="<?php echo (isset($cruise['Cruiseline']['id']))?'Edit':'Add';?>" name="submit" class="btn btn-primary " />
        
    </form>

</aside>
<aside class="right_body1 floatRight">
  
    <a href="<?php echo $this->webroot;?>admin/cruiseline" class="btn ">Cancel</a>
</aside>
<div class="clear"></div>