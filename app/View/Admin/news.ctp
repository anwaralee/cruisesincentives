<aside class="left_body floatLeft">
<div class="line"></div>
<h1><span class="green"> News/Deals </span></h1>
<ul>
<?php foreach($allnews as $n)
{?>
    <li><a href="<?php echo $this->webroot;?>admin/news/<?php echo $n['News']['id'];?>"><?php echo $n['News']['title'];?></a></li>
<?php 
}?>
</ul>
</aside>
<aside class="right_body floatRight" >
<?php if($id != ""){?>
<h3><?php echo ($id == "add")? "Add":"Edit"; ?> News or Deals </h3>
<form action="<?php echo $this->webroot; ?>admin/news/<?php echo (isset($news)&& ($news['News']['id']!=""))?$news['News']['id']:"add"; ?>" method="post" id="myform">
<label><strong>Banner Image</strong></label>
<div class="thumb" style="margin-bottom: 5px;"><?php if(isset($news)&& $news['News']['banner']!="" && file_exists(APP."webroot/doc/thumb/".$news['News']['banner'])){?><img src="<?php echo $this->webroot.'doc/thumb/'.$news['News']['banner'];?>"/><?php }?></div>
<a id="upload" class="btn btn-info" href="javascript:void(0);" >Browse </a>
<a href="javascript:void(0);" class="recrop btn btn-primary" style="display: <?php echo (isset($news)&& $news['News']['banner']!="" && file_exists(APP."webroot/doc/thumb/".$news['News']['banner']))?'':'none'?>;" >Recrop</a>
<?php if(isset($news)&& $news['News']['banner']!="" && file_exists(APP."webroot/doc/thumb/".$news['News']['banner'])){?>
<a href="javascript:void(0);" class="btn btn-danger" id="remove" >Remove</a><?php }?>
<input type="hidden" name="banner" value="<?php echo (isset($news)&& $news['News']['banner']!="" &&file_exists(APP."webroot/doc/thumb/".$news['News']['banner']))?$news['News']['banner']:""; ?>" id="image" />
<label>Title</label>
<input type="text" value="<?php echo (isset($news)&& $news['News']['title']!="")?$news['News']['title']:""; ?>" name="title" class="required" />
<label>Description</label>
<textarea name="desc" class="CKEDITOR required" id="ck"><?php echo (isset($news)&& $news['News']['desc']!="")?$news['News']['desc']:""; ?></textarea>
<script type="text/javascript">
	var CustomHTML = CKEDITOR.replace( 'ck');
                        CKFinder.setupCKEditor( CustomHTML, '<?php echo $this->webroot;?>js/ckfinder/' );
</script>
<label>SEO Title</label>
<input type="text" value="<?php echo (isset($news)&& $news['News']['seo_title']!="")?$news['News']['seo_title']:""; ?>" name="seo_title" class="" />
<label>SEO Description</label>
<textarea name="seo_desc" class="" ><?php echo (isset($news)&& $news['News']['seo_desc']!="")?$news['News']['seo_desc']:""; ?></textarea>

<hr />
<input type="hidden" name="added_on" value="<?php echo date('Y-m-d H:i:s');?>" />
<input type="submit" value="<?php echo (isset($news)&& $news['News']['id']!="")?'Edit':'Add';?>" name="submit" class="btn btn-primary " />
<?php if(isset($news)&& $news['News']['id']!=""){ echo $this->Html->link("Delete","news_delete/".$news['News']['id'],array('class'=>'btn btn-danger'),"Confirm Delete News?");}?>
</form>
<div class="crop" style="display: none;">
<hr />
Select the area to crop.
<span class="savecrop  btn btn-inverse" >Crop</span>
<span class="btn " onclick="$('.crop').dialog('close');">Cancel</span>
<div class="fields"></div><div class="clear"></div>
<input type="hidden" name="x" class="x" value="" />
<input type="hidden" name="y" class="y" value="" />
<input type="hidden" name="w" class="w" value="" />
<input type="hidden" name="h" class="h" value="" />

<input type="hidden" name="nu" value="0" class="nu" />

</div>
<?php }
else
{?>
    <a href="<?php echo $this->webroot.'admin/news/add'?>" class="btn">Add News</a>
<?php }?>
</aside>

<div class="clear"></div>
<script>
$(function(){
    initiate_ajax_upload('upload');
    $('#remove').click(function(){
        $('#image').val("");
        $('.thumb').html("");
        $('.recrop').hide();
        $(this).hide();
         
    });
    $('.savecrop').live('click',function(){
        
       $.ajax({
            'url':'<?php echo $this->webroot;?>admin/savecrop/600',
            'type':'post',
            'data':'file='+$('#image').val()+'&x='+$('.x').val()+'&y='+$('.y').val()+'&w='+$('.w').val()+'&h='+$('.h').val(),
            success:function(msg)
            {
                $('.thumb').html("<img src='<?php echo $this->webroot;?>doc/temp/thumb/"+msg+"' />");
                $('#file').val(msg);
                $('.crop').hide();
                $('#savecrop').hide();
                $('.crop').dialog('close');
                $('#image').val(msg);
                $('.recrop').show();
                
            }
       }); 
    });
    
   $('#myform').validate();
   $('.recrop').live('click',function(){
    if($('#file_'+$(this).attr('title')).val()==""){
        alert("Image not selected");
        return false;
        }
    $('.crop').show();
    $('.crop').dialog({width:'auto',resizable: false,
            modal: true,});
    $('.savecrop').attr('title',$(this).attr('title'));
    $('.crop .fields').html('<img src="<?php echo $this->webroot.'doc/temp/'?>'+$("#image").val()+'" style="max-width:1000px;" id="tocrop"/>');
    $('#tocrop').Jcrop({
                    onSelect: showCoords,
                    onChange: showCoords,
                    bgColor:     'black',
                    bgOpacity:   .4,
                    setSelect:   [ 0, 0, 600, 250 ],
                        aspectRatio: 600 / 250,
                        minSize: [600,250]
                    
                });
         $('.nu').val('1');
   });
  
});
function showCoords(c)
  {
      // variables can be accessed here as
      // c.x, c.y, c.x2, c.y2, c.w, c.h
      $('.x').val(c.x);
      $('.y').val(c.y);
      $('.w').val(c.w);
      $('.h').val(c.h);
  };
function initiate_ajax_upload(button_id){
        
        var button = $('#'+button_id), interval;
        new AjaxUpload(button,{
            action: '<?php echo $this->webroot.'dashboard/upload/news'; ?>', 
             
            name: 'file',
            onSubmit : function(file, ext){
              // change button text, when user selects file
                
               	if(ext == "jpg" || ext == "GIF" || ext =="gif" || ext =="JPG" || ext =="png" || ext =="JPEG" || ext =="jepg" || ext== "PNG")		
                {
                    return true;
                }
                else
                {
                       alert("Invalid Image file");
                    return false;
                }
                button.text('Uploading');
	
                // If you want to allow uploading only 1 file at time,
                // you can disable upload button
                this.disable();
	
                // Uploding -> Uploading. -> Uploading...
                interval = window.setInterval(function(){
                    var text = button.text();
                    if (text.length < 13){
                        button.text(text + '.');					
                    } else {
                        button.text('Uploading');				
                    }
                }, 200);
            },
            onComplete: function(file, response){
                //alert(button_id);
                    
                //alert(response);
                    button.text('Upload');
                    if( response=='news')
                    {   alert('Invalid Image Dimension.Minmum image dimension: 600X250')
                        return false;
                    }
                    window.clearInterval(interval);
					
                    // enable upload button
                    this.enable();
                    
                    $('#savecrop').show();
                    $('.crop').show();
                    //$('.savecrop').attr('title',id);
                    $('.crop').dialog({width:'auto',resizable: false,
                         modal: true,});
                     $('.crop .fields').html('<img src="<?php echo $this->webroot.'doc/temp';?>/'+response+'" style="max-width:1000px;" id="tocrop"/>');
                    $('#tocrop').Jcrop({
                        onSelect: showCoords,
                        onChange: showCoords,
                        bgColor:     'black',
                        bgOpacity:   .4,
                        setSelect:   [ 0, 0, 600, 250 ],
                        aspectRatio: 600 / 250,
                        minSize: [600,250]
                        
                    });
                    //$('.thumb').html('<img src="<?php echo $this->webroot.'doc';?>/'+response+'" style="width:350x;"/>');
                    $('#image').val(response);
                    $('.image').val(response);
                    $('.nu').val('1');
                    $('#remove').show();               
                }
                		
            });
        
        }
</script>