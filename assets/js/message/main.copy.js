jQuery.noConflict();
jQuery(document).ready(function () {
	// var gender = document.getElementById("gender").value;
	// var language = document.getElementById("language").value;
 
	  
	  
   var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
   
if (isMobile){
 
}else{
     jQuery('#chat_user_list').removeClass('d-none')
  
}
      
 
	var oldDate, newDate, days, hours, min, sec, unique_id, bg_image, inter, inter3, inter2, universe,
		chatBox = document.getElementById('chat_message_area'),
		main = document.getElementById('main_headers'),
		owenerProfileBio = document.getElementById('owner_profile_bio'),
		dob, phone, addr, bio;

	let base_url = 'https://talkmos.com/';
	



	//Main funtion which will run at the time of page load
	//UserSidebarIn
	function barIn() {
		jQuery('#details_of_user').css('width', '25%');
		jQuery('#chatbox').css('width', '55%');
		jQuery('#details_of_user').children().show();
	}
	//UserSidebarOut
	function barOut() {
		jQuery('#details_of_user').children().hide();
		jQuery('#details_of_user').css('width', '0');
		jQuery('#chatbox').css('width', '75%');
	}

	
 
	function getUserList(gender=null,language=null) {
		return new Promise(function (resolve, reject) { //Creating new Promise Chain
			jQuery.ajax({
				url: base_url + 'Message/allUser?language='+language +'&gender='+gender,
				type: 'get',
				async: false,
				success: function (data) {
					if (data != "") {
						resolve(data);
					}
				}
			})


		}).then(function (data) { //This function setting the user list
					document.getElementById('user_list2').innerHTML = data;  
		         	document.getElementById('user_list').innerHTML = data; //setting  
		 
              
			jQuery.get(base_url + 'Message/ownerDetails', function (data) {
				jsonData = JSON.parse(data);
				dob = jsonData[0]['dob'];
				phone = jsonData[0]['phone'];
				addr = jsonData[0]['address'];
				bio = jsonData[0]['bio'];
		 
			})
			
			
			
			jQuery('.innerBox').click(function () {
			   getUserList(null, null);
			   
			   
                 jQuery('.main_headers').hide() // header
                 // Check if the user is accessing the website from a mobile device
                var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
     
                isMobile  ?  jQuery('#chat_user_list').addClass('d-none') :  jQuery('#chat_user_list').removeClass('d-none');
 
  
				barIn();
				jQuery('#main').show()
				jQuery('#choose').hide()
				jQuery('.chatting_section').css('display', '');

				unique_id = jQuery(this).find('#user_avtar').children('#hidden_id').val();
				bg_image = jQuery(this).find('#user_avtar').css('background-image').split('"')[1];

				sessionStorage.setItem('unique_id', unique_id)
				sessionStorage.setItem('bg_image', bg_image)
		        jQuery('#header').attr('unique_id',unique_id).attr('bg_image',bg_image)

				clearInterval(inter);
				clearInterval(inter3);
              var IfHaveMessage = parseInt(jQuery(this).find('span').text());
              
                  if ($('#main').is(':visible')) {
                      
                   if (IfHaveMessage > 0) {
                    updateUnSeemMsg(unique_id);
                    }
                  } 
                       
                				  
				inter = setInterval(function () {
			      	getUserDetails(unique_id);
					sendUserUniqIDForMsg(unique_id, bg_image);
				 
				}, 1000);
			 
		 
			})
			jQuery('.innerBox').mouseover(function () {
				clearInterval(inter2);
			})
			jQuery('.innerBox').mouseleave(function () {
	 
			})
		})
	}
	
	
	
	
	 
var intervalId; // Variable to store the interval ID

jQuery('#selectGender, #selectlanguage').on('change', function() {
    var gender = jQuery('#selectGender').val();
    var language = jQuery('#selectlanguage').val();
  
    clearInterval(intervalId);
    getUserList(gender, language);
});
 
 


 
intervalId = setInterval(function() {
    getUserList(null, null);
},1000);

	// Self user
	function selfUser() {

		return new Promise(function (resolve, reject) { //Creating new Promise Chain
			jQuery.ajax({
				url: base_url + 'Message/selfUser',
				type: 'get',
				async: false,
				success: function (data) {
					if (data != "") {
						resolve(data);
					}
				}
			})


		}).then(function (data) { //This function setting the user list
 
			jQuery.get('Message/ownerDetails', function (data) {

				jsonData = JSON.parse(data);
				dob = jsonData[0]['dob'];
				phone = jsonData[0]['phone'];
				addr = jsonData[0]['address'];
				bio = jsonData[0]['bio'];
	 
			})
		 
			jQuery(document).on('click', '.selfuser', function (event) {
	 
			   
			  jQuery(this).addClass('active')
			  if(jQuery(this).data('universe')==2){
			 
				  appendLeftScreen()
		 
				  jQuery('.secondTab').addClass('active')
					jQuery('.thirdTab').removeClass('active')
 
					jQuery('#universeUserList').hide()
					jQuery('#mode').empty()
					jQuery('#modetype').empty()
					jQuery('#mode').text('Self Mode')
					jQuery('#modetype').text('You Are In Talk To Self Mode')
                    jQuery('#chat_user_list').hide();
				
				}
				if (jQuery(this).data('universe') == 1) {
					jQuery('#mode').empty();
					jQuery('#modetype').empty();
					jQuery('#mode').text('Universe Mode');
					jQuery('#modetype').text('You Are In Talk To Universe Mode');
				  
					jQuery('.thirdTab').addClass('active');
					jQuery('.secondTab').removeClass('active');
				  
					let newdiv = `<div><h3 class="text-center">Universe Mode</h3><p class="text-center">You Are In Talk To Universe Mode</p></div>`;
				  
					jQuery('#owner_profile_details').html(newdiv).css({
						'display': 'flex',
						'justify-content': 'center',
						'color':'white'

					  });
					  jQuery('#owner_profile_details').nextAll('div').slice(0, 2).remove();

				  }
				  
				barIn();
				if (!jQuery('#main').is(":visible")) {
					jQuery('#main').show();
					jQuery('#choose').hide();
				}
				if (!jQuery('#choose').is(":visible")) {
					jQuery('#main').show();
					jQuery('#choose').hide();
				}
				jQuery('.chatting_section').css('display', '');

				bg_image = jQuery(this).data('user_avtar');
				unique_id = jQuery(this).data('uniqueid');
				universe = jQuery(this).data('universe') != '' ? jQuery(this).data('universe') : '0';
				sessionStorage.setItem('unique_id', unique_id)
				sessionStorage.setItem('bg_image', bg_image)

				clearInterval(inter);
				clearInterval(inter3);
 
				getUserDetails(unique_id);
				sendUserUniqIDForMsg(unique_id, bg_image);
			 	inter = setInterval(function () {
					sendUserUniqIDForMsg(unique_id, bg_image);
				 
				}, 1000);
			})
			 
			jQuery('.innerBox').mouseover(function () {
				clearInterval(inter2);
			})
			jQuery('.innerBox').mouseleave(function () {
			 
			})
		})

	}
	
	
	jQuery('.firstTab, .secondTab, .thirdTab').click(function() {
	 
		// Remove active class from all tabs
		jQuery('.firstTab, .secondTab, .thirdTab').removeClass('active');
	  
		// Add active class to the clicked tab
		jQuery(this).addClass('active');
	  });
	   
	selfUser()
	let leftScreenAppended = false;
	function appendLeftScreen() {
		if (!leftScreenAppended) {
			let leftscreen = ` 
			<div class="  text-center" style="background:#20232B;">
			  <div class="choose-left mt-5">
				<h3 id="mode">Self Mode </h3>
				<p id="modetype">You Are In Talk To Self Mode</p>
			  </div>
			  <!-- Tab panes -->
	  
			  <div class="tab-content mt-5">
				 
				 
			  </div>
			  <div class="magamind">
				<ul >
				  <li class="firstTab universe0">
					<a  href="Message"
					  class="universe0"  
					   data-universe="0"
					    
					   >
					  <h5>Talk to anomynous</h5>
					  <h6>Talk to unknown person and identity</h6>
					</a>
				  </li>
				  <li  class="active  secondTab"  >
					<a
					  href="javascript:void(0)"
					  class="selfuser"
					  data-user_avtar="jQuery{jQuery('#user_avtar').val() }"
					  data-uniqueid="jQuery{jQuery('#get_inque_id').val()}"
					  data-universe="2"
					>
					  <h5>Talk to self</h5>
					  <h6>Create message for yourself which disappear quickly</h6>
					</a>
				  </li>
				  <li class="thirdTab">
					<a
					  href="javascript:void(0)"
					  class="selfuser"
					  data-user_avtar="jQuery{jQuery('#user_avtar').val() }"
					  data-uniqueid="jQuery{jQuery('#get_inque_id').val()}"
					  data-universe="1"
					>
					  <h5>Talk to universe</h5>
					  <h6>Talk to your known friend from your friendList</h6>
					</a>
				  </li>
				  </div>
				  <div id="universeUserList" class="user_list userliststyle"> </div>
				</ul>
				 
			</div>
		  `;

			jQuery('#chat_user_list').after(leftscreen);
			leftScreenAppended = true;
		}
	}

	function getUserDetails(uniq_id) {
		jQuery.post('Message/getIndividual', { data: uniq_id, universe: universe }, function (data) {
			var res_data = JSON.parse(data);
			setUserDetails(res_data);
		})
	}
	function setUserDetails(data) {
	 if(data){
	     

		var user_name = `${data[0]['user_name']}`;
		var status = data[0]['user_status'];
		var avtar = `./upload/${data[0]['user_avtar']}`;
		var last_seen = data[0]['last_logout'];
		 var isTyping = data[0]['isTyping'];
		offlineOnlineIndicator(status, last_seen ,isTyping);
		jQuery('#name_last_seen h6').html(user_name);
		jQuery('#chat_profile_image').css('background-image', `url(${avtar})`);
		jQuery('#new_message_avtar').css('background-image', `url(${avtar})`);
		jQuery('#mail_link').attr('href', `mailto:jQuery{data[0]['user_email']}`);

		jQuery('#user_details_container_avtar').css('background-image', `url(${avtar})`);
		jQuery('#details_of_user h5').html(user_name);
		(data[0]['bio'] && data[0]['bio'].length > 1) ? jQuery('#details_of_bio').html(data[0]['bio']) : jQuery('#details_of_bio').html("--Not Given--");

		jQuery('#details_of_created').html(`Created at : jQuery{data[0]['created_at']}`);
		jQuery('#details_of_email').html(`<span><i class="fas fa-envelope text-dark pr-2"></i></span>jQuery{data[0]['user_email']}`);
 
		(data[0]['phone'].length > 1) ?
			jQuery('#details_of_mobile').html(`<span><i class="fas fa-mobile-alt text-dark pr-2"></i></span>jQuery{data[0]['phone']}`) :
			jQuery('#details_of_mobile').html(`<span><i class="fas fa-mobile-alt text-dark pr-2"></i></span>--Not Given--`);

		(data[0]['address'].length > 1) ?
			jQuery('#details_of_location').html(`<span><i class="fas fa-map-marker-alt text-dark pr-2"></i></span>jQuery{data[0]['address']}`) :
			jQuery('#details_of_location').html(`<span><i class="fas fa-map-marker-alt text-dark pr-2"></i></span>--Not Given--`);
	 }

	}

	function offlineOnlineIndicator(data, last_seen,isTyping) {
		if (data == 'active') {
		    if(isTyping=='yes'){
		     jQuery('#name_last_seen p').html("typing...");  
		  
		    } else{
		        
			jQuery('#name_last_seen p').html("Active now");
		    }
		        
			jQuery("#chat_profile_image #online").show();
		} else {
			jQuery("#chat_profile_image #online").hide();
			getLastSeen(last_seen);
		}
	}
	function getLastSeen(data) {
		var { hours, min, sec } = calculateTime(data);
		if (days > 0) {
			jQuery('#name_last_seen p').html(`Last active on ${data}`);
		}
		else {
			(hours > 0) ? jQuery('#name_last_seen p').html(`Last seen at ${hours} hours ${min} minutes ago`) :
				(min > 0) ? jQuery('#name_last_seen p').html("Last seen at " + min + " minutes ago") :
					jQuery('#name_last_seen p').html("Last seen just now");
		}
	}
	function calculateTime(data) {
		oldDate = new Date(data).getTime();
		newDate = new Date().getTime();
		differ = newDate - oldDate;
		days = Math.floor(differ / (1000 * 60 * 60 * 24));
		hours = Math.floor((differ % (1000 * 60 * 60 * 24)) / (60 * 60 * 1000));
		min = Math.floor((differ % (1000 * 60 * 60)) / (60 * 1000));
		sec = Math.floor((differ % (1000 * 60)) / 1000);
		var obj = {
			hours: hours,
			min: min,
			sec: sec
		};
		return obj;
	}
	//sending unique_id which is clicked for messages
	function sendUserUniqIDForMsg(uniq_id, bg_image) {
		jQuery.post('getmessage', { data: uniq_id, user_avtar: bg_image, universe: universe }, function (data) {
			setMessageToChatArea(data, bg_image);//setting messages to the chatting section
		});
	}
	function setMessageToChatArea(data, bg_image) {
		scrollToBottom();
		var res_data;
		if (data.length > 5) {
			jQuery('#chat_message_area').html(data);
		} else {
			var profileName = jQuery('#name_last_seen h6').html();
			jQuery.ajax({
				url: 'Message/setNoMessage',
				type: 'post',
				async: false,
				data: { user_avtar: bg_image, name: profileName },
				success: function (data) {
					res_data = data;

				}
			})
			jQuery('#chat_message_area').html(res_data);
		}
	}
	jQuery('#chat_message_area').mouseenter(function () {
		chatBox.classList.add('active');
		console.log('active')
	});
	jQuery('#chat_message_area').mouseleave(function () {
		chatBox.classList.remove('active');
			console.log('inactive')
	});
	function scrollToBottom() {
		inter4 = setInterval(() => {
			if (!chatBox.classList.contains('active')) {
				chatBox.scrollTop = chatBox.scrollHeight;
			}
		});
	}
jQuery('.search').keyup(function (e) {
     

    var user = document.querySelectorAll('.user');
    var name = document.querySelectorAll('#user_list h6');
    var val = this.value.toLowerCase();
   
    if (val.length > 0) {
        clearInterval(inter2);
         var show =false;
        for (let i = 0; i < user.length; i++) {
            nameVal = name[i].innerHTML
            if (nameVal.toLowerCase().indexOf(val) > -1) {
                user[i].parentNode.style.display = ''; // show the parent node of user[i]
               show=true;
            } else {
                user[i].parentNode.style.display = 'none'; // hide the parent node of user[i]
                
            }
        }
    } else {
        for (let i = 0; i < user.length; i++) {
            // check if the value of the <h6> element is empty
            if (name[i].innerHTML.trim() === '') {
                user[i].parentNode.style.display = 'none'; // hide the parent node of user[i]
              
                 
            } else {
                user[i].parentNode.style.display = ''; // show the parent node of user[i]
            }
        }
    }
});


	function getCharLength() {
		const MAX_LENGTH = 200;
		let len;

		var messageText = document.getElementById('messageText');

		if (messageText.value != '' || messageText.value != null) {
			len = messageText.value.length;
		}

		if (len <= MAX_LENGTH) {
// 			jQuery('#count_text').html(`${len}/200`);
		}
	}
	jQuery('#messageText').on('keyup', function () {
		getCharLength()
	})
	getCharLength()


	// setInterval(getCharLength, 10);


	jQuery('.logout').click(function (e) {

		e.preventDefault();
		var date = new Date();
		date = new Date(date);
		date = date.toLocaleString();
		jQuery.ajax({
			url: base_url + 'tkclogout',
			type: 'post',
			data: "date=" + date,
			success: function (res) {
				console.log(res);
				location.href = res;
			}
		})
	});
	


	
	//send message after button click
	// Create the audio object

 
	function sendMessage( file =null) {
	  https://talkmos.com/Message
	var audio = new Audio('http://talkmos.com/assets/sound/msg.mp3');
		audio.play();
      getUserList(null,null)
 
// 		jQuery('#count_text').html('0/200');
		var d = new Date(),
			messageHour = d.getHours(),
			messageMinute = d.getMinutes(),
			messageSec = d.getSeconds(),
			messageYear = d.getFullYear(),
			messageDate = d.getDate(),
			messageMonth = d.getMonth() + 1,
			actualDateTime = `${messageYear}-${messageMonth}-${messageDate} ${messageHour}:${messageMinute}:${messageSec}`;

		var message = jQuery('#messageText').val();
		if(message==""){
		    if(file!=''){
		       message =file 
		    }
		}
		if (message != '') {
			var data = {
				message: message,
				datetime: actualDateTime,
				uniq: unique_id,
				universe: universe,
			}
		}
 

		var jsonData = JSON.stringify(data);
				if(message!=""){
	    	jQuery.post('sent', { data: jsonData }, function (data) {
		    if(data){
		       sendUserUniqIDForMsg(unique_id, bg_image);
		    } 
		    
			jQuery('#messageText').val('');
	     	})
				    
				}
	}
  
   

	jQuery('#send_message').on('click', function () {
		sendMessage()
	 
		jQuery('#emojitabs').hide()
	})
	function sendclick() {

		if (jQuery("#choose").css("display") === "none") {
			sendMessage()
			jQuery('#emojitabs').hide()
		 
		}
	}

	  Mousetrap.bind("enter", sendclick);

	  jQuery("#messageText").on("keypress", function(e) {
		if (e.which == 13) { // Check if the pressed key is "enter"
			sendclick(); // Call the sendclick function
			return false; // Prevent the default action of "enter" key
	   	}
	   });
 
	jQuery('#update_container i').click(function () {
		jQuery('#main').removeClass('blur');
		jQuery('#update_container').hide();
	})
	//update form container submit event
	jQuery('#form_details').on('submit', function (e) {
		e.preventDefault();
		var newDate = jQuery('#dob').val();
		var newPhone = jQuery('#phone_num').val();
		var newAddress = jQuery('#address').val();
		var newBio = jQuery('#update_bio').val();
		jQuery.post('Message/updateBio', { dob: newDate, phone: newPhone, address: newAddress, bio: newBio }, function (data) {
			jQuery('#main').removeClass('blur');
			jQuery('#update_container').hide();
		})
	})
	jQuery('#details_btn').click(function () {
		var bar = document.getElementById('details_of_user').style;
		if (bar.width == "20%") {
			barOut();
		} else {
			barIn();
		}
	})
	jQuery('#btn_block').click(function () {
// 		var d = new Date(),
// 			messageHour = d.getHours(),
// 			messageMinute = d.getMinutes(),
// 			messageSec = d.getSeconds(),
// 			messageYear = d.getFullYear(),
// 			messageDate = d.getDate(),
// 			messageMonth = d.getMonth() + 1,
// 			actualDateTime = `jQuery{messageYear}-jQuery{messageMonth}-jQuery{messageDate} jQuery{messageHour}:jQuery{messageMinute}:jQuery{messageSec}`;
	const d = new Date();
         
		actualDateTime = d.toISOString().slice(0, 19).replace("T", " ");
		if (this.innerHTML == "Block User") {
			jQuery.post('Message/blockUser', { time: actualDateTime, uniq: unique_id })
		} else {
			jQuery.post('Message/unBlockUser', { uniq: unique_id })
		}
	})
	//working on block & unblock program
	function getBlockUserData() {
		jQuery.post('Message/getBlockUserData', { uniq: unique_id }, function (data) {
			var jsonData = JSON.parse(data);
			if (jsonData.length == 1) {
				for (var i = 0; i < jsonData.length; i++) {
					if (jsonData[i]['blocked_from'] == unique_id) {
						jQuery('#messageText').attr('disabled', '');
						jQuery('#messageText').attr('placeholder', 'This user is not receiving messages at this time.');
						jQuery('#messageText').css('cursor', 'no-drop');
						jQuery('#btn_block').html('Block User');
						jQuery('#send_message').attr('disabled', '');
						jQuery('#send_message').css('cursor', 'no-drop');
					} else {
						jQuery('#messageText').attr('disabled', '');
						jQuery('#messageText').attr('placeholder', 'You have blocked this user');
						jQuery('#btn_block').html('Unblock User');
						jQuery('#messageText').css('cursor', 'no-drop');

						jQuery('#send_message').attr('disabled', '');
						jQuery('#send_message').css('cursor', 'no-drop');
					}
				}
			} else if (jsonData.length == 2) {
				jQuery('#messageText').attr('disabled', '');
				jQuery('#messageText').attr('placeholder', 'You both are blocked each other');
				jQuery('#btn_block').html('Unblock User');
				jQuery('#messageText').css('cursor', 'no-drop');
				jQuery('#send_message').attr('disabled', '');
				jQuery('#send_message').css('cursor', 'no-drop');
			} else {
				jQuery('#messageText').removeAttr('disabled');
				jQuery('#messageText').attr('placeholder', 'Start Typing. . . .');
				jQuery('#btn_block').html('Block User');
				jQuery('#messageText').css('cursor', '');
				jQuery('#send_message').removeAttr('disabled');
				jQuery('#send_message').css('cursor', '');
			}
		})
	}
 


	jQuery('#talkToUniverse').on('click', function () {

		jQuery('#chat_user_list').show();
		jQuery('#chattypelist').hide();
	})

	function userLastScene() {
		var currentTime = new Date();

		var lastSeenTime = new Date("2022-05-20T11:55:00");

		if (currentTime.toDateString() === lastSeenTime.toDateString()) {
			console.log("Last seen today");
		}
		else if (currentTime.toDateString() === new Date(lastSeenTime.getTime() + (24 * 60 * 60 * 1000)).toDateString()) {
			console.log("Last seen yesterday");
		}
		else {
			console.log("Last seen on " + lastSeenTime.toLocaleString('default', { weekday: 'long' }));
		}

	}



 

 
	function loadAllEmoji() {
		var emoji = '';
		for (var i = 128512; i <= 128580; i++) {
			emoji += `<a  class="getemoji" data-emoji='&#` + i + `;' style="font-size: 22px;">&#${i};</a>`;
		}
		document.getElementById('emojitabs').innerHTML = emoji;
	}

	jQuery('#emojitabs').hide()

	jQuery('#emoji').on('click', function () {
		loadAllEmoji();
		if (jQuery('#emojitabs').is(':visible')) {
			jQuery('#emojitabs').hide();
		} else {
			jQuery('#emojitabs').show();
		}
	});

	jQuery(document).on('click', '.getemoji ', function (event) {

		jQuery('#messageText').val(jQuery('#messageText').val() + ' ' + jQuery(this).data('emoji'))
	});





	jQuery('#attachment').on('click', function () {
	 
		jQuery('#attach-input').click();
 	})


    var mediaResponse;
    jQuery('#attach-input').on('change', function () {
           $('#isReady').val('false'); 
         	var d = new Date(),
				actualDateTime = d.toISOString().slice(0, 19).replace("T", " ");
	         jQuery('#actualDateTime').val(actualDateTime)
             jQuery('#unique_id').val(unique_id)
             jQuery('#universe').val(universe)
	   
	    	$('#attach-form').ajaxSubmit({
			target: "#setUploadedImg",
			resetForm: true,
			success: function(responseText, statusText, xhr, $form) {
            if (statusText == 'success') {
                  mediaResponse = responseText;
                   
              
               $('#clickToupload').click();
          
            } 
                
        }
		});
 
                
 
 
	})


   function getMedia(response) {
    const parser = new DOMParser();
    const doc = parser.parseFromString(response, 'text/html');
    const pElements = doc.querySelectorAll('p');
            
    for (const p of pElements) {
        const message = p.outerHTML;
        sendMessage(message);
    }
}

  jQuery('#sendMediaToChat').on('click', function() {
            jQuery('#fileupload').modal('hide')
            $('#isReady').val('true');  
            $('#attach-form').ajaxSubmit({
                target: "#setUploadedImg",
                resetForm: false,
                success: function(responseText, statusText, xhr, $form) {
                    if (statusText == 'success') {
                        // Pass mediaResponse variable to getMedia function
                        getMedia(mediaResponse);
                    } 
                }
            });
        });

 

	userLastScene()
	jQuery('.setting').on('click',function(){
		jQuery('.setbtn').trigger('click')
	})
	
	
	const getid =(e)=>document.getElementById(e)
	
	let allAvtar= document.querySelector('.nav-pills').querySelectorAll('a img ')
	allAvtar.forEach((e)=>{
	  
		e.addEventListener('click',function(){
			let image= this.getAttribute('image');
			getid('useravtar').value =image
			console.log(image)
		   })
	   }) 


 jQuery('#updateProfile').on('click',function(){
 
		// get the selected values
var selectedLang = jQuery('#getselectedlang').val();
var selectedGender = jQuery('#getselectedGender').val();
var selectedAvtar = jQuery('#useravtar').val();

// create data object to send with the API request
var data = {
  language: selectedLang,
  gender: selectedGender,
  avatar: selectedAvtar
};

// hit the API endpoint to update the user profile

jQuery.post('Message/updateProfile',data, function (data) {
	 if(data=="TRUE"){
		alert("Profile Updated Successfully")
	 }
})
})


 
jQuery('#selectGender, #selectlanguage').on('change', function() {
	var gender = jQuery('#selectGender').val();
	var language = jQuery('#selectlanguage').val();
  
	// Use the selected values to filter your data
	var filteredData = filterData(gender, language);
  
	// Do something with the filtered data, such as display it in a table
	displayData(filteredData);
  });

  function filterData(gender, language) {
	// Implement your filtering logic here
	// This is just a dummy example that returns all data
	return data;
  }
  
  function displayData(data) {
	// Implement your display logic here
	// This is just a dummy example that logs the data to the console
	console.log(data);
  }
jQuery('.backbtn').on('click', function(){
   location.reload();
});


 
function updateUnSeemMsg(uniqe_id) {
    if (uniqe_id != "") {
        jQuery.post('Message/updateUnSeenMsg', { uniqe_id: uniqe_id, universe: universe }, function (data) {
            if (data) {
            
               setTimeout(function() {
                    DeleteSelfMessage(uniqe_id); // Call DeleteSelfMessage() after 10 seconds
                }, 10000); // 10000 milliseconds = 10 seconds
                getUserList(null, null);
            
            }
        });
    }
}

function DeleteSelfMessage(uniqe_id) {
    
    jQuery.post(base_url + 'Message/deleteMessage', { uniqe_id: uniqe_id }, function (data) {
      console.log(data)
    });
}

 
 
 
   	jQuery(document).on('focus', '#messageText', function(){
   	   
     var  unique_id =jQuery('#header').attr('unique_id');
 
		var is_type = 'yes';
	     jQuery.post(base_url + 'Message/IsTyping', { is_type: is_type,unique_id:unique_id }, function (data) {
	          
    });
         
	});
    jQuery(document).on('blur', '#messageText', function(){
   	    	   
     var  unique_id =jQuery('#header').attr('unique_id');
		var is_type = 'no';
	     jQuery.post(base_url + 'Message/IsTyping', { is_type: is_type ,unique_id:unique_id}, function (data) {
	          
    });
         
	});
 
 
 
 
let setUserTimeout;
let setUserStatus = false;

function checkUserStatus() {
  let getUserStatus = document.getElementById('main');

  if (getUserStatus) {
    if (getUserStatus.offsetWidth > 0 || getUserStatus.offsetHeight > 0) {
      setUserStatus = true;
      clearTimeout(setUserTimeout);
    } else {
      setUserStatus = false;
    }
  }
  
  GetsetUserStatus(setUserStatus);
  setUserTimeout = setTimeout(checkUserStatus, 1000);
}

function GetsetUserStatus(status) {
  if (status) {
    console.log(status);
       console.log('user active');
  } else {
    console.log('user inactive');
    clearTimeout(setUserTimeout);
  }
}

setTimeout(checkUserStatus, 1000);


 
//  // Disable copy/paste
// document.addEventListener('copy', function(e) {
//     e.preventDefault();
// });

// document.addEventListener('cut', function(e) {
//     e.preventDefault();
// });

// document.addEventListener('paste', function(e) {
//     e.preventDefault();
// });

// // Disable control/shift keys
// document.addEventListener('keydown', function(e) {
//     if (e.ctrlKey || e.shiftKey) {
//         e.preventDefault();
//     }
// });

 
 

});

