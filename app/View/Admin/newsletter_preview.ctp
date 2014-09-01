
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
                <li><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/info">Newsletter Info</a></li>                
                <li class="active"><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/preview">Preview</a></li>
                <li><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/test">Test</a></li>
                <li><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/send">Send</a></li>
            </ul>
            <hr />
            <strong><a target="_blank" href="<?php echo $this->webroot;?>newsletters/preview/<?php echo $id_newsletter;?>">Click</a> </strong> - To view the newsletter in the new tab.
            <?php
        }
        ?>
</aside>

<div class="clear"></div>
