<?php 
 
 
 // Check if unique_id exists in session
 if(isset($_SESSION['uniqueid'])) {
     $unique_id = $_SESSION['uniqueid'];
     
   
     // Access other values in session
     $user_name = $_SESSION['user_name'];
    //  $email =  $_SESSION['email'] ?$_SESSION['signupdetails']['email'] :$user_name;
     $user_avtar = $_SESSION['user_avtar'];
  
 } else {
     // Unique ID not found in session
    //  echo "Unique ID not found in session";
 }
 ?>
<style>
    .usermenu{
 
    color: white;
    margin: -24px;
    font-size: 17px;
   
    }
      .usermenu li{
         margin-top: 15px;
      }
    
</style>

<div id="main_headers" class="bg-dark">
   <input type="hidden" id="get_inque_id" value="<?php echo  $unique_id ? $unique_id : ''?>">
    <input type="hidden" id="user_avtar" value="<?php echo  $user_avtar ? $user_avtar : ''?>">
    <section class="main_headers ">
        <div class="container-xxl ">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light ">

                    <a class="navbar-brand" href="/"><img src="<?php echo base_url()?>assets/images/logos.png"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#setting"><i class="fa fa-list"></i></button> 
                      
                   
 
 
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <div class="ast-sch" style="visibility: hidden;">
                                <div class="input-group"  >
                                    <button class="btn btn-outline-secondary"  type="button" id="button-addon2"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                    <input type="text" name="txt_search" class="form-control" autocomplete="off"
                                        placeholder="Search User" id="search">

                                </div>
                            </div>
                            <div class="sltc-imgss text-white">
                                <i class="fa fa-power-off"></i><a class="logout" id="logout" href="#" style="color:white;">Logout</a> 
                                <a  href="#" data-bs-toggle="modal"
                                        data-bs-target="#myprofile"><img src="<?php echo base_url()?>upload/<?php echo $user_avtar ? $user_avtar:''?>"></a>
                            </div>



                        </ul>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <button type="button" class="setbtn text-white   fa fa-cog  btn  " data-bs-toggle="dropdown"
                                aria-expanded="false">

                            </button>
                            <ul class="dropdown-menu " style="margin-left: -9rem; z-index:999999;">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#myprofile"> My Profile</a></li>
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        href="#"> Update Profile</a></li>

                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#passwordChnage"> </i> Change Password</a></li>
                                <li><a class="dropdown-item logout"  id="logout" href="#"></i> Logout</a></li>

                            </ul>

                        </div>
                    </div>

                </nav>
            </div>
        </div>
    </section>




    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="useravtar" id="useravtar">
                        <input type="hidden" name="useravtar" id="useravtar">
                        <div class=" ">
                            <ul class="nav nav-pills " role="tablist">

                                <li class="nav-item" >>
                                    <a  class="nav-link <?php echo  $data[0]['user_avtar']=='avtar1.png' ?  'active' :'' ?> " data-bs-toggle="pill" href="#menu1"><img
                                            src="<?php echo base_url()?>upload\avtar1.png" image='avtar1.png'></a>
                                </li>
                                <li class="nav-item">
                                    <a  class="nav-link <?php echo  $data[0]['user_avtar']=='avtar2.png' ?  'active' :'' ?>" data-bs-toggle="pill" href="#menu2"><img
                                            src="<?php echo base_url()?>upload\avtar2.png" image='avtar2.png'></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  <?php echo  $data[0]['user_avtar']=='avtar3.png' ?  'active' :'' ?>" data-bs-toggle="pill" href="#menu3"><img
                                            src="<?php echo base_url()?>upload\avtar3.png" image='avtar3.png'></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  <?php echo  $data[0]['user_avtar']=='avtar4.png' ?  'active' :'' ?>" data-bs-toggle="pill" href="#menu4"><img
                                            src="<?php echo base_url()?>upload\avtar4.png" image='avtar4.png'></a>
                                </li>
                                <li class="nav-item">
                                    <a  class="nav-link <?php echo  $data[0]['user_avtar']=='avtar5.png' ?  'active' :'' ?>" data-bs-toggle="pill" href="#menu5"><img
                                            src="<?php echo base_url()?>upload\avtar5.png" image='avtar5.png'></a>
                                </li>
                                <li class="nav-item">
                                    <a  class="nav-link <?php echo  $data[0]['user_avtar']=='avtar6.png' ?  'active' :'' ?>" data-bs-toggle="pill" href="#menu6"><img
                                            src="<?php echo base_url()?>upload\avtar6.png" image='avtar6.png'></a>
                                </li>
                                <li class="nav-item">
                                    <a  class="nav-link <?php echo  $data[0]['user_avtar']=='avtar7.png' ?  'active' :'' ?>" data-bs-toggle="pill" href="#menu7"><img
                                            src="<?php echo base_url()?>upload\avtar7.png" image='avtar7.png'></a>
                                </li>

                            </ul>
                        </div>
                        <div class=" ">
                            <select id="getselectedGender" class="form-select form-select-sm mb-3"
                                aria-label=".form-select-lg example">
                                <option selected value="">select Gender</option>
                                <option value="male"  <?php if ( $data[0]['user_gender'] == "male") { echo "selected"; } ?>>Male</option>
                                <option value="female"  <?php if ( $data[0]['user_gender'] == "female") { echo "selected"; } ?>>Female</option>

                            </select>
                        </div>
                        <div class=" ">
                            <select id="getselectedlang" class="form-select form-select-sm mb-3"
                                aria-label=".form-select-lg example">
                                <option value="" <?php if (!$data) { echo "selected"; } ?>>select Language</option>
<option value="English" <?php if ( $data[0]['user_lang'] == "English") { echo "selected"; } ?>>English</option>
<option value="हिन्दी" <?php if ( $data[0]['user_lang'] == "हिन्दी") { echo "selected"; } ?>>हिन्दी</option>
<option value="Español" <?php if ( $data[0]['user_lang'] == "Español") { echo "selected"; } ?>>Español</option>
<option value="Français" <?php if ( $data[0]['user_lang'] == "Français") { echo "selected"; } ?>>Français</option>
<option value="Deutsch" <?php if ( $data[0]['user_lang'] == "Deutsch") { echo "selected"; } ?>>Deutsch</option>
<option value="中文" <?php if ( $data[0]['user_lang'] == "中文") { echo "selected"; } ?>>中文</option>
<option value="العربية" <?php if ( $data[0]['user_lang'] == "العربية") { echo "selected"; } ?>>العربية</option>
<option value="বাংলা" <?php if ( $data[0]['user_lang'] == "বাংলা") { echo "selected"; } ?>>বাংলা</option>
<option value="Português" <?php if ( $data[0]['user_lang'] == "Português") { echo "selected"; } ?>>Português</option>
<option value="Русский" <?php if ( $data[0]['user_lang'] == "Русский") { echo "selected"; } ?>>Русский</option>
<option value="日本語" <?php if ( $data[0]['user_lang'] == "日本語") { echo "selected"; } ?>>日本語</option>
<option value="한국어" <?php if ( $data[0]['user_lang'] == "한국어") { echo "selected"; } ?>>한국어</option>
<option value="Türkçe" <?php if ( $data[0]['user_lang'] == "Türkçe") { echo "selected"; } ?>>Türkçe</option>
<option value="Kiswahili" <?php if ( $data[0]['user_lang'] == "Kiswahili") { echo "selected"; } ?>>Kiswahili</option>
<option value="Italiano" <?php if ( $data[0]['user_lang'] == "Italiano") { echo "selected"; } ?>>Italiano</option>
<option value="Telugu" <?php if ( $data[0]['user_lang'] == "Telugu") { echo "selected"; } ?>>Telugu</option>
<option value="Assamese" <?php if ( $data[0]['user_lang'] == "Assamese") { echo "selected"; } ?>>Assamese</option>
<option value="Konkani" <?php if ( $data[0]['user_lang'] == "Konkani") { echo "selected"; } ?>>Konkani</option>
<option value="Gujarati" <?php if ( $data[0]['user_lang'] == "Gujarati") { echo "selected"; } ?>>Gujarati</option>
<option value="Kannada" <?php if ( $data[0]['user_lang'] == "Kannada") { echo "selected"; } ?>>Kannada</option>
<option value="Malayalam" <?php if ( $data[0]['user_lang'] == "Malayalam") { echo "selected"; } ?>>Malayalam</option>
<option value="Marathi" <?php if ( $data[0]['user_lang'] == "Marathi") { echo "selected"; } ?>>Marathi</option>
<option value="Manipuri" <?php if ( $data[0]['user_lang'] == "Manipuri") { echo "selected"; } ?>>Manipuri</option>
<option value="Mizo" <?php if ( $data[0]['user_lang'] == "Mizo") { echo "selected"; } ?>>Mizo</option>
<option value="Odia" <?php if ( $data[0]['user_lang'] == "Odia") { echo "selected"; } ?>>Odia</option>
<option value="Punjabi" <?php if ( $data[0]['user_lang'] == "Punjabi") { echo "selected"; } ?>>Punjabi</option>
<option value="Nepali" <?php if ( $data[0]['user_lang'] == "Nepali") { echo "selected"; } ?>>Nepali</option>
<option value="Sikkimese" <?php if ( $data[0]['user_lang'] == "Sikkimese") { echo "selected"; } ?>>Sikkimese</option>
<option value="Lepcha" <?php if ( $data[0]['user_lang'] == "Lepcha") { echo "selected"; } ?>>Lepcha</option>
<option value="Tamil" <?php if ( $data[0]['user_lang'] == "Tamil") { echo "selected"; } ?>>Tamil</option>
<option value="Bengali" <?php if ( $data[0]['user_lang'] == "Bengali") { echo "selected"; } ?>>Bengali</option>
<option value="Kokborok" <?php if ( $data[0]['user_lang'] == "Kokborok") { echo "selected"; } ?>>Kokborok</option>


                            </select>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeprofilebox" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" id="updateProfile" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- for Change password_info -->
    <div  class="modal fade" id="passwordChnage" tabindex="-1" aria-labelledby="passwordChnage" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark ">
                    <h1 class="modal-title  text-white bg-5" id="passwordChnage"   >Update Password</h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"  style="background:#282a37">
                    <form>

                        <div class=" ">
                            <label for="recipient-name" id="oldPass" class="col-form-label   text-white">Old Password:</label>
                            <input type="text" class="form-control bg-dark text-white" id="recipient-name">
                        </div>
                        <div class=" ">
                            <label for="recipient-name" id="newPass" class="col-form-label   text-white">New Password:</label>
                            <input type="text" class="form-control  bg-dark text-white" id="recipient-name">
                        </div>

                    </form>
                </div>
                <div class="modal-footer" style="background:#282a37">
                
                    <button type="button" id="changePassword"   class="btn    text-white">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- myprofile -->
    <!-- for Change password_info -->
    <div class="modal fade" id="myprofile" tabindex="-1" aria-labelledby="myprofile" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="myprofile">My Profile </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class=" ">
                            <img width="100"
                                src="<?php echo base_url()?>upload/<?php echo $user_avtar ? $user_avtar:''?>">
                        </div>
                        <div class="mt-2 ">
                            <h5>User Name :&nbsp;<?php echo $data ? $data[0]['user_name'] : ''?></h5>
                        </div>
                        <div class="mt-2 ">
                            <h5> Gender :&nbsp; <?php echo $data ?  $data[0]['user_gender'] : ''?></h5>
                            <h5> Language :&nbsp; <?php echo $data ? $data[0]['user_lang'] : ''?></h5>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
<div class="offcanvas offcanvas-start" style="background:#282a37" id="setting">
  <div class="offcanvas-header bg-dark">
      <i class=" text-white fa fa-arrow-left  "   data-bs-dismiss="offcanvas"></i>
    <h1 class="offcanvas-title text-white" style=" margin-left: -10rem;font-size: 23px;">Setting</h1>
     <span style="margin-left:20px" class=" text-white fa fa-power-off  logout"><span>
    
  </div>
  <div class="offcanvas-body">
       <div class="text-left " style="margin-top:-10px">
           <img width="60"
            src="<?php echo base_url()?>upload/<?php echo $user_avtar ? $user_avtar:''?>">
          <small style=" margin-left:10px; font-size: 22px;color: #a1a1a1;"> <?php echo $data ? $data[0]['user_name'] : ''?></small>
            </div> 
<div class="list-group mt-5"  style="background:#282a37">
   <ul class="usermenu"  style="background:#282a37">
  <li class="text-white" data-bs-toggle="modal"
                                        data-bs-target="#passwordChnage" > <i class="text-white fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;</i>Change Password</li>
 
 
</ul>
<hr class="bg-white mt-5">
   <ul class="usermenu mt-2"  style="background:#282a37">
 
  <li >Language :&nbsp; <?php echo $data ? $data[0]['user_lang'] : ''?></li>
  <li >Gender  :&nbsp; <?php echo $data ?  $data[0]['user_gender'] : ''?></li>
 
</ul>

</div>
    
  </div>
</div>