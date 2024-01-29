<!DOCTYPE html>
<html lang="en">

<head>
    <title>Talkmos Signup</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/message/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login/style.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/message/loading-bar.css') ?>" />
<script src="<?php echo base_url()?>/assets/loader.js"></script>
<style>#what-inside{padding-bottom:10px;}.footer{padding-left:15px;}</style>

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
 
    <section class="header">
        <div class="container-xxl">
            <div class="row">
                <nav class="navbar navbar-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="<?php echo base_url()?>"><img
                                src="<?php echo base_url()?>assets/images/logos.png" /></a>
                    </div>
                </nav>
            </div>
        </div>

        <section class="create">
            <div class="container-xxl">
                <!-- <h6>Enter the world</h6> -->

                <h3>
                    Sign Up
                    <i class="fa fa-circle" aria-hidden="true"></i>
                </h3>
                <h6>It's quick and easy.</h6>
                <h6>have an account ? <a href="<?php echo base_url()?>">Log in </a></h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="create-box">
                            <form autocomplete="off" id="form_signup" method="POST">

                                <div class="create-formss  error">
                                    <div class="form-group create-form create-formint-1" >
                                        <label class=" control-label">Email ID</label>
                                        <input type="email" class="form-control " name="email" id="semail"
                                            placeholder="Enter Email" autocomplete="off">
                                    </div>
                                </div>
                                   <span  ></span>
                                 <h6 id="emailExistErr"></h6>

                                <div class="form-group create-form error" >
                                    <label class="control-label">Password</label>
                                    <div>
                                    <input id="spass" type="password" class="form-control" name="pass"
                                        placeholder="Create Password " autocomplete="off" />
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                </div>
                                <span > </span>
                                <div class="form-group create-form error" >
                                <div>
                                    <label class="control-label">Confirm Password</label>
                                    <input id="scpass" type="password" class="form-control"
                                        placeholder="Confirm Password " autocomplete="off" /></div>
                                    <!-- <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
                                </div>
                                <span  > </span>
                             
                                <div>
                                    <button type="submit" id="btn_signup" class="btn btn-primary btre">
                                        Submit
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="create-box-1">
                            <ul>
                            <li id="googlelogin">

<a href="<?php if(isset($googleLogin)) echo $googleLogin?>"><i class="fa fa-google-plus"
    aria-hidden="true"></i>Signup with Google</a>
 </li>
 
                                <li>
                                    <a href="#"><i class="fa fa-apple" aria-hidden="true"></i>Signup with
                                        Apple Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4" id="what-inside">
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
    
    
    