
$(window).load(function() { 
			$(".pag-top").each(function() {
				var count = $(".pag-top li").length;
				$(".pag-top ul").css({'width':20 * count + 'px'});
			});
			$(".pag-bottom").each(function() {
				var count = $(".pag-bottom li").length;
				$(".pag-bottom ul").css({'width':20 * count + 'px'});
			});
			
});
function signUp()
{    
	var loginStatus=logup_validate();
    if(loginStatus != 0){
    	return;
    }  
	
	document.getElementById("signup").submit();
 }
 function signIn()
{    
	var loginStatus=login_validate();
	if(loginStatus != 0){
    	return;
    }  
	document.getElementById("signin").submit();
 }

 function submitFeedback()
{    
	var loginStatus=feedback_validate();
	if(loginStatus != 0){
    	return;
    }  
	document.getElementById("from_feedback").submit();
 }
 function find_store()
{    
	var loginStatus=store_validate();
	if(loginStatus != 0){
    	return;
    }  
	document.getElementById("frm_store").submit();
 }

 function resetPassword()
{    
	var f=0;
	var error_message="";
	var emailfilter=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
    if(document.getElementById('email').value=='')
	{
		error_message =  error_message + "<font style='float: left;'>Please Enter Email</font><br>";
		$("#email").addClass("fld-error");
		f++;
	}
	else if(!emailfilter.test((document.getElementById('email').value).toLowerCase()))
	{
		error_message =  error_message + "<font style='float: left;'>Please Enter a vaild Email</font><br>";
		$("#email").addClass("fld-error");
		f++;
	}
	else
	{
			$("#email").removeClass("fld-error");
	}
	if(f != 0)
	{
		$(".error").html(error_message);
	}
	else
	{
		$(".error").html("");
		document.getElementById("reset_frm").submit();
	}
 }
  function changePassword()
 {    
	var f=0;
	var error_message="";
	if(document.getElementById('resetCode').value=='')
	{
	       error_message = error_message + "<font style='float: left;'>You do not have resetCode.</font><br>"
			f++;
	}
	else
	{
		if(document.getElementById('new_pin').value=='')
		{

			error_message =  error_message + "<font style='float: left;'>Please Enter New PIN</font><br>"
			$("#new_pin").addClass("fld-error");
			f++;
		}
		else if(!$.isNumeric(document.getElementById('new_pin').value))
		{
			error_message =  error_message + "<font style='float: left;'>New PIN must be Number</font><br>"
			$("#new_pin").addClass("fld-error");
			f++;
		}
		else if((document.getElementById('new_pin').value).length != 4)
		{
			error_message =  error_message + "<font style='float: left;'>Please Input 4 digit for PIN</font><br>"
			$("#new_pin").addClass("fld-error");
			f++;
		}
		else

		{
			$("#new_pin").removeClass("fld-error");
		}
		if(document.getElementById('confrirm_pin').value=='')
		{
			error_message = error_message + "<font style='float: left;'>Please Enter Confirm PIN</font><br>"
			$("#confrirm_pin").addClass("fld-error");
			f++;
		}
		else if(!$.isNumeric(document.getElementById('confrirm_pin').value))
		{
			error_message = error_message + "<font style='float: left;'>Confirm PIN must be Number</font><br>"
			$("#confrirm_pin").addClass("fld-error");
			f++;
		}
		else if(document.getElementById('new_pin').value!=document.getElementById('confrirm_pin').value)
		{
			error_message = error_message + "<font style='float: left;'>Sorry your PIN doesn't match</font><br>"
			$("#confrirm_pin").addClass("fld-error");
			f++;
		}
		else
		{
			$("#confrirm_pin").removeClass("fld-error");
		}
	}
	if(f != 0){

		$(".error").html(error_message);
		return;
    }  
	else
	{
		$(".error").html("");
		document.getElementById("changPIN_frm").submit();
	}
 }

function logup_validate()
{
	var f=0;
	var phone_regex = /^[0-9 +*_.-]+$/i;
	var emailfilter=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
	if(document.getElementById('email').value=='')
	{
		alert("Please Enter Email");
		f++;
	}
	else if(document.getElementById('country').value=='')
	{
		alert("Please Select Location");
		f++;
	}
	else if(document.getElementById('password').value=='')
	{
		alert("Please Enter Create a PIN");
		f++;
	}
	else if((document.getElementById('password').value).length != 4)
	{
		alert("Please Input 4 digit for PIN");
		f++;
	}
	else if(document.getElementById('re_password').value=='')
	{
		alert("Please Enter Confirm PIN");
		f++;
	}

	else if(!emailfilter.test((document.getElementById('email').value).toLowerCase()))
	{
		alert("Please Enter a vaild Email");
		f++;
	}
	
	else if(!$.isNumeric(document.getElementById('password').value))
	{
		alert("Create PIN must be Number");
		f++;
	}
	
	else if(document.getElementById('password').value != document.getElementById('re_password').value)
	{
		alert("Confirm PIN does not match");
		f++;
	}
	else if(document.getElementById('agree').value==0)
	{
		alert("Please check agree");
		f++;
	}
    else if(f==0)
    {
        return 0;
    }
 }
 function feedback_validate()
{
	var f=0;
	var error_message="";
	var phone_regex = /^[0-9 +*_.-]+$/i;
	var emailfilter=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
	if(document.getElementById('name').value=='')
	{
		error_message = "<font style='float: left;'>Please Enter Your Name</font><br>"
		$("#name").addClass("fld-error");
		f++;
	}
	else
	{
		$("#name").removeClass("fld-error");
	}
    if(document.getElementById('email').value=='')
	{
		error_message = error_message + "<font style='float: left;'>Please Enter Your Email</font><br>"
		$("#email").addClass("fld-error");
		f++;
	} 
	else if(!emailfilter.test((document.getElementById('email').value).toLowerCase()))
	{
		error_message = error_message + "<font style='float: left;'>Please Enter a vaild Email</font><br>"
		$("#email").addClass("fld-error");
	
		f++;
	}
	else
	{
		$("#email").removeClass("fld-error");
	}
	if(document.getElementById('phone').value=='')
	{
		error_message = error_message + "<font style='float: left;'>Please Enter Telephone</font><br>"
		$("#phone").addClass("fld-error");
		f++;
	}
	else if(!phone_regex.test(document.getElementById('phone').value))
	{
		error_message = error_message + "<font style='float: left;'>Please Enter a vaild Telephone</font><br>"
		$("#phone").addClass("fld-error");
		f++;
	}
	else
	{
		$("#phone").removeClass("fld-error");
	}
	if(document.getElementById('subject').value=='')
	{
		error_message = error_message + "<font style='float: left;'>Please Select Subject</font><br>";
		$("#subject_input").css("border", "3px solid #f34850");
		f++;
	}
	else
	{
		$("#subject_input").css("border", "1px solid #e5e5e5");
	}
   if(document.getElementById('message').value=='')
	{
		error_message = error_message + "<font style='float: left;'>Please Enter Your Message</font><br>"
		$("#message").css("border", "3px solid #f34850");
		f++;
	}
	else
	{
		$("#message").css("border", "1px solid #e5e5e5");
	}
    if(f==0)
    {
        $(".error").html("");
		return 0;
    }
	else
	{
			$(".error").html(error_message);
	}
 }

  function login_validate()
{
	var f=0;
	var error_message="";
	var emailfilter=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

	if(document.getElementById('email').value=='')
	{
		error_message =  error_message +  "<font style='float: left;'>Please Enter Email</font><br>"
		$("#email").addClass("fld-error");
		
		f++;
	}
	else  if(!emailfilter.test((document.getElementById('email').value).toLowerCase()))
	{
		error_message = error_message + "<font style='float: left;'>Please Enter a vaild Email</font><br>"
		$("#email").addClass("fld-error");
		f++;
	}
	else
	{
		
		$("#email").removeClass("fld-error");
	}
    
	 if(document.getElementById('password').value=='')
	{

		error_message = error_message + "<font style='float: left;'>Please Enter PIN</font><br>"
	$("#password").addClass("fld-error");
		f++;
	}
	else  if(!$.isNumeric(document.getElementById('password').value))
	{
		error_message = error_message + "<font style='float: left;'>Please Enter a integer PIN</font><br>"
		$("#password").addClass("fld-error");
		f++;
	}
	else if((document.getElementById('password').value).length != 4)
	{
			error_message =  error_message + "<font style='float: left;'>Please Input 4 digit for PIN</font><br>"
			$("#password").addClass("fld-error");
			f++;
		}
	else
	{
		$("#password").removeClass("fld-error");
	}
    if(f==0)
    {
        return 0;
    }
	else
	{
		$(".error").html("");
		$(".error").html(error_message);
	}
 }
 function store_validate()
{
	var f=0;
	if(document.getElementById('postal').value=='')
	{
		alert("Postal Code Missing");
		f++;
	}
    else if(f==0)
    {
        return 0;
    }
 }

  function invite_validate()
{
	var f=0;
	var error_message="";
	var emailfilter=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
	if(document.getElementById('location').value=='')
	{
		error_message = error_message + "<font style='float: left;'>Please Select Where</font><br>";
		$("#location_input").css("border", "3px solid #f34850");
		f++;
	}
	else
	{
		$("#location_input").css("border", "1px solid #e5e5e5");
	}
    if(document.getElementById('datepicker').value=='')
	{
		error_message = error_message + "<font style='float: left;'>Please Select Date</font><br>"
		$("#datepicker").addClass("fld-error");
		f++;
	}
	else
	{
		$("#datepicker").removeClass("fld-error");
	}
    if(document.getElementById('timepicker').value=='')
	{
		error_message = error_message + "<font style='float: left;'>Please Select Time</font><br>"
		$("#timepicker").addClass("fld-error");
		f++;
	}
	else
	{
		$("#timepicker").removeClass("fld-error");
	}
	if((document.getElementById('email1').value=='') && (document.getElementById('email2').value=='') && (document.getElementById('email3').value=='') && (document.getElementById('email4').value==''))
	{
		error_message = error_message + "<font style='float: left;'>Please Enter Email</font><br>"
		$("#email1").addClass("fld-error");
		f++;
	}
	else if((document.getElementById('email1').value!='') && (!emailfilter.test(document.getElementById('email1').value)))
	{
		error_message = error_message+ "<font style='float: left;'>Please Enter a vaild First Email</font><br>"
		$("#email1").addClass("fld-error");
		f++;
	}
	else
	{
		$("#email1").removeClass("fld-error");
	}
	if((document.getElementById('email2').value!='') && (!emailfilter.test(document.getElementById('email2').value)))
	{
		error_message = error_message + "<font style='float: left;'>Please Enter a vaild</font><br><font style='float: left;'>Second Email</font><br>"
		$("#email2").addClass("fld-error");
		f++;
	}
	else
	{
		$("#email2").removeClass("fld-error");
	}
	if((document.getElementById('email3').value!='') && (!emailfilter.test(document.getElementById('email3').value)))
	{
		error_message = error_message + "<font style='float: left;'>Please Enter a vaild</font><br><font style='float: left;'>Third Email</font><br>"
		$("#email3").addClass("fld-error");
		f++;
	}
	else
	{
		$("#email3").removeClass("fld-error");
	}
	if((document.getElementById('email4').value!='') && (!emailfilter.test(document.getElementById('email4').value)))
	{
		error_message = error_message + "<font style='float: left;'>Please Enter a vaild</font><br><font style='float: left;'>Fourth Email</font><br>"
		$("#email4").addClass("fld-error");
		f++;
	}
	else
	{
		$("#email4").removeClass("fld-error");
	}

	if(f==0)
    {
       
		$(".error").html("");
		return 0;
    }
	else
	{
		
		$(".error").html(error_message);
	}
 }
 function offer_flag_check()
 {
	if($('#offer_flag').val() == 0)
		$('#offer_flag').val(1);
	else
		$('#offer_flag').val(0)
 }

 function agree_check()
 {
	if($('#agree').val() == 0)
		$('#agree').val(1);
	else
		$('#agree').val(0)
 }
function keep_check()
 {
	if($('#keep').val() == 0)
		$('#keep').val(1);
	else
		$('#keep').val(0)
 }

function invite_send()
{
	
	    $(".error").text("");
		$("#location_input").removeClass("fld-error");
		$("#datepicker").removeClass("fld-error");
		$("#timepicker").removeClass("fld-error");
		$("#email1").removeClass("fld-error");
	var loginStatus=invite_validate();
    if(loginStatus != 0){
    	return;
    } 
	var date = document.getElementById('datepicker').value;
	var time = document.getElementById('timepicker').value;
	var where = document.getElementById('location').value;
	$("#invite_form1").hide();
	$("#invite_form2").show();
	$("#send_date").html(date);
	$("#send_time").html(time);
	$("#send_where").html(where);
	$("#invite_title").html("Preview Your Invitation");
}

function invite_edit()
{
	
	$("#invite_form2").hide();
	$("#invite_form1").show();
	$("#invite_title").html("Invite Someone");
}
function invite_confirm()
{
	$("#confirm_btn").attr("onclick", "return false");
	document.getElementById("invite_frm").submit();
}
function func_purchase(customer_point, reward_id, reward_point)
{
	$('#reward_id').val(reward_id);
	$('#reward_point').val(reward_point);
	$('#popup_title').text("Are you Sure?");
	$('#popup_content').html("You have <b style='color: #A42225'>" + customer_point + "</b> points, are you sure to purchase this reward?");
	$('#popup_btn_group1').show();
	$('#popup_btn_group2').hide();
	$('#popup_btn1').text('CANCEL');
	$('#popup_btn1').attr('onclick', '$("#popup").dialog("close");');
	$('#popup_btn2').text('PURCHASE');
	$('#popup_btn2').attr('onclick', 'agree_purchase();');
	$('#popup').dialog('open'); 
}
function agree_purchase()
{
	$('#popup').dialog('close'); 
	
	var customer_point, reward_point, reward_id;
	customer_point = $('#customer_point').val();
	reward_point = $('#reward_point').val();
	reward_id = $('#reward_id').val();
	if(customer_point < reward_point)
	{
		
		$('#popup_title').text("Points Alert");
		$('#popup_content').html("Sorry, you don't have enough points. <br> This rewards requires " + reward_point + " points, you currently have " + customer_point);
		$('#popup_btn_group1').hide();
		$('#popup_btn_group2').show();
		$('#popup_btn3').text('OK');
		$('#popup_btn3').attr('onclick', '$("#popup").dialog("close");');
		$('#popup').dialog('open'); 
	}
	else
	{
			$.ajax({
				url: base_url + "allRewards/purchase",
				method: "POST",
				dataType: 'json',
				data: {'id':reward_id,  'point': reward_point},
				error: function() { 
					alert(1);
				},
				success: function(data) {
					$('#popup_title').text("Purchase Success");
					$('#popup_content').html("You have purchased your reward <br>which will be stored in 'My Rewards'");
					$('#popup_btn_group1').show();
					$('#popup_btn_group2').hide();
					$('#popup_btn1').text('FINISH');
					$('#popup_btn1').attr('onclick', '$("#popup").dialog("close");');
					$('#popup_btn2').text('MY REWARDS');
					$('#popup_btn2').attr('onclick', 'go_myRewards();');
					$('#popup').dialog('open'); 
				}
			});
	}
}
function go_myRewards()
{
	window.location = base_url + "myRewards/page";
}
function editUser()
{
	var loginStatus=edit_validate();
    if(loginStatus != 0){
    	return;
    }  
	
	document.getElementById("edit_frm").submit();
}
function edit_validate()
{
	var f=0;
	var error_message="";
	var phone_regex = /^[0-9 +*_.-]+$/i;
	var emailfilter=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
	if(document.getElementById('first_name').value=='')
	{
		error_message = error_message+ "<font style='float: left;'>Please Enter First Name</font><br>"
		$("#first_name").addClass("fld-error");
		f++;
	}
	else if((document.getElementById('first_name').value).length > 30)
	{
		error_message = error_message+ "<font style='float: left;'>Please Enter no more than 30 characters<br> for First Name</font><br>"
		$("#first_name").addClass("fld-error");
		f++;
	}
	else
	{
		$("#first_name").removeClass("fld-error");
	}
    
   if(document.getElementById('last_name').value=='')
	{
		error_message = error_message+ "<font style='float: left;'>Please Enter Last Name</font><br>"
		$("#last_name").addClass("fld-error");
		f++;
	}
	else if((document.getElementById('last_name').value).length > 30)
	{
		error_message = error_message+ "<font style='float: left;'>Please Enter no more than 30 characters<br> for Last Name</font><br>"
		$("#first_name").addClass("fld-error");
		f++;
	}
	else
	{
		$("#last_name").removeClass("fld-error");
	}
	if(document.getElementById('cell_num').value=='')
	{
		error_message = error_message+ "<font style='float: left;'>Please Enter Cell Number</font><br>"
		$("#cell_num").addClass("fld-error");
		f++;
	}
	else if((document.getElementById('cell_num').value).length > 30)
	{
		error_message = error_message+ "<font style='float: left;'>Please Enter no more than 30 digits<br> for Cell Number</font><br>"
		$("#first_name").addClass("fld-error");
		f++;
	}
	else if(!phone_regex.test(document.getElementById('cell_num').value))
	{
		error_message = error_message+ "<font style='float: left;'>Please Enter a vaild Cell Number</font><br>"
		$("#cell_num").addClass("fld-error");
		f++;
	}
	else
	{
		$("#cell_num").removeClass("fld-error");
	}
	if(document.getElementById('email').value=='')
	{
		error_message = error_message+ "<font style='float: left;'>Please Enter Email</font><br>"
		$("#email").addClass("fld-error");
		f++;
	} 
	else if(!emailfilter.test((document.getElementById('email').value).toLowerCase()))
	{
		error_message = error_message+ "<font style='float: left;'>Please Enter a vaild Email</font><br>"
		$("#email").addClass("fld-error");
		f++;
	}
	else
	{
		$("#email").removeClass("fld-error");
	}
	if(document.getElementById('country').value=='')
	{
		error_message = error_message+ "<font style='float: left;'>Please Select Location</font><br>";
		$("#country_input").css("border", "3px solid #f34850");
		f++;
	}
	else
	{
		$("#country_input").css("border", "1px solid #e5e5e5");
	}
	
	if(document.getElementById('password').value=='')
	{
		error_message = error_message+ "<font style='float: left;'>Please Enter Create a PIN</font><br>"
		$("#password").addClass("fld-error");
		f++;
	}
	else if(!$.isNumeric(document.getElementById('password').value))
	{
		error_message = error_message+ "<font style='float: left;'>Create PIN must be Number</font><br>"
		$("#password").addClass("fld-error");
		f++;
	}
	else if((document.getElementById('password').value).length != 4)
	{
			error_message =  error_message + "<font style='float: left;'>Please Input 4 digit for PIN</font><br>"
			$("#password").addClass("fld-error");
			f++;
	}
	else
	{
		$("#password").removeClass("fld-error");
	}	
	 if(f==0)
    {
        $(".error").html("");
		return 0;
    }
	else
	{
		$(".error").html(error_message);
	}

}
function vaild_date()
{
	$("#datepicker").val('');
}
function vaild_time()
{
	$("#timepicker").val('');
}

function loginPress(e)
{
	var evt = e || window.event;
	if (evt.keyCode == 13) {
          signIn();
    }
}
function check_length(e)
{

	if((e.value).length > 30)
	{
		alert("Please Enter no more than 30 characters for " + e.title);
	}
	var string = (e.value).substring(0, 30);
	$(e).val(string);
}