/**
* Author: Ayesha Akther
* Target: payment.html
* Purpose: Load data from session storage and submit to server
* 
*/
"use strict";
/*get variables from form and check rules*/

function preLoad() {
	if(sessionStorage.firstName != undefined){    //if sessionStorage for username is not empty
		document.getElementById("credit_name").value = sessionStorage.firstName + " " + sessionStorage.lastName;
	}
}

var seconds = 1000; // Total seconds to wait
function countdown() {
	seconds = seconds - 1;
	if (seconds < 0) {
		window.location = "index.html"; // Chnage your redirection link here
	} 
	else {
		document.getElementById("countdown").innerHTML = seconds; // Update remaining seconds
		window.setTimeout("countdown()", 1000); // Count down using javascript
	}
}

function init () {
	preLoad() ;
	countdown()

 }
 window.addEventListener("load", init)
