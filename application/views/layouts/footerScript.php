 
<script src="https://talkmos.com/assets/js/jquery.min.js" onerror="if (!window.jQuery) { document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"</script>'); }"></script>
 
 
	<script type="text/javascript" src="<?php echo base_url()?>assets\js\message\bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mousetrap/1.6.5/mousetrap.min.js" integrity="sha512-+Jg3Ynmj9hse704K48H6rBBI3jdNBjReRGBCxUWFfOz3yVurnJFWtAWssDAsGtzWYw89xFWPxShuj2T6E9EOpg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
	<script type="text/javascript" src="<?php echo base_url()?>assets/loader.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/message/main.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/login/main.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
 
 
	<!-- emoji library -->
	 
 <!-- mouse trap  -->
 <script>
	
	 
	 // facebook login
var base_url = "<?php echo base_url(); ?>";
window.fbAsyncInit = function() {
		FB.init({
		  appId      : '2560118200793234',
		  cookie     : true,
		  xfbml      : true,
		  version    : 'v15.0'
		});
		FB.AppEvents.logPageView();   
	  };

	  (function(d, s, id){
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement(s); js.id = id;
		 js.src = "https://connect.facebook.net/en_US/sdk.js";
		 fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	   
	   function fbLogin(){
			FB.login(function(response){
				if(response.authResponse){
					fbAfterLogin();
				}
			});
	   }
	   
	   function fbAfterLogin(){
		FB.getLoginStatus(function(response) {
		 
			var d = new Date(),
			messageHour = d.getHours(),
			messageMinute = d.getMinutes(),
			messageSec = d.getSeconds(),
			messageYear = d.getFullYear(),
			messageDate = d.getDate(),
			messageMonth = d.getMonth() + 1,
			signupDate = `jQuery{messageYear}-jQuery{messageMonth}-jQuery{messageDate} jQuery{messageHour}:jQuery{messageMinute}:jQuery{messageSec}`;


			if (response.status === 'connected') {   
				FB.api('/me', function(response) {
					console.log(response)
				  jQuery.ajax({
					url:base_url +'facebook',
					type:'post',
					data:'name='+response.name+'&id='+response.id+'&created_at='+signupDate,
					success:function(result){
						if(result=='TRUE'){
							window.location.href=base_url + 'Message';
						}
						if(result=='FALSE'){
							window.location.href=base_url + 'profile/setprofile';
						}
						  
					}
				  });
				});
			}
		});
	   }
	   jQuery('#fblogin').on('click',function(){
		   fbLogin()
		})
		jQuery('#fblogin2').on('click',function(){
			fbLogin()
		 })
	 


// 		 document.addEventListener('contextmenu', event => event.preventDefault());
// 		 document.addEventListener('keydown', event => {
//   if (event.ctrlKey || event.shiftKey) {
//     event.preventDefault();
//   }
// });

		 
 </script>
 <section class="footer">
    <div class="container-xxl">
        <div class="row">
           <!-- <div class="col-md-6">
                <div class="footer-left ps-3">
                    
                </div>
            </div>-->
            <div class="navbar navbar-light d-flex">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="<?php echo base_url()?>privacy">Privacy Policy</a></li>
                        <li class="nav-item"><a href="<?php echo base_url()?>policy">Cookie Policy</a></li>
                        <li class="nav-item"><a href="<?php echo base_url()?>terms">Terms</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html> 
 
 
