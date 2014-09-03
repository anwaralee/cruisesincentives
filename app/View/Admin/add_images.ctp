<script>
$(function(){
    var p = '<?php echo $this->params['pass'][0];?>';
    initiate_ajax_upload('uploads');
    $('.remove').live('click',function(){
        var file = $(this).attr('title');
        var id = $(this).attr('id');
        $.ajax({
        'url':'<?php echo $this->webroot;?>admin/del_img/'+p+'/'+file+"/"+id,
        'success':function(msg){
            if(msg == "OK"){
                
            }
        }
    });
    $(this).parent().remove();
    });
});
function initiate_ajax_upload(button_id){
        
        var button = $('#'+button_id), interval;
        new AjaxUpload(button,{
            action: '<?php echo $this->webroot.'dashboard/upload/images'; ?>', 
             
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
                    button.text('+ Add Images');
                    if( response=='images')
                    {   alert('Invalid Image Dimension.Minmum image dimension: 193X163')
                        return false;
                    }
                    window.clearInterval(interval);
					
                    // enable upload button
                    this.enable();
                    $('.thumbs').prepend('<div style="float:left; margin-right:10px;margin-bottom:5px;"><img src="<?php echo $this->webroot.'doc';?>/temp/thumb/'+response+'" style="display: block;margin-bottom: 5px;height:110px;" /><input type="hidden" name="images[]" value="'+response+'"/><br/><a href="javascript:void(0);" class="btn btn-danger remove" title="'+response+'">Remove</a></div>');
                    
                                   
                }
                		
            });
        
        }
</script>
<div class="thumbs" style="margin-bottom: 5px;">
<?php foreach($images as $i){?>
    <div style="float:left; margin-right:10px;margin-bottom:5px;">
        <img src="<?php echo $this->webroot.'doc/thumb1/'.$i['Image']['file'];?>" style="display: block;margin-bottom: 5px;height:110px;" />
        <input type="hidden" name="images[]" value="<?php echo $i['Image']['file'];?>"/>
        <a href="javascript:void(0);" id="<?php echo $i['Image']['id'];?>" class="btn btn-danger remove" title="<?php echo $i['Image']['file'];?>">Remove</a>
    </div>
<?php }?>
<div class="clear"></div>
</div>

<a id="uploads" class="btn btn-info" href="javascript:void(0);" >+ Add Images </a>
<hr />