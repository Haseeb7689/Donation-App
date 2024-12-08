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
var Button1 = document.getElementById('100$');
var Button2 = document.getElementById('75$');
var Button3 = document.getElementById('50$');
var Button4 = document.getElementById('25$');
var Amount =0;
function amount(){
    Amount=100;
    
    if (Button1.style.background === 'white' || Button1.style.background === '') {
        Button1.style.background = 'cornflowerblue';
        Button2.style.background = 'white';
        Button3.style.background = 'white';
        Button4.style.background = 'white';
        Button1.style.color = 'white';
        Button3.style.color = 'black';
        Button2.style.color = 'black';
        Button4.style.color = 'black';
    }
    else{
        Button1.style.background = 'white';
        Button1.style.color = 'black';
    }

}
function amount1(){
    Amount=75;
    if(Button2.style.background === 'white' || Button2.style.background === '') {
        Button1.style.background = 'white';
        Button2.style.background = 'cornflowerblue';
        Button3.style.background = 'white';
        Button4.style.background = 'white';
        Button2.style.color = 'white';
        Button1.style.color = 'black';
        Button3.style.color = 'black';
        Button4.style.color = 'black';
    }
    else{
        Button2.style.background = 'white';
        Button2.style.color = 'black';
    }
}
function amount2(){
    Amount=50;
    if(Button3.style.background === 'white' || Button3.style.background === '') {
        Button1.style.background = 'white';
        Button2.style.background = 'white';
        Button3.style.background = 'cornflowerblue';
        Button4.style.background = 'white';
        Button3.style.color = 'white';
        Button1.style.color = 'black';
        Button2.style.color = 'black';
        Button4.style.color = 'black';
    }
    else{
        Button3.style.background = 'white';
        Button3.style.color = 'black';
    }
}
function amount3(){
    Amount=25;
    if(Button4.style.background === 'white' || Button4.style.background === '') {
        Button1.style.background = 'white';
        Button2.style.background = 'white';
        Button3.style.background = 'white';
        Button4.style.background = 'cornflowerblue';
        Button4.style.color = 'white';
        Button1.style.color = 'black';
        Button2.style.color = 'black';
        Button3.style.color = 'black';
    }
    else{
        Button4.style.background = 'white';
        Button4.style.color = 'black';
    }
}
function amount4(){
    var input  = document.getElementById('amount').value;
    Amount  = input;
}
var Time;
var times= document.getElementById('OneTime');
function OneTime(){
    
Time = times.innerHTML;
if (times.style.background === 'white' || times.style.background === '') {
    times.style.background = 'cornflowerblue';
    times.style.color = 'white';
    recurring.style.background = 'white';
    recurring.style.color = 'black';
}
else{
    times.style.background = 'white';
    times.style.color = 'black';
}
} var recurring= document.getElementById('Monthly');
function Monthly(){
   
Time = recurring.innerHTML;
if (recurring.style.background === 'white' || times.style.background === '') {
    recurring.style.background = 'cornflowerblue';
    recurring.style.color = 'white';
    times.style.background = 'white';
    times.style.color = 'black';
}
else{
    recurring.style.background = 'white';
    recurring.style.color = 'black';
}
}
 
function validateForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    if (name === '' || email === '' || password === '') {
        alert('Please fill out all fields.');
        console.log('Please fill out all fields.');
        window.location.href='/signup.php';
        return false;
    }
    return true;
}
var a = document.getElementsByClassName('p2-img');
function change(title, description, imageSrc,element) {
    const activeElement = document.querySelector(".p2-img.active");
    if (activeElement) {
        activeElement.classList.remove("active");
      }

      // Add the active class to the clicked element
      element.classList.add("active");
    // Update text content
    document.getElementById("h1").textContent = title;
    document.getElementById("p1").textContent = description;

    // Update image source
    document.getElementById("detail-img").src = imageSrc;
  }
