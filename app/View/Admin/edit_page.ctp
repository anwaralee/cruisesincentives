<div class="floatLeft sidebar">
<ul>
<li class="titles">PAGES</li>
<?php 
$pages = $this->requestAction('/admin/pages');
if($pages) 
{

$i=0;
foreach($pages as $p)
{
    $i++;
    ?>

    <li class="<?php if($content['Page']['id']==$p['Page']['id'])echo "active";?>">
        <a href="<?php echo $this->webroot; ?>admin/editPage/<?php echo $p['Page']['id'];?>"><?php echo $p['Page']['title']?></a>
    </li>
    <?php 
}

 }
 else echo "<li>No Pages Found</li>"; 
?>
</ul>
</div>
<div class="floatRight contentRight">
        <?php
        
            $c = $content;
            
        ?>
        <h1 class="mytitle">Edit Page - <?php echo $c['Page']['title'];?></h1>
        <form action="<?php echo $this->webroot; ?>admin/editPage/<?php echo $c['Page']['id']; ?>" method="post" id="myform">
        <div class="images"></div>
        <label>Page Title</label>
        <input type="text" value="<?php echo $c['Page']['title'];?>" name="title" class="required" />
        <label>Page Description</label>
        <textarea name="description" class="CKEDITOR required" id="ck"><?php echo $c['Page']['description'];?></textarea>
        <label>SEO Title</label>
        <input type="text" value="<?php echo $c['Page']['seo_title'];?>" name="seo_title" class="" />
        <label>SEO Description</label>
        <textarea name="seo_desc" class="" ><?php echo $c['Page']['seo_desc'];?></textarea>
        <div class="pdfs">
        <div class="pdf floatLeft"><?php echo $c['Page']['pdf'];?></div><a href="javascript:void(0);" class="btn btn-danger floatLeft marLeft10" id="remove" style="display: <?php if($c['Page']['pdf']=="")echo "none";?>;">Remove</a>
        <div class="clearfix"></div>
        <a href="javascript:void(0);" class="btn btn-info uploadbtn" id="upload"> Upload Pdf</a>
        
        </div>
        <input type="hidden" name="pdf" value="<?php echo $c['Page']['pdf'];?>" id="pdf" />
        <hr />
         
        <input type="submit" value="Save" name="submit" class="btn btn-primary" />
        </form>
</div>
<div class="clear"></div>





<script type="text/javascript">
        	var CustomHTML = CKEDITOR.replace( 'ck');
                CKFinder.setupCKEditor( CustomHTML, '<?php echo $this->webroot;?>js/ckfinder/' );
        </script>
<script>
$(function(){
   $('#myform').validate();
   initiate_ajax_upload('upload'); 
   $('.images').load('<?php echo $this->webroot;?>admin/add_images/pages/<?php echo $c['Page']['id'];?>');
   $('#remove').click(function(){
    $.ajax({
        'url':'<?php echo $this->webroot;?>admin/del_pdf/page/<?php echo $c['Page']['id'];?>',
        'success':function(msg){
            
                $('#pdf').val("");
                $('.pdf').html("");
                $('#remove').hide();
            
        }
    })
       
   });
});
function initiate_ajax_upload(button_id){
        
        var button = $('#'+button_id), interval;
        new AjaxUpload(button,{
            action: '<?php echo $this->webroot.'dashboard/upload_pdf'; ?>', 
             
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
                if(ext == "pdf")		
                {
                    return true;
                }
                else
                {
                       alert("Please Select a Pdf file.");
                    return false;
                }
                
                
            },
            onComplete: function(file, response){
               
                    button.text('Upload Pdf');
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
