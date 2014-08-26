
    <a href="javascript:void(0)" id="addmore" class="btn btn-primary">Add Banner</a>
    <hr />
    <div class="left bannerlist" style="float: left;">
<?php 
foreach($banners as $banner){
    ?>
    <div class="banner">
    <div class="bannerimg left" id="image_<?php echo $banner['Banner']['id'];?>">
    <img src="<?php echo $this->webroot;?>doc/thumb/<?php echo $banner['Banner']['file'];?>"  />
    </div>
    <div class="right banneropt">
    <label>Link (Optional)</label><input type="text" name="link[]" value="<?php echo $banner['Banner']['link'];?>" />
    <label>Opens in</label>
    <select  name="target[]">
    <option value="0" <?php echo ($banner['Banner']['target']=='0')?"selected='selected'":"" ?>>Same Window</option>
    <option value="1" <?php echo ($banner['Banner']['target']=='1')?"selected='selected'":"" ?>>New Window</option>
    </select>
    </div>
    <div class="clear"></div>
    <hr />
    <a id="upload_<?php echo $banner['Banner']['id'];?>" class="btn btn-info" href="javascript:void(0);" accesskey="<?php echo $banner['Banner']['id'];?>">Browse</a> &nbsp; <a href="javascript:void(0)" class="recrop btn btn-primary" title="<?php echo $banner['Banner']['id'];?>" >Recrop</a><input type="hidden" name="file[]" id="image<?php echo $banner['Banner']['id'];?>" value="<?php echo $banner['Banner']['file'];?>" /> &nbsp; <a href="javascript:void(0);" style="display: none;" class="savecrop btn btn-inverse" id="savecrop<?php echo $banner['Banner']['id'];?>" title="<?php echo $banner['Banner']['id'];?>">Crop</a> &nbsp; <a href="javascript:void(0)" onclick="$(this).parent().remove();" class="btn btn-danger">Remove</a>
    
<script>
$(function(){
    
    initiate_ajax_upload('upload_<?php echo $banner['Banner']['id'];?>'); 
   
   
  
    });
    
</script>
  </div> 
<?php }?>
</div>
<div class="right" style="float: right;width:400px;margin-left:15px;">
<div class="crop" style="display: none;">
<hr />
<div class="savecrop label btn btn-inverse" >Crop</div><div class="fields"></div><div class="clear"></div>
<input type="hidden" name="x" class="x" value="" />
<input type="hidden" name="y" class="y" value="" />
<input type="hidden" name="w" class="w" value="" />
<input type="hidden" name="h" class="h" value="" />
<input type="hidden" name="file" class="image" value="" />
<input type="hidden" name="nu" value="0" class="nu" />
<input type="hidden" name="added_on" value="<?php echo date('Y-m-d H:i:s');?>" />
</div>
</div> 
<div class="clear"></div>   
<script>
$(function(){
    $('.savecrop').live('click',function(){
        var id = $(this).attr("title");
        //$('#image_<?php echo $banner['Banner']['id'];?>').html("");
       $.ajax({
            'url':'<?php $this->webroot;?>savecrop',
            'type':'post',
            'data':'file='+$('#image'+id).val()+'&x='+$('.x').val()+'&y='+$('.y').val()+'&w='+$('.w').val()+'&h='+$('.h').val(),
            success:function(msg)
            {
                $('#image_'+id).html("<img src='<?php echo $this->webroot;?>doc/temp/thumb/"+msg+"' />");
                $('.crop').hide();
                $('#savecrop'+id).hide();
            }
        
       }); 
    });
   $('#addmore').click(function(){
    $('.bannerlist').prepend('<div class="banner"><div class="bannerimg left" id="image_0">'+
    '</div><div class="banneropt right"><label>Link (Optional)</label><input type="text" name="link[]" value="" />'+
    '<label>Opens in</label><select  name="target[]">'+
    '<option value="0" >Same Window</option>'+
    '<option value="1" >New Window</option></select></div><div class="clear"></div><hr/>'+
    '<a id="upload_0" class="btn btn-info" href="javascript:void(0);">Browse</a> &nbsp; '+
    '<a href="javascript:void(0)" class="recrop btn btn-primary" title="0" >Recrop</a> &nbsp; '+
    '<input type="hidden" name="file[]" id="image0" value="" />'+ 
    '<a href="javascript:void(0);" style="display: none;" class="savecrop btn btn-inverse" id="savecrop0" title="0">Crop</a> &nbsp; <a href="javascript:void(0)" onclick="$(this).parent().remove();" class="btn btn-danger">Remove</a>');
    
    initiate_ajax_upload('upload_0');
    
   })
   $('#myform').validate();
   $('.recrop').live('click',function(){
    $('#savecrop'+$(this).attr('title')).show();
    $('.crop').show();
    $('.crop .fields').html('<img src="<?php echo $this->webroot.'doc/'?>'+$("#image"+$(this).attr('title')).val()+'" style="max-width:1000px;" id="tocrop"/>');
    $('#tocrop').Jcrop({
                    onSelect: showCoords,
                    onChange: showCoords,
                    bgColor:     'black',
                    bgOpacity:   .4,
                    setSelect:   [ 0, 0, 580, 195 ],
                    aspectRatio: 580 / 195,
                        minSize: [580,195]
                    
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
                //alert(id);
                //alert(response);
                    button.text('Upload');
                    window.clearInterval(interval);
					
                    // enable upload button
                    this.enable();
                    
                    $('#savecrop'+id).show();
                    $('.crop').show();
                     $('.crop .fields').html('<img src="<?php echo $this->webroot.'doc';?>/'+response+'" style="max-width:1000px;" id="tocrop"/>');
                    $('#tocrop').Jcrop({
                        onSelect: showCoords,
                        onChange: showCoords,
                        bgColor:     'black',
                        bgOpacity:   .4,
                        setSelect:   [ 0, 0, 580, 195 ],
                        aspectRatio: 580 / 195,
                        minSize: [580,195]
                        
                    });
                    $('.thumb').html('<img src="<?php echo $this->webroot.'doc';?>/'+response+'" style="width:350x;"/>');
                    $('#image'+id).val(response);
                    $('.image').val(response);
                    $('.nu').val('1');               
                }
                		
            });
        
        }
</script>