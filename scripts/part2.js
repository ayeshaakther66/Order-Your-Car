/**
* Author: Ayesha Akther
* Target: payment.html
* Purpose: submits data to payment.html
*/

"use strict";
function validate() {
    var result =  true ;
    var state = document.getElementById("state").value ;
    var code = document.getElementById("code").value ;
    var quantity = document.getElementById("quantity").value ;    



    if(result){
        storeEnquiry(code, state, quantity);
        }
    return result ;
}
function storeEnquiry(code, state, quantity) {
    var firstName = document.getElementById("first_name").value ;
    var lastName = document.getElementById("last_name").value ;
    var email = document.getElementById("email").value ;
    var street = document.getElementById("street").value ;
    var suburb = document.getElementById("suburb").value ; 
    var state = document.getElementById("state").value ; 
    var code = document.getElementById("code").value ; 
    var phone = document.getElementById("phone").value ; 
    var bike_enquiry = document.getElementById("bike_enquiry").value ; 
    var quantity = document.getElementById("quantity").value ; 
    var contactPreference = preferredContacts() ;
    sessionStorage.firstName = firstName ;
    sessionStorage.lastName = lastName ;
    sessionStorage.email = email ;
    sessionStorage.street = street ;
    sessionStorage.suburb = suburb ;
    sessionStorage.state = state ;
    sessionStorage.code = code ;
    sessionStorage.phone = phone ;
    sessionStorage.bike_enquiry = bike_enquiry ;
    sessionStorage.quantity = quantity ;
    sessionStorage.contactPreference = contactPreference ;


}
function preferredContacts() {
    var contact = "unknown";
    var contactArray = document.getElementById("contact").getElementsByTagName("input");
    for (var i = 0; i < contactArray.length; i++){
        if (contactArray[i].checked) {
            contact = contactArray[i].value;
        }
      }
      return contact;
}

function init() {
    var payform = document.getElementById("payform") ;
    payform.onsubmit = validate ;

}

window.onload = init ;