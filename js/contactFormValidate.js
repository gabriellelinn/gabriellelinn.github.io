$(document).ready(function(){
    $(document).on('click', '#c_submit', function(e){
        e.preventDefault();
//Global variables

var elName = document.getElementById('name');
var elEmail = document.getElementById('email');
var elMessage = document.getElementById('message');
var elError = document.getElementById('contactError');
var elSubmit = document.getElementById('c_submit');


//Event Listeners

elName.addEventListener("blur", validateName, false);
elEmail.addEventListener("blur", validateEmail, false);
elMessage.addEventListener("blur", validateMessage, false);
elSubmit.addEventListener("click", validateContactForm, false);

//Functions

function validateContactForm(){
    if(elName.value == "" && elEmail.value == "" && elMessage.value == ""){
                elError.innerHTML="<div class='alert alert-danger'>All fields are required!</div>";
                return false;
            } else {
                elError.innerHTML= "";
                $.ajax({
                    url: 'includes/contactInsertEmail.php',
                    type: 'POST',
                    data: $('form#contactForm').serialize(),
                    success: function (response){
                        if (response == 'ok') {
                            $("#c_submit").html('Sending ...');
                            $("#contactError").html('<div>' + ' ' + '</div>');
                            setTimeout('window.location.href = "index.php";', 4000);
                        }
                        else {
                            $("#contactError").fadeIn(1000, function() {
                                $("#contactError").html('<div class="alert alert-danger">'+response+'</div>');
                                $("#c_submit").html('Login');
                            });
                        }
                    }
                });
                return false;
            }
        }


function validateName(){
    var regExpName = /^[a-zA-Z, -]{2,50}$/;
    if(elName.value == ""){
        elError.innerHTML = "<div class='alert alert-danger'>You must enter a name</div>";
        elName.focus();
        return false;
    } else if(!elName.value.match(regExpName)){
        elError.innerHTML = "<div class='alert alert-danger'>You must enter a valid name</div>";
        elName.focus();
        return false;
    } else {
        elError.innerHTML = "";
    }
}

function validateEmail(){
    var regExpEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(elEmail.value == ""){
        elError.innerHTML = "<div class='alert alert-danger'>You must enter a valid email address</div>";
        elEmail.focus();
        return false;
    } else if (!elEmail.value.match(regExpEmail)){
        elError.innerHTML = "<div class='alert alert-danger'>You must enter a valid email address</div>";
        elEmail.focus();
        return false;
    } else {
        elError.innerHTML = "";
    }
}

function validateMessage(){
    if(elMessage.value == ""){
        elError.innerHTML = "<div class='alert alert-danger'>You must enter a message</div>";
        elMessage.focus();
        return false;
    } else if(elMessage.value.length < 10){
        elError.innerHTML = "<div class='alert alert-danger'>Your message is not complete</div>";
        elMessage.focus();
        return false;
    } else if(elMessage.value.length > 30){
        elError.innerHTML = "<div class='alert alert-danger'>Your message is too long</div>";
        elMessage.focus();
        return false;
    } else {
        elError.innerHTML = "";
        }
    }
    });
});