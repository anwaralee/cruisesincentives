<aside class="left_body floatLeft">
<div class="line"></div>
<h1><span class="green"> Resource Center </span></h1>
<ul>
<?php foreach($resources as $resource)
{?>
    <li><a href="<?php echo $this->webroot;?>admin/resources/<?php echo $resource['Resource']['id'];?>"><?php echo $resource['Resource']['title'];?></a>
        </li>
<?php 
}?>
</ul>
</aside>
<aside class="right_body floatRight" >
<h1><?php if(isset($c) && $c['ResourcePdf']['id']!="")echo "Edit";else echo "Add";?> Pdf - <?php if(isset($title))echo $title;?></h1>
<form action="" method="post" id="myform">
<input type="hidden" name="resource_id" value="<?php echo $rid;?>" />
<label>Parent</label>
<select name="parent_id">
    <option value="0"> Parent</option>
    <?php foreach($pdfs as $pdf){?>
    <option value="<?php echo $pdf['ResourcePdf']['id'];?>" <?php if(isset($c) && $pdf['ResourcePdf']['id']!="" && $pdf['ResourcePdf']['id'] ==$c['ResourcePdf']['parent_id'] )echo "selected='selected'";?>><?php echo $pdf['ResourcePdf']['title'];?></option>    
    <?php
        }?>
</select>
<label>Resource Title</label>
<input type="text" value="<?php if(isset($c) && $c['ResourcePdf']['title']!="")echo $c['ResourcePdf']['title'];?>" name="title" class="required" />

<label>Pdf</label>  
<div class="pdf"><?php if(isset($c) && $c['ResourcePdf']['pdf']!="")echo $c['ResourcePdf']['pdf'];?></div>
<a href="javascript:void(0);" class="btn btn-danger" id="remove" style="display: <?php if((isset($c) && $c['ResourcePdf']['pdf']=="") || $id=='add')echo "none";?>;">Remove</a><br />
<a href="javascript:void(0);" class="btn btn-primary" id="upload">Upload</a>
<input type="hidden" name="pdf" value="<?php if(isset($c) && $c['ResourcePdf']['pdf']!="" && file_exists(APP."webroot/pdf/".$c['ResourcePdf']['pdf']))echo $c['ResourcePdf']['pdf'];?>" id="pdf" />
<hr />
 
<input type="submit" value="<?php if(isset($c) && $c['ResourcePdf']['id']!="")echo 'Edit'; else echo "Add";?>" name="submit" class="btn btn-primary" />
</form>
</aside>

<div class="clear"></div>
<script>
$(function(){
   $('#myform').validate();
   initiate_ajax_upload('upload'); 
   $('#remove').click(function(){
        $('#pdf').val("");
        $('.pdf').html("");
        $(this).hide();
   });
});
function initiate_ajax_upload(button_id){
        
        var button = $('#'+button_id), interval;
        new AjaxUpload(button,{
            action: '<?php echo $this->webroot.'dashboard/upload_pdf'; ?>', 
             
            name: 'file',
            onSubmit : function(file, ext){
              // change button text, when user selects file
                
               	if(ext == "pdf")		
                {
                    return true;
                }
                else
                {
                       alert("Please Select a Pdf file.");
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
               
                    button.text('Upload');
                    if( response=='news')
                    {   alert('Invalid Image Dimension.Minmum image dimension: 600X250')
                        return false;
                    }
                    window.clearInterval(interval);
					
                    // enable upload button
                    this.enable();
                   
                    $('#pdf').val(response);
                    $('.pdf').html(response);
                    $('#remove').show();               
                }
                		
            });
        
        }
</script>
