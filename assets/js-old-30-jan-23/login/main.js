 
 

	$(document).ready(function(){
 let base_url= 'https://talkmos.com/';
let validEmail =false;
let validPass =false;
var signUpSubmit =false
 
 
let checkbox = document.getElementById('chkbox1');

let mail_regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[com]+)*$/;
let main_message = "";

'use strict';

function error_message(e,msg){

 
	   let  errorField= $(e).parent().parent().next()
	 
	    
	   if(msg==''){
		   $(errorField).removeClass('fa fa-exclamation-circle').html(msg).css({'color':'red','font-weight':'400'})
		}else{
			$(errorField).addClass('fa fa-exclamation-circle').html(msg).css({'color':'red','font-weight':'400'})
		}
	 
}
 
function success_message(e,msg){
	let  errorField= $(e).parent().parent().next()
	console.log(e)
	$(errorField).addClass('fa fa-check').html(msg).css({'color':'green','font-weight':'400'})
	$(errorField).removeClass('fa-exclamation-circle')

}
 
function validinputArr(Arr){
	console.log(Arr)
	if(Arr){
		$.each(Arr,(i,v)=>{
       if(v.val()==''){
		error_message(v,' This Field Is Required')
	   }else{
		error_message(v,'')
	   }
		})
	}

}
function ValidateEmail(input) 
{  
	let value = input.val()
	let result = value.includes("@gmail.com");
	 if(value.length >0){
		 if(result && mail_regex.test(value)){
			 success_message(input,' Valid Email')
			 validEmail =true;
			 return true
			}else{
				error_message(input,' Invalid Email')
				validEmail =false;
				return false

			}
 
		}else{
			error_message(input,'')
		 
		}
	
	}
  
 $('#email').on('keyup',function(){
	let This =$(this);
	ValidateEmail(This) 

})
 
$('#semail').on('keyup',function(){
	let This =$(this);
	ValidateEmail(This) 
	if(ValidateEmail(This)){
	  newRagisterAlreadyExist($(this).val()) 
	}
	  
})
$('#spass').on('keyup',function(){
	let This =$(this);
	if(This.val().length >0){
		error_message(This,'')
	}else{
		error_message(This,' This Field Is Required')
	}
	 
})

$('#scpass').on('keyup',function(){
 
	let This =$(this);
	let pass2 = This.val()
	let pass1 = $('#spass').val()
   if(pass2.length>0){
	   if(pass1 == pass2){
		   success_message(This,' Password Match')
		   validPass =true
		
	   }else{
		   error_message(This,' Password Not Match')
		   validPass =false
	   }
	}else{
		error_message(This,'')
	}

	 
	   
})
function newRagisterAlreadyExist(email){
	 
	$.ajax({
		url: base_url + 'Authenticate/isEmailAlreadyExist',
		type: 'post',
		data: "email=" + email,
	 
		success: function (res) {
		  if(res){
			 
			if(res=="TRUE"){
			  console.log('email exist')
			  signUpSubmit =false;
			} 
			if(res=="FALSE"){
				signUpSubmit =true;
				console.log('new user');

			} 
		}
	}
				 
				 

			 
	})

	
}

	$('#form_login').on('submit',function(e){
		e.preventDefault();
		
	 
     if(validEmail && $('#pass1').val().length > 0){
		 
		
		 
			 let formData = new FormData(this);
			 $.ajax({
				 url : 'Authenticate/loginData',
				 type : 'post',
				 data : formData,
				 processData:false,
				 contentType: false,
				 success:function(res){
					  
				   
					 if(res=='TRUE'){
						 $('#form_login').trigger('reset');
						 window.location.href = "Message";
					 }
					 if(res =='FALSE'){
						  
						 error_message('#email',' It seem like there is No Account with this Email ID')
					 } 
				   
				 }
			 })
			} else{
			         if($('#email').val()=='' || $('#pass1').val()){
						 error_message('#email',' This Field Is Required')
						 error_message('#pass1',' This Field Is Required')
						}else if($('#pass1').val()){
							error_message('#pass1',' This Field Is Required')
						}else if($('#email').val()==''){
							error_message('#email',' This Field Is Required')
						}

				 
			} 
		  
		 

	})



// sign up form 

 
	$('#form_signup').on('submit', function (e) {
		e.preventDefault();
    
        
		if(signUpSubmit && validPass){
			var formData = new FormData(this);
			var date = new Date();
			var fullDate = `${date.getDate()}-${date.getMonth() + 1}-${date.getFullYear()}`;
			formData.append("created_at", fullDate);
		  
			$.ajax({
				url: base_url + 'profile/getSignindetails',
				type: 'post', 
				data: formData,
				processData: false,
				contentType: false,
				success: function (res) {
				  if(res){
					console.log(res);
					if(res=="TRUE"){
					  window.location.href =base_url +'profile/setprofile';
					}else{
						window.location.href =base_url +'signup';
					}

				  }
					 
				}
			})
	     	 
		}else{
			 validinputArr([$('#spass'),$('#scpass'),$('#semail')])
			 
		}
	})
	 

 
// profile set

 
	let nameCheck =false
	$('#profile_form').on('submit', function (e) {
		e.preventDefault();
		 
		nameCheck=  document.getElementById('user_name').hasAttribute('valid') ? true :false
		// $('#uerror').html(' ')
		  
		 
		  if(nameCheck){
			if($('#user_image').val()!=''){
                 url =  base_url +'Authenticate/signupData';
				$.ajax({
					url: url,
					type: 'post',
					data: new FormData(this),
					processData: false,
					contentType: false,
					success: function (res) {
						if(res=="TRUE"){
							window.location.href = base_url +'Message';
						}
						 	 
					}
				})
				 		
			} 
		  }else{
			$('#uerror').html('Please Enter Valid Display Name').css({'color':'red','font-weight':'400'})

		  }
			 
	})
 
const randomNameGenerator = num => {
  
	let res = '';
	for(let i = 0; i < num; i++){
		const random = Math.floor(Math.random() * 1000);
		
	  res =random  
	};
	return res;
  };
 
const setUsername = name =>{
  
	 if(name!=''){
	   return name.substring(0, name.indexOf('@'))
	 }else{
	  return 'Guest'
	 }
 }
 function firstLetercpatilize(userName) {
	return userName.charAt(0).toUpperCase() + userName.slice(1);
  }
 let userName =   setUsername($('#nameSuggestionList').data('sugestnames'))
 document.getElementById('hello').innerHTML =(firstLetercpatilize(userName)) 

//  $('#user_name').html(userName + randomNameGenerator(2) + '')
 

function getnameList(name){
	let arr =[];
	if(name!=''){
		for (let i = 0; i <= 2; i++) {
			arr.push(`<li>`+((firstLetercpatilize(name)) + randomNameGenerator(2) + '')+`</li>`)
			}
			 
		} 
		$('#nameSuggestionList').html(arr);

	}
 
    
	  function checkName(name){
 
	 
		$.ajax({
			url: base_url+ 'message/isUserAlreadyExist',
			type: 'post',
		    data:{username:name},
			success: function (response) {
			 
					 
					if(response=='true'){
						$('#uerror').html('This User Name Not Available ' + '<br>' + 'Please Select One From Above').css({'color':'red','font-weight':'400'})
						getnameList(name)
					   $('#nameSuggestionList li').each(function(e){
						   
						   $(this).on('click',function(e){
							   $('#nameSuggestionList li').removeClass("activeColor");
								   $(this).addClass("activeColor"); 
							   ($('#user_name').html($(this).html()))
							   $('#display_name').val($(this).html())
							   $('#uerror').html('')
							})
						  
						}) 
					}else{
						 
					}
						 
			 
					
			}
		})
	}
	 
$('#user_name').on('keyup',function(){
	 
	 if($(this).text().length > 1 ){
		 checkName($(this).text())
		}

})
 
	})
 	

// facebook login
 

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
			signupDate = `${messageYear}-${messageMonth}-${messageDate} ${messageHour}:${messageMinute}:${messageSec}`;


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
 
   $('#fblogin').on('click',function(){
		   fbLogin()
		 
		})
	 
		$('#fblogin2').on('click',function(){
	      fbLogin()
		 })
	 
  
 
 
	

	 

  