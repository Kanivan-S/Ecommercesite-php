// var input_fields = document.querySelectorAll(".input");
var input_uname=document.querySelector(".input_username");
var input_email=document.querySelector(".input_email");
var input_pswd=document.querySelector(".input_pswd");
var input_repswd=document.querySelector(".input_repswd");
var signup_btn = document.querySelector("#signup_btn");
var input_fields = [input_uname,input_email,input_pswd,input_repswd];
input_fields.forEach(function(input_item){
	input_item.addEventListener("input", function(){
		if(input_item.value.length > 6){
			signup_btn.disabled = false;
			signup_btn.className = "btn-enabled"
		}
		
	})
})

function signupvalidation(){
	var input_pswd=document.querySelector(".input_pswd");
    var input_repswd=document.querySelector(".input_repswd");
	if(input_pswd.value !== input_repswd.value ){
		alert("Password and confirm password mismatched!");
		input_pswd.style.border = "1px solid #f74040";
		input_repswd.style.border = "1px solid #f74040";
		return false;
	}
	else{
		return true;
	}
	
}

