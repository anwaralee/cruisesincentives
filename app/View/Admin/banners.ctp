
    <a href="javascript:void(0)" id="addmore" class="btn btn-primary">Add Banner</a>
    <form action="" method="post" id="myform">
    <div class="bannerlist" >
    
<?php 
$cnt =0;
foreach($banners as $banner){
    if($cnt >= $banner['Banner']['id'])
        $cnt =$cnt;
    else
        $cnt =$banner['Banner']['id'];
    ?>
    <div class="banner">
    <div class="bannerimg left" id="image_<?php echo $banner['Banner']['id'];?>">
    <img src="<?php echo $this->webroot;?>doc/thumb/<?php echo $banner['Banner']['file'];?>"  />
    </div>
    <div class="right banneropt">
    <label>Link (Optional)</label><input type="text" class="url" name="link[]" value="<?php echo $banner['Banner']['link'];?>" />
    <label>Opens in</label>
    <select  name="target[]">
    <option value="0" <?php echo ($banner['Banner']['target']=='0')?"selected='selected'":"" ?>>Same Window</option>
    <option value="1" <?php echo ($banner['Banner']['target']=='1')?"selected='selected'":"" ?>>New Window</option>
    </select>
    </div>
    <input type="hidden" name="file[]" class="required" id="file_<?php echo $banner['Banner']['id'];?>" value="<?php if(file_exists(APP."webroot/doc/thumb/".$banner['Banner']['file']))echo $banner['Banner']['file'];?>" />
    <div class="clear"></div>
    <hr />
    <a id="upload_<?php echo $banner['Banner']['id'];?>" class="btn btn-info" href="javascript:void(0);" accesskey="<?php echo $banner['Banner']['id'];?>">Browse</a> &nbsp; <a href="javascript:void(0)" class="recrop btn btn-primary" title="<?php echo $banner['Banner']['id'];?>" >Recrop</a><input type="hidden" id="image<?php echo $banner['Banner']['id'];?>" value="<?php echo $banner['Banner']['file'];?>" /> &nbsp; <a href="javascript:void(0);" style="display: none;" class="savecrop btn btn-inverse" id="savecrop<?php echo $banner['Banner']['id'];?>" title="<?php echo $banner['Banner']['id'];?>">Crop</a> &nbsp; <a href="javascript:void(0)" onclick="$(this).parent().remove();" class="btn btn-danger">Remove</a>
    
<script>
$(function(){
    
    initiate_ajax_upload('upload_<?php echo $banner['Banner']['id'];?>'); 
   
   
  
    });
    
</script>
  </div>

  
<?php }?>
</div>
<input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
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
<input type="hidden" name="added_on" value="<?php echo date('Y-m-d H:i:s');?>" />
</div>

<script>
$(function(){
    $('.savecrop').live('click',function(){
        var id = $(this).attr("title");
        //$('#image_<?php echo $banner['Banner']['id'];?>').html("");
       $.ajax({
            'url':'<?php echo $this->webroot;?>admin/savecrop',
            'type':'post',
            'data':'file='+$('#image'+id).val()+'&x='+$('.x').val()+'&y='+$('.y').val()+'&w='+$('.w').val()+'&h='+$('.h').val(),
            success:function(msg)
            {
                $('#image_'+id).html("<img src='<?php echo $this->webroot;?>doc/temp/thumb/"+msg+"' />");
                $('#file_'+id).val(msg);
                $('.crop').hide();
                $('#savecrop'+id).hide();
                $('.crop').dialog('close');
                $('#image'+id).val(msg);
                
            }
       }); 
    });
    var cn = "<?php echo $cnt;?>";
   $('#addmore').click(function(){
    cn = Number(cn)+Number(1);
    //alert(cn);
    $('.bannerlist').prepend('<div class="banner"><div class="bannerimg left" id="image_'+cn+'">'+
    '</div><div class="banneropt right"><label>Link (Optional)</label><input type="text" class="url" name="link[]" value="" />'+
    '<label>Opens in</label><select  name="target[]">'+
    '<option value="0" >Same Window</option>'+
    '<option value="1" >New Window</option></select></div><div class="clear"></div><hr/>'+
    '<a id="upload_'+cn+'" class="btn btn-info" href="javascript:void(0);">Browse</a> &nbsp; '+
    '<a href="javascript:void(0)" class="recrop btn btn-primary" title="'+cn+'" >Recrop</a> &nbsp; '+
    '<input type="hidden" name="file[]" id="image'+cn+'" value="" />'+ 
    '<a href="javascript:void(0);" style="display: none;" class="savecrop btn btn-inverse" id="savecrop'+cn+'" title="0">Crop</a> &nbsp; <a href="javascript:void(o)" onclick="$(this).parent().remove();" class="btn btn-danger">Remove</a>');
    $('.newr').hide();
    initiate_ajax_upload('upload_'+cn);
    
   })
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
    $('.crop .fields').html('<img src="<?php echo $this->webroot.'doc/temp/'?>'+$("#image"+$(this).attr('title')).val()+'" style="max-width:1000px;" id="tocrop"/>');
    $('#tocrop').Jcrop({
                    onSelect: showCoords,
                    onChange: showCoords,
                    bgColor:     'black',
                    bgOpacity:   .4,
                    setSelect:   [ 0, 0, 300, 180 ],
                    aspectRatio: 300 / 180,
                        minSize: [300,180]
                    
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
            action: '<?php echo $this->webroot.'dashboard/upload'; ?>', 
             
            name: 'file',
            onSubmit : function(file, ext){
                // change button text, when user selects file
               			
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
                var id= button_id.replace("upload_","");
                
                if(id ==0)
                $('.newr').show();//alert(id);
                //alert(response);
                    button.text('Upload');
                    window.clearInterval(interval);
					
                    // enable upload button
                    this.enable();
                    
                    $('#savecrop'+id).show();
                    $('.crop').show();
                    $('.savecrop').attr('title',id);
                    $('.crop').dialog({width:'auto',resizable: false,
                         modal: true,});
                     $('.crop .fields').html('<img src="<?php echo $this->webroot.'doc/temp';?>/'+response+'" style="max-width:1000px;" id="tocrop"/>');
                    $('#tocrop').Jcrop({
                        onSelect: showCoords,
                        onChange: showCoords,
                        bgColor:     'black',
                        bgOpacity:   .4,
                        setSelect:   [ 0, 0, 300, 180 ],
                        aspectRatio: 300 / 180,
                        minSize: [300,180]
                        
                    });
                    //$('.thumb').html('<img src="<?php echo $this->webroot.'doc';?>/'+response+'" style="width:350x;"/>');
                    $('#image'+id).val(response);
                    $('.image').val(response);
                    $('.nu').val('1');               
                }
                		
            });
        
        }
</script>