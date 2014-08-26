<?php
    
    $c = $content;
    $files = $c['Media']['file'];
    $arr_ext = array('mp3','wav','doc','pdf','docx');
    if($files != '')
    {
        $arr = explode('.',$files);
        $ext = end($arr);
        $ext = strtolower($ext);
    }
    else
    $ext = '';
    $print = "";
    $publication = "";
    $av = "";
    if($c['Media']['media_type']=='Print')
    $print = "selected='selected'";
    else
    if($c['Media']['media_type']=='Publication')
    $publication = "selected='selected'";
    else
    if($c['Media']['media_type']=='Audio-Visual')
    $av = "selected='selected'";
?>
<h1>Edit Media Content - <?php echo $c['Media']['media_type'];?></h1>
<form action="<?php echo $this->webroot; ?>dashboard/editMedia/<?php echo $c['Media']['id']; ?>" method="post" enctype="multipart/form-data">
<label>Media Title</label>
<input type="text" value="<?php echo $c['Media']['title'];?>" name="title" class="required" />
<label>Media Description</label>
<textarea name="description" class="ckeditor required"><?php echo $c['Media']['description'];?></textarea>
<label>Media Type</label>
<select name="media_type" id="media_type" class="required" id="myform">
    <option value="">Choose Type</option>
    <option value="Print" <?php echo $print;?>>Print</option>
    <option value="Publication" <?php echo $publication;?>>Publication</option>
    <option value="Audio-Visual" <?php echo $av;?>>Audio-Visual</option>
</select>
<div class="av" <?php if($ext != 'mp3' && $ext !='wav' && $c['Media']['youtube']==''){?>style="display: none;"<?php }?>>
<label>Audio or Video</label>
<select id="av" name="av">
    <option value="a" <?php if($ext == 'mp3' || $ext =='wav'){?>selected="selected"<?php }?>>Audio</option>
    <option value="v" <?php if($c['Media']['youtube']!=''){?>selected="selected"<?php }?>>Video</option>
</select>
</div>
<div class="file"  <?php if(!in_array($ext,$arr_ext)){?>style="display: none;"<?php }?>>
    <label>Upload File</label>
    <?php
    $file = $c['Media']['file'];
    if($file)
    {
        $arr = explode('.',$file);
        $ext = end($arr);
        if(strtolower($ext) == 'pdf')
        {
            $class = 'fa-file-pdf-o';
        }
        else
        if(strtolower($ext) == 'pdf')
        {
            $class = 'fa-file-word-o';
        }
        else
        $class = 'fa-file-sound-0';
        
    }
    else
    $class='';
    ?>
    <input type="file" name="file" /> <span class="fa <?php echo $class?>"></span> <?php echo $file;?>
</div>
<div class="youtube" <?php if($c['Media']['youtube']==''){?>style="display: none;"<?php }?>>
    <label>Youtube Url</label>
    <textarea name="youtube"><?php echo $c['Media']['youtube'];?></textarea>
</div>
<hr />
<input type="submit" value="Edit" name="submit" class="btn btn-primary btn-large" />
</form>
<script>
$(function(){
    $('#myform').validate();
    $('#media_type').change(function(){
        $('#av').val('');
        var val = $(this).val();
        if(val == 'Print' || val == 'Publication')
        {
            $('.file').show();
            $('.av').hide();
            $('.youtube').hide();
        }
        else
        if(val == 'Audio-Visual')
        {
            $('.file').hide();
            $('.av').show();
            $('.youtube').hide();
        }
        else
        {
            $('.file').hide();
            $('.av').hide();
            $('.youtube').hide();
        }
        
    });
    $('#av').change(function(){
        var val = $(this).val();
        if(val == 'a')
        {
            $('.file').show();
            $('.youtube').hide();
                        
        }
        else
        if(val == 'v')
        {
            $('.file').hide();
            $('.av').hide();
            $('.youtube').show();
        }
        
    }); 
       
    
});

</script>
