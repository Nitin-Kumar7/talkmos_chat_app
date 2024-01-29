<!DOCTYPE html>
<html lang="en">

<head>
    <title>Talkmos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets\css\message\bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets\css\login\style.css') ?>" />
     <link rel="stylesheet" href="<?php echo base_url('assets\css\message\loading-bar.css') ?>" />
     
     
<script src="https://talkmos.com/assets/js/jquery.min.js" onerror="if (!window.jQuery) { document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"</script>'); }"></script>
 
 
    <script src="<?php echo base_url()?>/assets/loader.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>\assets\js\login\main.js"></script>
     
     
     
    <style>
        
       
.header {
    /* height: 90vh; */
    /* width: 90vw; */
    /* margin: 5vh 5vw; */
    /* background-color: #eee; */
    background-position: center;
    background-size: cover;
    /* animation: image 2s infinite alternate; */
    overflow-x: hidden;
    background-image: url("https://talkmos.com/assets/images/bg-video.gif");
}

@keyframes image {
  0% {
    background-image: url("https://talkmos.com/assets/images/banner.png");
  }
  25% {
    background-image: url("https://talkmos.com/assets/images/cloudy.jpeg");
  }
  50% {
    background-image: url("https://talkmos.com/assets/images/cloudy-1.jpeg");
  }
  100% {
    background-image: url("https://talkmos.com/assets/images/cloudy-2.jpeg");
  }
}



    </style>
   
</head> 
  
<body>
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
    
    
  <!-- <div class="frame"></div>-->
    
    <section class="header">
        <div class="container-xxl">
            <div class="row">
                <nav class="navbar navbar-light d-flex">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="<?php echo base_url()?>"><img src="<?php echo base_url()?>assets/images/logos.png" /></a>
                          <!--<ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()?>privacy"  target="_blank">Privacy Policy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()?>policy"  target="_blank">Cookie Policy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()?>terms"  target="_blank">Terms</a>
        </li>
      </ul>-->
                    </div>
                </nav>
              
            </div>
        </div>
       
        <section class="create">
            <div class="container-xxl">
                <!-- <h6>Enter the world</h6> -->
               
                <h3>
                    Log In<i class="fa fa-circle" aria-hidden="true"></i>
                </h3>
              
                <h6>Don't have an account? <a href="<?php echo base_url()?>signup">Sign Up </a></h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="create-box">
                              <form autocomplete="off" id="form_login" method="POST">
  
                                <div class="create-formss d-flex error">
                                    <div class="form-group create-form create-formint-1" style="width:100%;">
                                        <label class=" control-label">Email ID</label>
                                        <input type="email" class="form-control " name="email"
                                             id="email" placeholder="Enter Email"  autocomplete="off"  >
                                        
                                             
                                    </div>
                                    <!-- <a class="vr-btn" href="#">verify</a> -->
                                </div>
                                <span class="eerror"></span>

                                <div class="form-group create-form error">
                                <div class="form-group create-form create-formint-1" style="width:75%;">

                                  
                                         <label class="control-label">Password</label>
                                    <input id="pass1" type="password" class="form-control" name="pass"
                                         placeholder="Enter Password "  autocomplete="off"  />
                                    <span id="#password-field"
                                        class="fa fa-eye field-icon toggle-password"></span>
                                        </div>
                                </div>
                                <span class="perror"> </span>
                                <!-- <div class="form-group create-form error">
                                <label class="control-label">Confirm Password</label>
                                    <input id="cpassword" type="password" class="form-control" name="confirm_password"
                                         placeholder="Enter Confirm Password "  autocomplete="off"  />
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div> -->
                                <span class="cerror"> </span>
                            
                              
                                <button type="submit"  id="btn_login" class="btn btn-primary btre">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="create-box-1">
                            <ul>
                                <li id="googlelogin">

                               <a href="<?php if(isset($googleLogin)) echo $googleLogin?>"><i class="fa fa-google-plus"
                                   aria-hidden="true"></i>Sign in with Google</a>
                                </li>
                            
                                <li>
                                    <a href="#"><i class="fa fa-apple" aria-hidden="true"></i>Sign in with
                                        Apple Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="abt-right">
                             <h3>
                             What's Inside?
                </h3>
                            <p class="d-none">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                            <p>
                            Engage in anonymous conversations, or talk it out with "Talk to Self," or "Talk to Universe" features.<br />
                            Experience a safe space to express yourself without fear of judgment or disclosure.   
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 
    </section>

 