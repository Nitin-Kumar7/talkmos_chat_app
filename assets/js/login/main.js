
jQuery.noConflict();
jQuery(document).ready(function () {
 

 
	let base_url = 'https://talkmos.com/'
	
 
	let validEmail = false;
	let validPass = false;
	var signUpSubmit = false


	let checkbox = document.getElementById('chkbox1');

 
	let main_message = "";

	'use strict';

            function error_message(e, msg) {
              let errorField = jQuery(e).parent().parent().next();
              jQuery(errorField).toggleClass('fa-exclamation-circle', msg !== '').toggleClass('fa fa-exclamation-circle', msg !== '').html(msg).css({ 'color': 'red', 'font-weight': '400' });
            }


                function success_message(e, msg) {
                
                    let errorField = jQuery(e).parent().parent().next();
                    jQuery(errorField).html(msg).css({'color': 'green', 'font-weight': '400'}).removeClass('fa-exclamation-circle').addClass('fa fa fa-check');
                }


	function validinputArr(Arr) {
 
		if (Arr) {
			jQuery.each(Arr, (i, v) => {
				if (v.val() == '') {
					error_message(v, ' This Field Is Required')
				} else {
					success_message(v, '')
				}
			})
		}

	}
function ValidateEmail(input) {
  let mail_regex = /^[a-zA-Z0-9.!#\$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*$/
  let value = input.val()
  let accepted_domains = ['gmail.com', 'outlook.com', 'protonmail.com', 'aol.com', 'zoho.com', 'icloud.com', 'yahoo.com', 'gmx.com'];
  let emailDomain = value.split('@')[1];
  let result = accepted_domains.includes(emailDomain);
 

  if (value.length > 0) {
    if (result && mail_regex.test(value)) {
  
      success_message(input, ' Valid Email')
      validEmail = true;
      return true
    } else {
     
      error_message(input, ' Invalid Email')
      validEmail = false;
      return false
    }
  } else {
    error_message(input, '')
  }
}


	jQuery('#email').on('keyup', function () {
		let This = jQuery(this);
	 	ValidateEmail(This)

	})

	jQuery('#semail').on('keyup', function () {
	 
		let This = jQuery(this);
		ValidateEmail(This)
	 
	})
	jQuery('#spass').on('keyup', function () {
		let This = jQuery(this);
		if (This.val().length > 0) {
			error_message(This, '')
		} else {
			error_message(This, ' This Field Is Required')
		}

	})

	jQuery('#scpass').on('keyup', function () {

		let This = jQuery(this);
		let pass2 = This.val()
		let pass1 = jQuery('#spass').val()
		if (pass2.length > 0) {
			if (pass1 == pass2) {
				success_message(This, ' Password Match')
				validPass = true

			} else {
				error_message(This, ' Password Not Match')
				validPass = false
			}
		} else {
			error_message(This, '')
		}



	})


	jQuery('#form_login').on('submit', function (e) {
		e.preventDefault();


		if (validEmail && jQuery('#pass1').val().length > 0) {



			let formData = new FormData(this);
			jQuery.ajax({
				url: base_url + 'Authenticate/loginData',
				type: 'post',
				data: formData,
				processData: false,
				contentType: false,
				success: function (res) {


					if (res == 'TRUE') {
						jQuery('#form_login').trigger('reset');
						window.location.href = "Message";
					}
					if (res == 'FALSE') {

						error_message('#email', 'Login failed. Please verify your email  and password ')
					}

				}
			})
		} else {
            		if (jQuery('#email').val() == '' && jQuery('#pass1').val() == '') {
                error_message('#email', ' This Field Is Required')
                error_message('#pass1', ' This Field Is Required')
            } else if (jQuery('#email').val() == '') {
                error_message('#email', ' This Field Is Required')
            } else if (jQuery('#pass1').val() == '') {
                error_message('#pass1', ' This Field Is Required')
            }



		}



	})



	// sign up form 


	jQuery('#form_signup').on('submit', function (e) {
		e.preventDefault();
	 
       
		if (validPass && validEmail) {

		  var formData = new FormData(this);
		  var date = new Date();
 
		  var fullDate = `${date.getDate()}-${date.getMonth() + 1}-${date.getFullYear()}`;

		  formData.append("created_at", fullDate);
	  
		  jQuery.ajax({
			url: base_url + 'profile/getSignindetails',
			type: 'post',
			data: formData,
			processData: false,
			contentType: false,
			success: function (res) {
			  if (res=='The provided email is already registered') {
				jQuery('#emailExistErr').text(res)
			 
			 }else{
            window.location.href =base_url+'profile/setprofile';
			 }
		  
			}
		  });
		} else {
		 
		  validinputArr([jQuery('#spass'), jQuery('#scpass'), jQuery('#semail')]);
		}
	  });
	  
 
	// profile set


let nameCheck = false;
let languageSelect = false;
let genderSelect = false;
let isNameSelected = false;

 
jQuery('#profile_form').on('submit', function (e) {
  e.preventDefault();

  nameCheck = jQuery('#user_name').attr('valid') === 'true';
  languageSelect = jQuery('#language-select').attr('valid') === 'true';
  genderSelect = jQuery('#gender_select').attr('valid') === 'true';


if (jQuery('#nameSuggestionList').children('li').length > 0) {
  isNameSelected = (jQuery('#nameSuggestionList li.activeColor').length > 0) ? true : false;
 
} else {
  isNameSelected = true;
}
 
  if (nameCheck && languageSelect && genderSelect && isNameSelected) {
    jQuery('#uerror').html('');
    if (jQuery('#user_image').val() !== '') {
      const url = base_url + 'Authenticate/signupData';
      jQuery.ajax({
        url: url,
        type: 'post',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (res) {
          console.log(res);
          if (res == "TRUE") {
            window.location.href = base_url + 'Message';
          }
        }
      })
    }
  } else {
    jQuery('#uerror').html('Please Enter Valid Details').css({ 'color': 'red', 'font-weight': '400' });
    if (jQuery('#nameSuggestionList').length > 0 && !isNameSelected) {
      jQuery('#uerror').append('<br>Please select a name from the suggestion list.').css({ 'color': 'red', 'font-weight': '400' });
    }
  }
});


	const randomNameGenerator = num => {

		let res = '';
		for (let i = 0; i < num; i++) {
			const random = Math.floor(Math.random() * 1000);

			res = random
		};
		return res;
	};

	const setUsername = name => {
		if (name && name !== '') {
			return name.substring(0, name.indexOf('@'))
		} else {
			return 'Guest'
		}
	}
	function firstLetercpatilize(userName) {
		return userName.charAt(0).toUpperCase() + userName.slice(1);
	}
	if (jQuery('#nameSuggestionList')) { }
	let userName = setUsername(jQuery('#nameSuggestionList').data('sugestnames'))
	if (document.getElementById('hello')) {
		document.getElementById('hello').innerHTML = (firstLetercpatilize(userName))

	}

	//  jQuery('#user_name').html(userName + randomNameGenerator(2) + '')


	function getnameList(name) {
		let arr = [];
		if (name != '') {
			for (let i = 0; i <= 2; i++) {
				arr.push(`<li>` + ((firstLetercpatilize(name)) + randomNameGenerator(2) + '') + `</li>`)
			}
		}
 
		jQuery('#nameSuggestionList').html(arr);
	}

  
	let timerId;
	jQuery('#user_name').on('keyup', function () {
	  clearTimeout(timerId); // clear any previously set timer
	  const name = jQuery(this).text().trim();
	  if (name.length > 1) {
		timerId = setTimeout(function() {
			jQuery.ajax({
				url: base_url + 'profile/isUserAlreadyExist',
				type: 'post',
				data: { username: name },
				success: function (response) {
				   let data= JSON.parse(response);
					console.log(data);
					if (data.result == 'TRUE') {
						jQuery('#uerror').html('This User Name Not Available ' + '<br>' + 'Please Select One ').css({ 'color': 'red', 'font-weight': '400' })
						getnameList(name)
						jQuery('#nameSuggestionList li').each(function (e) {
	
							jQuery(this).on('click', function (e) {
								jQuery('#nameSuggestionList li').removeClass("activeColor");
								jQuery(this).addClass("activeColor");
								(jQuery('#user_name').html(jQuery(this).html()))
								jQuery('#display_name').val(jQuery(this).html())
								jQuery('#uerror').html('')
							})
	
						})
					} else{
						jQuery('#nameSuggestionList').empty()
						jQuery('#uerror').html('')
					}
	
	
	
				}
			})
		}, 100); // wait for 500ms before calling the function
	  }
	});
 
	 

})








