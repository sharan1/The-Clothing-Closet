function showLogin() {
	document.getElementById('login-wrapper').style.display = "inline";
	document.getElementById('rp-wrapper').style.display = "none";
	document.getElementById('loginbutton').style.background = "#7BA31C";
	document.getElementById('rstPass').style.background = "#000";
}		
function showRP() {
	document.getElementById('login-wrapper').style.display = "none";
	document.getElementById('rp-wrapper').style.display = "inline";
	document.getElementById('loginbutton').style.background = "#000";
	document.getElementById('rstPass').style.background = "#7BA31C";
}

$('.rp-button').on('click', function(e)
{
	e.preventDefault();
	email_val = $('.email-text').val();
	//alert(email_val);
    $.ajax({
       url: "?r=ajax/message",
       type: 'post',
       data: {email: $('.email-text').val()},
       success: function (data) {
          $('#show-message').html(data);
       }

  	});
});

$('#signup-form').on('beforeSubmit', function (e) {
	username = $('#available-username').val();
	email = $('#available-email').val();
    $.ajax({
        url: "?r=ajax/signupform",
        type: 'post',
        data: {username:username,email:email},
        success: function (data) {
            if(data!='')
            {
            	alert(data);
            	return false;
            }
        },
        error: function () {
            return false;
        }

    });
    return true;
});
