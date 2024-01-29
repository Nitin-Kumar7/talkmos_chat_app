<?php
 
if (isset($_SESSION)) {
    $user_avtar = $_SESSION['user_avtar'];
    $name = $data[0]['user_name'];
}
 

?>
<style>
#textBox_attachment_emoji_container {
    position: relative;
}

#emojitabs {
    position: absolute;
    bottom: 3rem;
    width: 19rem;
    left: 0;
    background: white;
cursor:pointer;
    padding: 10px;

}
@media(max-width: 990px) {
      .top_header_cls {
        width: 100% !important;
        background:#282a37 !important;
    }
    .top_header_cls {
        width: 100% !important;
    }
  }     
  .container-xxl{
      background: #282a37;
  }     
#long-desc{padding:15px;}
</style>

<!-- _________Main Chat Type Screen start________ -->

 
<section id="main" style="display: none;">
    <div id="chat_user_list">
        <div id="owner_profile_details">
            <div id="owner_avtar"
                style="background-image: url('./upload/<?php   echo   $user_avtar; ?>'); background-size: 100% 100%">
                <div>
                    <div class="online" ></div>
                </div>
            </div>
            <div id="owner_profile_text" class="">
                <h6 id="owner_profile_name" class="text-white m-0 p-0"><?php echo $name; ?></h6>
               

                <!-- <a class="text-decoration-none" href="javascript:void(0)" id="logout" style="color:#e86663;"><i class="fa fa-power-off"></i> Logout</a> -->
            </div>
     <!--           <div id="bio">-->
					<!--  <input type="range" id="volumeSlider" min="0" max="1" step="0.1" value="0.5">-->
					<!--</div>  -->
        </div>
        <div class="row">
            <div class="px-5">
                <div class="langugae-box">
                    <div class="sltc-lng d-flex">
                        <label>Gender</label>
                        <select class="form-select " id="selectGender"    aria-label=".form-select-lg example">
                        <option value="">All</option>
                            <option  value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="sltc-lng d-flex">
                        <label>Language</label>
                        <select class="form-select  select-lg"  id="selectlanguage"    aria-label=".form-select-lg example">
                            <option value="">All</option>
                              <option value="en">English</option>
                                    <option value="हिन्दी">हिन्दी</option>
                                    <option value="Français">Français</option>
                                    <option value="Español">Español</option>
                                    <option value="Deutsch">Deutsch</option>
                                    <option value="Italiano">Italiano</option>
                                    <option value="日本語">日本語</option>
                                    <option value="한국어">한국어</option>
                                    <option value="Português">Português</option>
                                    <option value="Русский">Русский</option>
                                    <option value="中文 (简体)">中文 (简体)</option>
                                    <option value="中文 (繁體)">中文 (繁體)</option>
                                    <option value="العربية">العربية</option>
                                    <option value="বাংলা">বাংলা</option>
                                    <option value="Kiswahili">Kiswahili</option>
                                    <option value="Telugu">Telugu</option>
                                    <option value="Assamese">Assamese</option>
                                    <option value="Konkani">Konkani</option>
                                    <option value="Gujarati">Gujarati</option>
                                    <option value="Kannada">Kannada</option>
                                    <option value="Malayalam">Malayalam</option>
                                    <option value="Marathi">Marathi</option>
                                    <option value="Manipuri">Manipuri</option>
                                    <option value="Mizo">Mizo</option>
                                    <option value="Odia">Odia</option>
                                    <option value="Punjabi">Punjabi</option>
                                    <option value="Nepali">Nepali</option>
                                    <option value="Sikkimese">Sikkimese</option>
                                    <option value="Lepcha">Lepcha</option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="Bengali">Bengali</option>
                                    <option value="Kokborok">Kokborok</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>

  
        <div class="ast-schs">
        <div class="input-group">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search"
                    aria-hidden="true"></i></button>
            <input type="text" style="background: #181A1C;border: none; border-radius: 20px;" name="txt_search" class="form-control search"
                autocomplete="off" placeholder="Search User" id="search">

        </div>
        </div>
        <hr />
        <div id="user_list"  class="py-3  userliststyle " >
        </div>
    </div>
    
    <!--to change mode-->
    <div class="text-center w-25  hideUniversemode top_header_cls" style="background:#20232B;">
			  <div class="choose-left mt-5">
				<h3 id="mode">Self Mode</h3>
				<p id="modetype">You Are In Talk To Self Mode</p>
				<h6 id="short-desc">Your Personal Diary</h6>
				<h6 id="long-desc">Talk to Self provides a private haven for your thoughts, allowing you to jot down personal messages, reflections, and lessons learned through life's challenges. Like a digital journal, these messages remain exclusively visible to you, offering a space for self-expression, introspection.</h6>
			  </div>
			  <!-- Tab panes -->
	  
			  <div class="tab-content mt-5">
			  </div>
				 
				 
    <!--<div class="magamind showModeTab " >

                    <ul>
                        <li >
                            <a   href="javascript:void(0)" class=" universe0"   data-universe="0">
                                <h5>Talk to Someone</h5>
                                <h6>Speak freely, stay anonymous.</h6>
                            </a>
                        </li>
                        <li class="active">
                            <?php if(isset($_SESSION) && (isset($_SESSION['uniqueid']) && isset($_SESSION['user_avtar']))){
                                    $uniqueid =$_SESSION['uniqueid'];
                                    $user_avtar =$_SESSION['user_avtar'];
                                    }?>

                            <a href="javascript:void(0)" class="selfuser" data-user_avtar="<?php echo   $user_avtar?>"
                                data-uniqueid="<?php echo   $uniqueid?>" data-universe="2">
                                <h5>Talk to self</h5>
                                <h6>Your Personal Diary</h6>

                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="selfuser" data-user_avtar="<?php echo   $user_avtar?>"
                                data-uniqueid="<?php echo  $uniqueid?>" data-universe="1">

                                <h5>Talk to universe</h5>
                                <h6>Silent shouts to cosmos.</h6>

                            </a>
                        </li>
                    </ul>

                </div>-->
    	  </div>
    <!-- _________chatbox________ -->
    <div id="chatbox">
        <div id="data_container" class="">
            <div id="bg_image"></div>
            <h2 class="mt-0">Hi There! Welcome To</h2>
            <h2>Talk verse Chat Application</h2>
            <p class="text-center my-2">Connect to your device via Internet. Remember that you <br> must have a stable
                Internet Connection for a<br> greater experience.</p>
        </div>
        <div class="chatting_section" id="chat_area" style="display: none">
            <div id="header" data-universe="0" class="py-2"  IsChatvisible="false">
                <div id="name_details" class="pt-2">
                    <div id="chat_profile_image" class="mx-2" style="background-size: 100% 100%">
                        <div id="activeStatis"  ></div>
                    </div>
                    <div id="name_last_seen">
                        <h6 class="m-0 pt-2"></h6>
                        <p class="m-0 py-1"></p>
                    </div>
                </div>
                <div id="icons" class="px-4 pt-2">
                  
                       
                       
                    <div id="details_btn" class="ml-3 ">
                           <i class="fa fa-volume-up volume text-dark"></i>
                           &nbsp;  &nbsp;
                           <i class="fa fa-home text-dark backbtn"></i>
                    </div>
                </div>
            </div>

            <div id="chat_message_area">

            </div>

 
<!-- _________Chat Screen start________ -->
            <div id="messageBar" class="py-4 px-4">
                <div id="textBox_attachment_emoji_container">
                   
                    <form id="attach-form" action="<?php echo base_url('Message/do_upload')?>"  method="post" enctype="multipart/form-data">
                     
                        <button type="button" id="attachment" class="attachment bg-transparent border-0 text-white">
                            <span class="material-icons"><i class=" text-white fa fa-paperclip"></i></span>
                        </button>
                         <input type="hidden" name="isReady" value="true" id="isReady" >
                         <input type="hidden" name="actualDateTime" id="actualDateTime" >
                          <input type="hidden" name="universe" id="universe" >
                           <input type="hidden" name="unique_id" id="unique_id" >
                        <input type="file" name="file[]" id="attach-input" multiple style="display: none;">
                    </form>


                    <div id="emojitabs"></div>
                    <span class="material-icons">
                        <img src="<?php echo base_url()?>upload/emoji.png" id="emoji" alt="">
                    </span>

                    <div id="text_box_message">
                        <input type="text" autocomplete="off" maxlength="200" name="txt_message" id="messageText"
                            class="form-control messageText text-white" placeholder="Type your message">
                    </div>
                    <div id="text_counter">
                        <p id="count_text" class="m-0 p-0"></p>
                    </div>
                </div>
                <div id="sendButtonContainer">
                    <button class="btn" id="send_message">
                        <span class="material-icons"><i class="fa fa-paper-plane"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="details_of_user"    >
        <div class="profilebox">

            <div id="user_details_container_avtar" style="background-size: 100% 100%;background-image:url('/upload/<?php echo $user_avtar;?>')"></div>
            <h5 class="text-center" id="details_of_name"><?php echo $name;?></h5> 
            <!-- <p class="text-justify" id="details_of_bio"></p> -->

        </div>

        <!-- manual details -->
        <div id="user_details_container_details" class="text-center">
            <div class="magamind">
                <ul>
                    <li class="anomynous">
                            <a   href="javascript:void(0)" onclick="window.location.reload()" class=" universe0"   data-universe="0">
                                <h5>Talk to Someone</h5>
                                <h6>Speak freely, stay anonymous.</h6>
                            </a>
                        </li>
                    <li class="self">
                        <?php if(isset($_SESSION) && (isset($_SESSION['uniqueid']) && isset($_SESSION['user_avtar']))){
                                $uniqueid =$_SESSION['uniqueid'];
                                $user_avtar =$_SESSION['user_avtar'];
                                }?>

                        <a href="javascript:void(0)" class="selfuser" data-user_avtar="<?php echo   $user_avtar?>"
                            data-uniqueid="<?php echo   $uniqueid?>" data-universe="2">
                            <h5>Talk to Self</h5>
                            <h6>Your Personal Diary</h6>

                        </a>
                    </li>
                    <li class="universe">
                        <a href="javascript:void(0)" class="selfuser" data-user_avtar="<?php echo   $user_avtar?>"
                            data-uniqueid="<?php echo  $uniqueid?>" data-universe="1">

                            <h5>Talk to Universe</h5>
                            <h6>Silent shouts to cosmos.</h6>

                        </a>
                    </li>
                </ul>
            </div>
            <!--<div class="gallery-box">-->

                <!-- Nav tabs -->
                <!--<ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home"><img
                                src="<?php echo base_url()?>assets/images/gallery-2.png">236</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu1"><img
                                src="<?php echo base_url()?>assets/images/gallery-2.png">32</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu2"><img
                                src="<?php echo base_url()?>assets/images/gallery-3.png">65</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu3"><img
                                src="<?php echo base_url()?>assets/images/gallery-5.png">98</a>
                    </li>
                </ul>-->

                <!-- Tab panes -->
                <!--<div class="tab-content">
                    <div id="home" class=" tab-pane active">
                        <div class="gallery-img">
                            <ul>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <ul>
                        </div>
                    </div>
                    <div id="menu1" class=" tab-pane fade">
                        <div class="gallery-img">
                            <ul>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <ul>
                        </div>

                    </div>
                    <div id="menu2" class=" tab-pane fade">
                        <div class="gallery-img">
                            <ul>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <ul>
                        </div>
                    </div>
                    <div id="menu3" class=" tab-pane fade">
                        <div class="gallery-img">
                            <ul>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <li><img src="<?php echo base_url()?>assets/images/galerys-1.png"></li>
                                <ul>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- <p class="text-justify" id="details_of_created"></p>
					<p class="text-justify" id="details_of_birthday"></p>
					<p class="text-justify" id="details_of_mobile"><span></p>
					<p class="text-justify" id="details_of_email"><span></p>
					<p class="text-justify" id="details_of_location"><span></p> -->
        </div>

        <!-- <button class="btn btn-danger" id="btn_block">Block User</button> -->
    </div>
</section>
<!-- _________Main Chat Type Screen end________ -->


<!-- _________Second Chat Type Screen start________ -->


<section class="choose" id="choose" style="z-index:0;">
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
                <div class="magamind" >

                    <ul>
                        <li class="active">
                            <a   href="javascript:void(0)" class=" universe0"   data-universe="0">
                                <h5>Talk to Someone</h5>
                                <h6>Speak freely, stay anonymous.</h6>
                            </a>
                        </li>
                        <li>
                            <?php if(isset($_SESSION) && (isset($_SESSION['uniqueid']) && isset($_SESSION['user_avtar']))){
                                    $uniqueid =$_SESSION['uniqueid'];
                                    $user_avtar =$_SESSION['user_avtar'];
                                    }?>

                            <a href="javascript:void(0)" class="selfuser" data-user_avtar="<?php echo   $user_avtar?>"
                                data-uniqueid="<?php echo   $uniqueid?>" data-universe="2">
                                <h5>Talk to Self</h5>
                                <h6>Your Personal Diary</h6>

                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="selfuser" data-user_avtar="<?php echo   $user_avtar?>"
                                data-uniqueid="<?php echo  $uniqueid?>" data-universe="1">

                                <h5>Talk to Universe</h5>
                                <h6>Silent shouts to cosmos.</h6>

                            </a>
                        </li>
                    </ul>

                </div>


            </div>
            <div class="col-md-8">
                <div class="kawali-box-1" style="z-index: 0;">
                    <h4>Anomynous Chat Box <i class="fa fa-refresh" aria-hidden="true"></i> </h4>
                    <img class="chat" src="<?php echo base_url()?>assets/images/chat-img.png">
 

                    <div class="text-white userliststyle w-50  user_list" id="user_list2" >

                    </div>
                </div>

            </div>


        </div>
    </div>
</section>
<!-- _________Second Chat Type Screen end -->

<div id="update_container">
    <div style="background-color:#F5F6FA;" class="p-3 d-flex justify-content-between align-items-center">
        <h5 id="update_container_title" class="m-0 p-0">Update Profile</h5>
        <i class="fas fa-times"></i>
    </div>
    <form class="" id="form_details" autocomplete="off">
        <div class="form-group">
            <label>Date Of Birth</label>
            <input type="text" name="txt_dob" id="dob" class="form-control" placeholder="dd-mm-yyyy">
        </div>
        <div class="form-group">
            <label>Contact Number</label>
            <input type="text" maxlength="10" name="txt_phone" placeholder="Write your mobile number" id="phone_num"
                class="form-control">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="txt_addr" id="address" placeholder="Write your address" class="form-control">
        </div>
        <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" class="" id="update_bio" placeholder="Write your bio here.."></textarea>
        </div>
        <button class="btn btn-block" id="update_btn" style="border-radius:0px;">
            <span>Save Changes</span>
        </button>
    </form>
</div>

<!-- Button trigger modal -->
<button type="button" id="clickToupload" class=" d-none" data-bs-toggle="modal" data-bs-target="#fileupload">
 
</button>

<!-- Modal -->
<div class="modal fade" id="fileupload" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="setUploadedImg">
       
      </div>
      <div class="modal-footer">
  
        <button type="button" id="sendMediaToChat" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>

<div class="offcanvas offcanvas-start" id="userlist">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title">Users</h1>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    
    body
</div>

 
 
  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
   
  </button>
 


 