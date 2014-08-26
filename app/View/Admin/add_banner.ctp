<h1>Add Banner</h1>

<form action="<?php echo $this->webroot; ?>admin/add_banner" method="post" id="myform" enctype="multipart/form-data">

<label>Upload Image : </label><a id="upload" class="btn btn-info" href="javascript:void(0);">Upload</a> Minimum size 368 X 264
<label>Link:</label>
<input type="text" value="" name="link" />
<hr />

<input type="hidden" name="file" class="image" value="" />
<div class="thumb" style="margin: 10px 0;"></div>
<input type="submit" value="Save" name="submit"  class="btn btn-primary btn-large" />
<div class="crop" style="display: none;">
<hr />
<div class="label">Crop</div><div class="fields"></div><div class="clear"></div>
<input type="hidden" name="x" class="x" value="" />
<input type="hidden" name="y" class="y" value="" />
<input type="hidden" name="w" class="w" value="" />
<input type="hidden" name="h" class="h" value="" />
<input type="hidden" name="image" class="image" value="" />
<input type="hidden" name="nu" value="0" class="nu" />
<input type="hidden" name="added_on" value="<?php echo date('Y-m-d H:i:s');?>" />
</div>
</form>

<script>
$(function(){
   initiate_ajax_upload('upload'); 
   
   $('#myform').validate();
   $('#recrop').click(function(){
    $('.crop').show();
    $('.crop .fields').html('<img src="<?php echo $this->webroot.'doc/';?>" style="max-width:1000px;" id="tocrop"/>');
    $('#tocrop').Jcrop({
                                onSelect: showCoords,
                                onChange: showCoords,
                                bgColor:     'black',
                                bgOpacity:   .4,
                                setSelect:   [ 0, 0, 430, 270 ],
                                aspectRatio: 215 / 135,
                                minSize: [430,270]
                                
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
                        //alert(response);
                            button.text('Upload');
                            window.clearInterval(interval);
    						
                            // enable upload button
                            this.enable();
                            $('.crop').show();
                             $('.crop .fields').html('<img src="<?php echo $this->webroot.'doc';?>/'+response+'" style="max-width:1000px;" id="tocrop"/>');
                            $('#tocrop').Jcrop({
                                onSelect: showCoords,
                                onChange: showCoords,
                                bgColor:     'black',
                                bgOpacity:   .4,
                                setSelect:   [ 0, 0, 430, 270 ],
                                aspectRatio: 215 / 135,
                                minSize: [430,270]
                                
                            });
                            $('.thumb').html('<img src="<?php echo $this->webroot.'doc';?>/'+response+'" style="width:350x;"/>');
                            
                            $('.image').val(response);
                            $('.nu').val('1');               
                        }
                        		
                    });
                
            }

</script>