var online = document.getElementById('onlineDetails');
function Navigate(){
    window.location='Login.php';
}
function NavigatetoShop(){
    window.location='Shop.php';
}
// change the donation to the screen where it is going to donate
function Navigate1(){
    window.location.href='#donation'
}
var MyDonation= document.getElementById('Donation');
var MyPayment = document.getElementById('Payment');
var Mydetails = document.getElementById('details');
function Popup(){
if (MyPayment.style.display === 'none') {
    MyPayment.style.display = 'block';
    MyDonation.style.display = 'none';
    Mydetails.style.display = 'none';
} else {
    MyPayment.style.display = 'none';
}
}
var Card = document.getElementById('details');

function popup1(){
if(Card.style.display === 'none'){
    Card.style.display = 'block';
    MyPayment.style.display = 'none';
    MyDonation.style.display = 'none';
}else{
    Card.style.display = 'none';
}
}
function Donation(){

if (MyDonation.style.display === 'none') {
    MyDonation.style.display = 'block';
    MyPayment.style.display = 'none';
    Mydetails.style.display = 'none';
    online.style.display = 'none';
} else {
    MyDonation.style.display = 'none';  
}
}
function DisplayQR(){
    
var wrapper = document.getElementById('wrapper');
if(wrapper.style.display === 'none'){
    wrapper.style.display = 'flex';
}else{
    wrapper.style.display = 'none';
}
}


function popup2(){
if (online.style.display === 'none') {
    online.style.display = 'flex';
    MyPayment.style.display = 'none';
    MyDonation.style.display = 'none';
} else {
    online.style.display = 'none';
}
}
function Payment(){
if (MyPayment.style.display === 'none') {
    MyPayment.style.display = 'block';
    MyDonation.style.display = 'none';
    Mydetails.style.display = 'none';
    online.style.display = 'none';
} else {
    MyPayment.style.display = 'none';
}
}