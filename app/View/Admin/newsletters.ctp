
<aside class="sidebar floatLeft">
<ul>
<li class="titles">Newsletters</li>
<?php
if($nl) 
foreach($nl as $n)
{?>
    <li><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $n['Newsletter']['id'];?>"><?php echo $n['Newsletter']['title'];?></a></li>
<?php 
}?>
</ul>
</aside>
<aside class="contentRight floatRight" >
    	<?php
        if(isset($id_newsletter))
        {
         if(!isset($news))
         {
            $news['Newsletter']['title'] = '';
            $news['Newsletter']['description'] = '';
            $news['Newsletter']['news_id'] = '';
            $news['Newsletter']['attachment'] = '';
            $news['Newsletter']['attachment_title'] = '';
            $news['Newsletter']['pub_date'] = '';
            $news['Newsletter']['id'] = 0;
         }
            
            ?>
            <ul class="subnav">
                <li<?php if($page=='info'){?> class="active"<?php }?>><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/info">Newsletter Info</a></li>                
                <li><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/preview">Preview</a></li>
                <li><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/test">Test</a></li>
                <li><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/send">Send</a></li>
            </ul>
            <hr />
            <form id="myform" action="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/<?php echo $page;?>" method="post">
            <label>Newsletter title</label>
            <input type="text" name="title" value="<?php echo $news['Newsletter']['title'];?>" />
            <label>Newsletter Body</label>
            <textarea name="description" class="CKEDITOR required" id="ck"><?php echo (isset($news)&& $news['Newsletter']['description']!="")?$news['Newsletter']['description']:""; ?></textarea>
            <script type="text/javascript">
            	var CustomHTML = CKEDITOR.replace( 'ck');
                CKFinder.setupCKEditor( CustomHTML, '<?php echo $this->webroot;?>js/ckfinder/' );
            </script>
            <hr />
            <label>Publish Date</label>
            <input type="text" class="datepicker" name="pub_date" value="<?php echo $news['Newsletter']['pub_date'];?>" />
            
            <label>Attachments: Anything you want to include in the e-mail</label>            
            <a id="upload" class="btn btn-info" href="javascript:void(0);" >Upload Doc</a> <span class="attachment_titles"><?php echo $news['Newsletter']['attachment_title'];?></span>
            <input type="hidden" name="attachment_title" class="attachment_title" value="<?php echo $news['Newsletter']['attachment_title'];?>" />
            <input type="hidden" name="attachment" class="attachment" value="<?php echo $news['Newsletter']['attachment'];?>" />
            <hr />
            <h3 class="mytitle">Add News/Deals</h3>
            <a href="javascript:void(0);" class="btn btn-success" id="add_art">ADD ARTICLE</a> 
            &nbsp;
            <select id="art_deal">
                <option value="">Choose News/Deals</option>
                <?php
                if($news_deals)
                {
                    foreach($news_deals as $nd)
                    {
                        ?>
                        <option value="<?php echo $nd['News']['id'];?>"><?php echo $nd['News']['title'];?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <input type="hidden" class="art_hidden" name="news_id" value="<?php echo $news['Newsletter']['news_id'];?>" />
            <div class="news-append" <?php if(!$news['Newsletter']['news_id']){?>style="display: none;"<?php }?>>
                
            </div>
            <hr />
            <input type="submit" value="Submit" class="btn btn-primary" />
            </form>
            <?php
        }
        else
        {
            ?>
            <a href="<?php echo $this->webroot.'admin/newsletters/0'?>" class="btn btn-info">+Add Newsletter</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <?php
        }
        ?>
</aside>

<div class="clear"></div>
<script>
$(function(){
    initiate_ajax_upload('upload');
    function initiate_ajax_upload(button_id){
        
        var button = $('#'+button_id), interval;
        new AjaxUpload(button,{
            action: '/cruisesincentives/admin/upload', 
             
            name: 'file',
            onSubmit : function(file, ext){
              // change button text, when user selects file
                
               	if(ext == "pdf" || ext == "PDF" || ext =="doc" || ext =="docx" || ext =="xls" || ext =="xlsx" || ext =="DOC" || ext== "DOCX" || ext=="XLS" || ext=="XLSX" ||ext=='txt' ||ext=='TXT')		
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
                    button.text('Upload Doc');
                    window.clearInterval(interval);
                    $('.attachment_title').val(file);
                    $('.attachment_titles').text(file);
                    $('.attachment').val(response);
					
                    // enable upload button
                    this.enable();
                    
                                   
                }
                		
            });
        
        }
    
    <?php if($news['Newsletter']['news_id']){?>
    $.ajax({
        
       url:'<?php echo $this->webroot;?>'+'admin/loadnews/',
       data:'id=<?php echo $news['Newsletter']['news_id'];?>',
       type:'post',
       success:function(res)
       {
        $('.news-append').html('');
        $('.news-append').html(res);
       } 
    });
    <?php }?>
   $('#add_art').click(function(){
    
    var val = $('#art_deal').val();
    
    if(val)
    {
        $('#art_deal option').each(function(){
            //alert($(this).val()+'_'+val);
           if($(this).val()==val)
           $(this).remove();
           
        });
        var ids = $('.art_hidden').val();
        if($('.art_hidden').val()=='')
        $('.art_hidden').val(val);
        else
        $('.art_hidden').val(ids+','+val);
        $.ajax({
        
       url:'<?php echo $this->webroot;?>'+'admin/loadnews/',
       data:'id='+val,
       type:'post',
       success:function(res)
       {
        $('.news-append .loader').remove();
        $('.news-append').show();
        $('.news-append').append(res);
       } 
    }); 
    }
   }); 
   $('.datepicker').datepicker({
    dateFormat:'yy-mm-dd'
   }); 
});
</script>