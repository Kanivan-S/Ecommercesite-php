var input_fields = document.querySelectorAll(".input");
var login_btn = document.querySelector("#login_btn");

input_fields.forEach(function(input_item){
	input_item.addEventListener("input", function(){
		if(input_item.value.length > 6){
			login_btn.disabled = false;
			login_btn.className = "btn-enabled"
		}
	})
})
function loginvalidation(){
	var input_text = document.querySelector("#entryemail");
	var input_password = document.querySelector("#entrypswd");

	if(input_text.value.length <= 3 || input_password.value.length <= 3 ){
		alert("Invalid username or password")
		input_text.style.border = "1px solid #f74040";
		input_password.style.border = "1px solid #f74040";
		return false;
	}
	else{
		return true;
	}
	
}
