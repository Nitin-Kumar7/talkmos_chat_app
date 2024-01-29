<?php
    $mysession = $_SESSION['uniqueid'];
    $count = count($data);
  
    $time ='';
     

    for($i = 0; $i < $count; $i++){
        if($data[$i]['sender_message_id'] == $mysession){
            $time =messageTime($data[$i]['time']);
           
            
        ?>
      
            <div id="receiver_msg_container">
                <div id="receiver_msg" class="receiver_msg findimage">
                        <p class="m-0 messagebox" id="receiver_ptag">
                            <?php echo $data[$i]['message'];
                            
                            ?>
                           
                            
                        </p>
                       <span class="receiver_msgtime">
    <?php echo $time; ?>
    <span>
        <?php if ($data[$i]['seen']) { ?>
            <i class="fa-thin fa fa-check-double"></i>
        <?php } else { ?>
            <i class="fa-thin fa fa-check"></i>
        <?php } ?>
    </span>
</span>

                </div>
              
                <div id="receiver_image" style="background-size: 100% 100%; background-image:url('<?php echo './upload/'. $_SESSION['user_avtar'];?>')"></div>
            </div>
        <?php 
        }else{
          
        ?><div id="sender_msg_container">
                <div id="sender_image" style="background-size: 100% 100%; background-image:url('<?php echo  $user_avtar;?>')"></div>
                <div id="sender_msg" class="sender_msg findimage" >
                    <p class="m-0 messagebox" id="receiver_ptag">
                        <?php echo $data[$i]['message'];?>
                       
                    </p>
                    <span class="sender_msgtime"><?php   echo $time;?></span>
                </div>
            </div>
        <?php
        }
    }
?>
<script>
    
   if ($('.user_details ').find('img').length) {
   
      $('.findimage').css('backgroud-color','unset')
 
 
    $('.user_image').replaceWith(function() {
     return $('<span>', {html: $(this).html('file')});
});
  
} else {
 
}


</script>


