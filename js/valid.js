/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

		
				 function validfname()
				{
					var firstname = document.getElementById('form-firstname');
					var fnam=/^[a-zA-Z]{4,15}$/;
					if(firstname.value.search(fnam)==-1)
					{
						 alert("enter correct  first name");
						 firstname.focus();
						 return false;
					 }
				}
				function validlname()
				{
					 var lastname = document.getElementById('lastname');
					 var lnam=/^[a-zA-Z]{4,15}$/;
					 if(lastname.value.search(lnam)==-1)
					 {
						 alert("enter correct  last name");
						 lastname.focus();
						 return false;
					 }
				}
				function email()
				{
					var vilidemail = document.getElementById('form-email');
					var email=/^[a-zA-Z0-9-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
					if(vilidemail.value.search(email)==-1)
					 {
						 alert("enter correct email");
						 vilidemail.focus();
						 return false;
					 }
				} 
				function pass()
				{
					var validpass = document.getElementById('form-password');
					var pass=/^[a-zA-Z0-9-_]{6,16}$/;
				   if(validpass.value.search(pass)==-1)
					{
						 alert("enter correct password");
						 validpass.focus();
						 return false;
					 }
				 }
				 function rpass()
				{
					var rpass = document.getElementById('form-rpassword');
					var validpass = document.getElementById('form-password');
				   if(rpass.value!=validpass.value)
					{
						 alert("You New and repeat password not matched");
						 rpass.focus();
						 return false;
					 }
				 }
				 function phone()
				{
					var phone = document.getElementById('form-phone');
					var phn=/^[0-9]{9,14}$/;
				   if(phone.value.search(phn)==-1)
					{
						 alert("enter correct phone no");
						 phone.focus();
						 return false;
					 }
				 }
				  function program()
				{
					var program = document.getElementById('form-department');
					if(program.value==="")
					{
						 alert("Select Any program");
						 phone.focus();
						 return false;
					 }
				 }
				 function semester()
				{
					var semester = document.getElementById('form-semester');
					if(semester.value==="")
					{
						 alert("Select Any semester");
						 phone.focus();
						 return false;
					 }
				 }
				 function final()
				 {
					var firstname = document.getElementById('form-firstname');
					var fnam=/^[a-zA-Z]{4,15}$/;
					var lastname = document.getElementById('lastname');
					var lnam=/^[a-zA-Z]{4,15}$/;
					var vilidemail = document.getElementById('form-email');
					var email=/^[a-zA-Z0-9-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
					var validpass = document.getElementById('form-password');
					var pass=/^[a-zA-Z0-9-_]{6,16}$/;
					var rpass = document.getElementById('form-rpassword');
					var pass=/^[a-zA-Z0-9-_]{6,16}$/;
					var phone = document.getElementById('form-phone');
					var phn=/^[0-9]{9,14}$/;
					var program = document.getElementById('form-department');
					var semester = document.getElementById('form-semester');
					if(firstname.value.search(fnam)==-1)
					{
							alert("enter correct  first name");
							firstname.focus();
							return false;
					}
					else if(lastname.value.search(lnam)==-1)
					{
						 alert("enter correct  last name");
						 lastname.focus();
						 return false;
					}
					else if(vilidemail.value.search(email)==-1)
					 {
						 alert("enter correct email");
						 vilidemail.focus();
						 return false;
					}
					else if(validpass.value.search(pass)==-1)
					{
						 alert("enter correct password");
						 validpass.focus();
						 return false;
					 }
					 else if(rpass.value!==validpass.value)
					{
						 alert("You New and repeat password not matched");
						 rpass.focus();
						 return false;
					 }
					 else if(phone.value.search(phn)==-1)
					{
						 alert("enter correct phone no");
						 phone.focus();
						 return false;
					 }
					 else if(program.value==="")
					{
						 alert("Select Any program");
						 phone.focus();
						 return false;
					 }
					 else if(semester.value==="")
					{
						 alert("Select Any semester");
						 phone.focus();
						 return false;
					}
					 else
					 {
						 return true;
					 }
			   }
		 
		
