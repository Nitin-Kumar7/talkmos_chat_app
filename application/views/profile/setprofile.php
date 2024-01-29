 <style>
#user_name {
    border: none;
    outline: none;
}
 </style>

   <div class="loaderdpage">
      <div class="preloader">
        <p class="talkmos " >Please Wait...</p>
        <div class="loading-dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>



 <section class="header">
     <div class="container-xxl">
         <div class="row">
             <nav class="navbar navbar-light">
                 <div class="container-fluid">
                     <a class="navbar-brand" href="#"><img src="<?php echo base_url()?>assets/images/logos.png" /></a>
                 </div>
             </nav>
         </div>
     </div>
     <section class="choose">
         <div class="container-xxl">
             <div class="row">
  <?php 
 

//  if(isset( $_SESSION['user_avtar']) &&  $_SESSION['user_avtar']!=''){
//     $selected_user_avtar = $_SESSION['user_avtar'];
//   }else{
//     $selected_user_avtar = '';

//   }
//   if(isset( $_SESSION['user_name']) &&  $_SESSION['user_name']!=''){
//     $selected_username = $_SESSION['user_name'];
//   }else{
//     $selected_username =isset($_SESSION['email']) ? $_SESSION['email'] : '' ;
//   }
 
//  $created_at = $_SESSION['signupdetails']['created_at'];
// $email = $_SESSION['signupdetails']['email'];
// $pass = $_SESSION['signupdetails']['pass'];
 
$selected_user_avtar = isset($_SESSION['user_avtar']) ? $_SESSION['user_avtar'] : '';
$selected_username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : (isset($_SESSION['signupdetails']['email']) ? $_SESSION['signupdetails']['email'] : '');
 ?>
                 <div class="col-md-4 text-center">
                     <div class="choose-left">
                         <?php if($selected_username!=''){?>
                         <h3>Hey,<span id="hello"
                                 data-selected_username="<?php echo $selected_username ?>"><?php echo $selected_username ?></span>
                         </h3>
                         <?php }else{?>
                         <h3>Hey,<span><?php echo $selected_username ?></span></h3>
                         <?php }?>
                         <p>Let’s Get you started</p>
                         <h6>Choose your avatar</h6>

                     </div>
                     <!-- Tab panes -->
                     <div class="tab-content ">
                         <div id="home" class=" tab-pane  active">
                             <img id="setAvtar" class="updateprofilebyclick"  data-selected_user_avtar="<?php echo $selected_user_avtar?>">

                         </div>

                     </div>
                     <ul id="nameSuggestionList"
                         data-sugestNames="<?php echo $this->session->userdata('signupdetails')['email']?>">

                     </ul>
                     <span id="uerror"></span>
                     <div class="magamind">
                         <ul>
                             <li class="active mb-0">
                                 <a href="javascript:void(0)">
                                     <h6>Select a display name</h6>
                                     <h5 id="user_name" contenteditable="true" invalid='true'>Enter Display Name</h5>

                                 </a>
                             </li>

                             <li class=" e mb-0">

                                 <a href="javascript:void(0)">



                                     <div class="sets " id="user_type">
                                         <h6>Select gender</h6>
                                         <select class="form-select " id="gender_select" invalid='true'>
                                             <option value="">Select Gender</option>
                                             <option>Female</option>
                                             <option>Male</option>

                                         </select>
                                     </div>
                                 </a>



                             </li>
                             <li class=" e mb-0">
                                 <a href="javascript:void(0)">
                                     <!-- <h6>Select language</h6>
                                 <h5 id="user_lang">English</h5>-->

                                     <div class="sets" id="user_lang">
                                         <h6>Select language</h6>
                                         <select class="form-select" invalid='true' id="language-select">
                                             <option value=""> Select Lanuage</option>
                                             <option value="English">English</option>
                                             <option value="हिन्दी">हिन्दी</option>
                                             <option value="Español">Español</option>
                                             <option value="Français">Français</option>
                                             <option value="Deutsch">Deutsch</option>
                                             <option value="中文">中文</option>
                                             <option value="العربية">العربية</option>
                                             <option value="বাংলা">বাংলা</option>
                                             <option value="Português">Português</option>
                                             <option value="Русский">Русский</option>
                                             <option value="日本語">日本語</option>
                                             <option value="한국어">한국어</option>
                                             <option value="Türkçe">Türkçe</option>
                                             <option value="Kiswahili">Kiswahili</option>
                                             <option value="Italiano">Italiano</option>
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

                                             <!-- add more options here -->
                                         </select>
                                     </div>

                                 </a>
                             </li>
                         </ul>

                         <form method="post" id="profile_form">

                             <input type="hidden" id="created_at"
                                 value="<?php echo $_SESSION['signupdetails']['created_at'];?>" name="created_at">
                             <input type="hidden" id="user_email"
                                 value="<?php echo $_SESSION['signupdetails']['email'];?>" name="user_email">
                             <input type="hidden" id="user_pass"
                                 value="<?php echo $_SESSION['signupdetails']['pass'];?>" name="user_pass">
                             <input type="hidden" id="user_gender" value="male" name="user_gender">
                             <input type="hidden" id="user_language" value="english" name="user_language">
                             <input type="hidden" id="display_name" name="user_name">
                             <input type="hidden" id="user_image" name="user_image">

                             <button type="submit" class="nxt-btn" id="setprofile">
                                 Next
                             </button>

                         </form>
                     </div>



                 </div>
                 <div class="col-md-8" id="imgbox">
                     <div class="kawali-box">
                         <ul>
                             <!-- <li><a href="#">Kawaii</a></li> -->
                         </ul>
                     </div>

                     <!-- Nav pills -->
                     <ul class="nav nav-pills " role="tablist">

                         <li class="nav-item">
                             <a class="nav-link" data-bs-toggle="pill" href="#menu1"><img
                                     src="<?php echo base_url()?>upload\avtar1.png" image='avtar1.png'></a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" data-bs-toggle="pill" href="#menu2"><img
                                     src="<?php echo base_url()?>upload\avtar2.png" image='avtar2.png'></a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" data-bs-toggle="pill" href="#menu3"><img
                                     src="<?php echo base_url()?>upload\avtar3.png" image='avtar3.png'></a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" data-bs-toggle="pill" href="#menu4"><img
                                     src="<?php echo base_url()?>upload\avtar4.png" image='avtar4.png'></a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" data-bs-toggle="pill" href="#menu5"><img
                                     src="<?php echo base_url()?>upload\avtar5.png" image='avtar5.png'></a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" data-bs-toggle="pill" href="#menu6"><img
                                     src="<?php echo base_url()?>upload\avtar6.png" image='avtar6.png'></a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" data-bs-toggle="pill" href="#menu7"><img
                                     src="<?php echo base_url()?>upload\avtar7.png" image='avtar7.png'></a>
                         </li>

                     </ul>

  
                     <button class="btn btn-back float-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
                         role="button">
                         <i class="fa fa-arrow-left" aria-hidden="true" fs-3" data-bs-toggle="offcanvas"
                             data-bs-target="#offcanvas"></i>
                     </button>


                 </div>

             </div>
         </div>
     </section>
     <div id="sidebar">
         <span id="closeBtn">&times;</span>
         <ul class="nav nav-pills " role="tablist">

             <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="pill" href="#menu1"><img
                         src="<?php echo base_url()?>upload\avtar1.png" image='avtar1.png'></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="pill" href="#menu2"><img
                         src="<?php echo base_url()?>upload\avtar2.png" image='avtar2.png'></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="pill" href="#menu3"><img
                         src="<?php echo base_url()?>upload\avtar3.png" image='avtar3.png'></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="pill" href="#menu4"><img
                         src="<?php echo base_url()?>upload\avtar4.png" image='avtar4.png'></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="pill" href="#menu5"><img
                         src="<?php echo base_url()?>upload\avtar5.png" image='avtar5.png'></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="pill" href="#menu6"><img
                         src="<?php echo base_url()?>upload\avtar6.png" image='avtar6.png'></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="pill" href="#menu7"><img
                         src="<?php echo base_url()?>upload\avtar7.png" image='avtar7.png'></a>
             </li>

         </ul>
     </div>
     <script>
     const getid = (e) => document.getElementById(e)


     let allAvtar = document.querySelectorAll('.nav.nav-pills a img');


     allAvtar.forEach((e) => {

         e.addEventListener('click', function() {
             let image = this.getAttribute('image');
             getid('setAvtar').setAttribute('src', '<?php echo base_url()?>upload/' + image)
             getid('user_image').value = image
         })
     })

     let selected_avtar = getid('setAvtar').getAttribute('data-selected_user_avtar')

     getid('setAvtar').setAttribute('src', '<?php echo base_url()?>upload/avtar1.png')

     //   check user have been created signuped the aacount if yes set selected image

     getid('user_image').value = selected_avtar != '' ? selected_avtar : 'avtar1.png';

     //   display name 
     getid('user_name').addEventListener('focus', function() {
         if (this.innerHTML == 'Enter Display Name') {
             this.innerHTML = '';
         }
     });
     getid('user_name').addEventListener('blur', function() {
         if (this.innerHTML.trim() === '') {
             this.innerHTML = 'Enter Display Name';
         }
     })

     getid('user_name').addEventListener('keyup', function() {
         getid('display_name').value = getid('user_name').innerHTML
         if (this.innerHTML != 'Enter Display Name' && this.innerHTML != '') {
             if (this.innerHTML.length > 2) {
                 getid('user_name').setAttribute('valid', true)
                 getid('user_name').removeAttribute('invalid', true)
             }

         } else {
             getid('user_name').setAttribute('invalid', true)
             getid('user_name').removeAttribute('valid', true)

         }
     })



     const genderSelect = document.getElementById('gender_select');
     const genderInput = document.getElementById('user_gender');

     genderSelect.addEventListener('change', (event) => {
         genderInput.value = event.target.value;
         if (event.target.value === '') {
             genderSelect.setAttribute('invalid', true);
             genderSelect.removeAttribute('valid');

         } else {
             genderSelect.setAttribute('valid', true);
             genderSelect.removeAttribute('invalid');
         }
     });

     const languageSelect = document.getElementById("language-select");
     const languageInput = document.getElementById("user_language");
     languageSelect.addEventListener("change", (event) => {
         languageInput.value = event.target.value;
         if (event.target.value === '') {
             languageSelect.setAttribute('invalid', true);
             languageSelect.removeAttribute('valid');

         } else {
             languageSelect.setAttribute('valid', true);
             languageSelect.removeAttribute('invalid');
         }
     });

     ;
     </script>


     <script type="text/javascript">
     const frem = document.querySelector("#bigfrem");
     const fontStyle = document.querySelector("#titleText");
     const fremImage = document.querySelector("#fremImage");

     function changeColor(fremColor) {
         frem.style.backgroundColor = fremColor.style.backgroundColor;
     }

     function changeFont(titleFont) {
         fontStyle.style.fontFamily = titleFont.style.fontFamily;
     }

     function changeImg(fremImg) {
         fremImage.style.backgroundImage = fremImg.style.backgroundImage;
     }
     </script>

 

     <script>
 
document.querySelector('.updateprofilebyclick').addEventListener('click', function() {
        var sidebar = document.querySelector('#sidebar');
        if (sidebar.style.width === '300px') {
          sidebar.style.width = '0';
        } else {
          sidebar.style.width = '300px';
        }
      });
       getid('closeBtn').addEventListener('click', function() {
      
         var sidebar = getid('sidebar');
         sidebar.style.width = '0';
        });
    
        //  check for screen is ready to mobile view
        function removeClassOnSmallScreen() {
  var screenWidth = window.innerWidth;
  if (screenWidth > 768) {
    document.querySelector('#setAvtar').classList.remove('updateprofilebyclick');
  } else {
    document.querySelector('#setAvtar').classList.add('updateprofilebyclick');
  }
}

// Call the function initially to set the class based on screen width
removeClassOnSmallScreen();

// Add an event listener to the window's resize event
window.addEventListener('resize', removeClassOnSmallScreen);

     </script>