<p>Let's Talk it Out</p> 
 
 <section class="header">
     <div class="container-xxl ">
         <div class="row">
             <nav class="navbar navbar-light ">
                 <div class="container-fluid">
                     <a class="navbar-brand" href="#"><img src="<?php echo base_url()?>assets/images/logos.png"></a>
                 </div>
             </nav>
         </div>
     </div>

     <section class="choose">
         <div class="container-xxl">
             <div class="row">


                 <div class="col-md-4 text-center">
                     <div class="choose-left">
                         <h3>Great!</h3>
                         <p>Let's Talk it Out</p>


                     </div>
                     <!-- Tab panes -->
                     <?php $userdata =$this->session->userdata(); ?>
                     <div class="tab-content ">
                         <div id="home" class=" tab-pane active">
                             <img src="<?php echo base_url('upload/'.$userdata['user_avtar'])?>" />
                         </div>
                         <h6 class="text-white"> <?php echo  strtoupper($userdata['user_name']); ;?></h6>



                     </div>
                     <div class="magamind">

                         <ul>
                             <li class="active">
                                 <a href="#">
                                     <h5>Talk to Someone</h5>
                                     <h6>Speak freely, stay anonymous.</h6>
                                 </a>
                             </li>
                             <li>
                                 <a href="#">
                                     <h5>Talk to Self</h5>
                                     <h6>Your Personal Diary</h6>

                                 </a>
                             </li>
                             <li>
                                 <a href="#">
                                     <h5>Talk to Universe</h5>
                                     <h6>Silent shouts to cosmos.</h6>

                                 </a>
                             </li>
                         </ul>
                         <a class="nxt-btn" href="#">Start now</a>
                     </div>


                 </div>
                 <div class="col-md-8">
                     <div class="kawali-box-1">
                         <h4>Anomynous Chat Box </h4>
                         <img class="chat" src="<?php echo base_url()?>assets/images/chat-img.png">

                         <div id="selectToTalk_userlist" class="text-white">
                       
                         </div>
                     </div>

                 </div>


             </div>
         </div>
     </section>