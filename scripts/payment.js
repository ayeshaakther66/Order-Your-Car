/**
* Author: Ayesha  Akther
* Purpose: Load data from session storage and submit to server
* 
*/
"use strict";
/*get variables from form and check rules*/
function validate(){
	var errMsg = "";								/* stores the error message */
	var result = true;								/* assumes no errors */
	var creditType = document.getElementById("credit_type").value ;
	var number = document.getElementById("number").value ;
	var firstDigit = number.charAt(0) ;
	var secondDigit = number.charAt(1) ;
	

	switch(creditType) {
		case "visa" :
			if (number.length != 16 || firstDigit != 4 ) {
				errMsg += "Enter a valid Visa card number.\n" ;
				result = false ;
			}
			break;
		case "mastercard" :
			if (number.length != 16 || firstDigit != 5 || secondDigit < 1 || secondDigit > 5 ) {
				errMsg += "Enter a valid Mastercard number.\n" ; 
				result = false ;
			}
			break;
		case "american" :
			if (number.length != 15 || firstDigit != 3 || secondDigit != 4 && secondDigit != 7 ) {
				errMsg += "Enter a valid American Express number.\n" ; 
				result = false ;
			}
			break;
	}
	if ( errMsg != "") {
        alert(errMsg) ;
    }
	return result;    //if false the information will not be sent to the server
}

//This should be really be calculated securely on the server! 
function calcCost(bike_enquiry, quantity){
	var cost = 0;
	if (bike_enquiry.search("ducati_panigale_v2_s") != -1) cost = 15000;
	if (bike_enquiry.search("kawasaki_ninja_h2")!= -1) cost += 22000;
	if (bike_enquiry.search("ducati_panigale_v4_s")!= -1) cost += 23900;
	return cost * quantity;
}

function getBooking(){
	var cost = 0;
	if(sessionStorage.firstName != undefined){    //if sessionStorage for username is not empty
		//confirmation text
		document.getElementById("confirm_name").textContent = sessionStorage.firstName + " " + sessionStorage.lastName;
		document.getElementById("confirm_email").textContent =sessionStorage.email;
		document.getElementById("confirm_street").textContent = sessionStorage.street;
		document.getElementById("confirm_suburb").textContent = sessionStorage.suburb;
		document.getElementById("confirm_state").textContent =sessionStorage.state;
		document.getElementById("confirm_code").textContent = sessionStorage.code;
		document.getElementById("confirm_phone").textContent = sessionStorage.phone;
		document.getElementById("bike_enquiry").textContent = sessionStorage.bike_enquiry;
		document.getElementById("confirm_quantity").textContent = sessionStorage.quantity;
		document.getElementById("confirm_contact").textContent = sessionStorage.contactPreference;

		cost = calcCost(sessionStorage.bike_enquiry, sessionStorage.quantity);
		document.getElementById("confirm_cost").textContent = cost;

		//fill hidden fields
		document.getElementById("firstname").value = sessionStorage.firstName;
		document.getElementById("lastname").value = sessionStorage.lastName;
		document.getElementById("email").value = sessionStorage.email;
		document.getElementById("street").value = sessionStorage.street;
		document.getElementById("suburb").value = sessionStorage.suburb;
		document.getElementById("state").value = sessionStorage.state;
		document.getElementById("code").value = sessionStorage.code;
		document.getElementById("phone").value = sessionStorage.phone;
		document.getElementById("contact").value = sessionStorage.contactPreference;
		document.getElementById("biketype").value = sessionStorage.bike_enquiry;
		document.getElementById("quantity").value = sessionStorage.quantity;
		document.getElementById("cost").value = cost;
	}

}
function cancelbutton() {
	sessionStorage.clear();
	window.location = "index.php" ;
}


function init () {
	
	/* var bookForm = document.getElementById("bookform"); // link the variable to the HTML element
	bookForm.onsubmit = validate ;          /* assigns functions to corresponding events */
	var cancel = document.getElementById("cancel") ;
	cancel.onclick = cancelbutton;
	getBooking();


 }

 window.addEventListener("load", init)
