
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
                <li><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/preview">Preview</a></li>
                <li><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/test">Test</a></li>
                <li class="active"><a href="<?php echo $this->webroot;?>admin/newsletters/<?php echo $news['Newsletter']['id'];?>/send">Send</a></li>
            </ul>
            <hr />
            <a href="javascript:void(0)" onclick="$('#subs').submit();" class="btn btn-info">Send Selected</a> <a href="<?php echo $this->webroot;?>admin/newsletter_sendall/<?php echo $news['Newsletter']['id'];?>" class="btn btn-info">Send All</a>
            <hr />
            <p>
            <form id="subs" action="<?php echo $this->webroot;?>admin/newsletter_send/<?php echo $news['Newsletter']['id'];?>" method="post" class="test">
            <?php
            if($subscriber){ 
            ?>
            <table class="table table-striped">
                <?php
                $i=0;
                foreach($subscriber as $s)
                {
                    $i++;
                    if(($i-1)%3==0)
                    {
                        echo "<tr>";
                    }
                    ?>
                    <td><input style="margin-top: 0;" type="checkbox" name="s[]" value="<?php echo $s['Subscriber']['email'];?>" /> <?php echo $s['Subscriber']['email'];?></td>
                    <?php
                    if(($i)%3==0)
                    {
                        echo "</tr>";
                    }
                    ?>
                    
                    <?php
                    
                }
                if(($i-1)%3==0)
                    {
                        echo "<td></td><td></td></tr>";
                    }
                    if(($i+1)%3==0)
                    {
                        echo "<td></td></tr>";
                    }
                ?>
                
            </table>
            <?php }?>
            </form>
            </p>
            <?php
        }
        ?>
</aside>

<div class="clear"></div>
