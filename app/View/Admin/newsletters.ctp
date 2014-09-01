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
        if(isset($news))
        {
            ?>
            <ul class="subnav">
                <li<?php if($page=='info'){?> class="active"<?php }?>><a href="">Newsletter Info</a></li>                
                <li><a href="#">Preview</a></li>
                <li><a href="#">Test</a></li>
                <li><a href="#">Send</a></li>
            </ul>
            <hr />
            <form id="myform" action="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/<?php echo $page;?>" method="post">
            <label>Newsletter title</label>
            <input type="text" name="title" value="<?php echo $news['Newsletter']['title'];?>" />
            <label>Newsletter Body</label>
            <textarea name="desc" class="CKEDITOR required" id="ck"><?php echo (isset($news)&& $news['Newsletter']['description']!="")?$news['Newsletter']['description']:""; ?></textarea>
            <script type="text/javascript">
            	var CustomHTML = CKEDITOR.replace( 'ck');
                CKFinder.setupCKEditor( CustomHTML, '<?php echo $this->webroot;?>js/ckfinder/' );
            </script>
            <hr />
            <label>Publish Date</label>
            <input type="text" class="datepicker" name="pub_date" value="<?php echo $news['Newsletter']['pub_date'];?>" />
            
            <label>Attachments: Anything you want to include in the e-mail</label>
            <a href="#" class="btn btn-info">Upload File</a>
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
        ?>
</aside>

<div class="clear"></div>
<script>
$(function(){
    $('.news-append').html('<?php echo $this->webroot;?>images/ajax-loader.gif');
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
            alert($(this).val()+'_'+val);
           if($(this).val()==val)
           $(this).remove(); 
        });
        var ids = $('.art_hidden').val();
        if($('.art_hidden').val()=='')
        $('.art_hidden').val(val);
        else
        $('.art_hidden').val(ids+','+val);
    }
   }); 
   $('.datepicker').datepicker({
    dateFormat:'yy-mm-dd'
   }); 
});
</script>