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
        return true;
    }
    else{
        Button1.style.background = 'white';
        Button1.style.color = 'black';
        return false;
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
        return true;
    }
    else{
        Button2.style.background = 'white';
        Button2.style.color = 'black';
        return false;
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
        return true;
    }
    else{
        Button3.style.background = 'white';
        Button3.style.color = 'black';
        return false;
    }
}
function amount3(){
    Amount=25;
    console.log(Amount);
    if(Button4.style.background === 'white' || Button4.style.background === '') {
        Button1.style.background = 'white';
        Button2.style.background = 'white';
        Button3.style.background = 'white';
        Button4.style.background = 'cornflowerblue';
        Button4.style.color = 'white';
        Button1.style.color = 'black';
        Button2.style.color = 'black';
        Button3.style.color = 'black';
        return true;
    }
    else{
        Button4.style.background = 'white';
        Button4.style.color = 'black';
        return false;
    }

}
function amount4(){
    var input  = document.getElementById('amount').value;
    Amount  = input;
    return true;
}
var Mobile;
var Cnic
function payment(){
    var mobile = document.getElementById('jazzcash').value;
Mobile=mobile;
var cnic = document.getElementById('cnic').value;
Cnic= cnic;
console.log(mobile);
console.log(Cnic);    
}
function selectedAmount() {
    console.log(Amount);
    console.log(Cnic);
    console.log(Mobile);
    alert('You have selected ' + Amount + '$');

    fetch('Donation.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ donationAmount: Amount, mobile: Mobile, cnic: Cnic })
    })
    .then(response => {
        if (!response.ok) { // Check for HTTP errors (4xx, 5xx)
            return response.json().then(err => {throw new Error(err.message)}); //Throw error with message
        }
        return response.json()
    })
    .then(data => {
        console.log(data);
        if (data.status === "success") {
            window.location.href = data.redirectURL; // Redirect on success
        } else {
            alert("Payment Error: " + data.message); // Display error message to the user
            console.error("Payment Details:", data.details); // Log details for debugging
        }
    })
    .catch(error => {
        console.error("Fetch Error:", error); // Handle network or parsing errors
        alert("An error occurred during payment processing. Please try again later.");
    });
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
  function updateFileName() {
    const fileInput = document.getElementById('file');
    const fileNameSpan = document.getElementById('fileName');
    if (fileInput.files.length > 0) {
      const fileName = fileInput.files[0].name; // Get the uploaded file name
      fileNameSpan.textContent = fileName; // Display the file name
    }
  }


//   FOR the User Profile area**************
//********************************************* */
// USer Profile
const Edit_info= document.getElementById('contact-details');
  const Edit_About = document.getElementById('edit-profile-details');
  var inp_occupation1= document.getElementById('editOccupation').value;
  var inp_location1= document.getElementById('editLocation').value;
  var inp_bio1= document.getElementById('editBio').value;
  

  // User contact
  var phone= document.getElementById('phone').value;
  var Website= document.getElementById('website').value;
  var URL = document.getElementById('linkedIn').value;
function about_show(){
if (Edit_About.style.display === 'none') {
    Edit_About.style.display = 'block';
  } else {
    Edit_About.style.display = 'none';
  }
}
function info_show(){
if (Edit_info.style.display === 'none') {
    Edit_info.style.display = 'block';
  } else {
    Edit_info.style.display = 'none';
  }
}
function Changeinfo()
{
    var inp_occupation= document.getElementById('editOccupation').value;
    var inp_location= document.getElementById('editLocation').value;
    var inp_bio= document.getElementById('editBio').value;
inp_occupation1= inp_occupation;
inp_location1= inp_location;
inp_bio1= inp_bio;
document.getElementById('Occupation').innerHTML = inp_occupation;
document.getElementById('Location1').innerHTML= inp_location;
document.getElementById('bio1').innerHTML= inp_bio;
uploadToLocalstorage();
close();
}
function close(){
    if (Edit_info.style.display === 'block') {
        Edit_info.style.display = 'none';       
      }
      if (Edit_About.style.display === 'block') {
        Edit_About.style.display = 'none';       
      } 

}
function uploadToLocalstorage(){
    localStorage.setItem('Occupation', inp_occupation1);
    localStorage.setItem('Location', inp_location1);
    localStorage.setItem('bio', inp_bio1);
}
function downloadFromLocalstorage(){
    inp_occupation1= localStorage.getItem('Occupation');
    inp_location1= localStorage.getItem('Location');
    inp_bio1= localStorage.getItem('bio');
    document.getElementById('Occupation').innerHTML = inp_occupation1;
    document.getElementById('Location1').innerHTML= inp_location1;
    document.getElementById('bio1').innerHTML= inp_bio1;
}


//User contact
function ChangeContact() {
    var phone1 = document.getElementById('phone').value;
    var Website1 = document.getElementById('website').value;
    var URL1 = document.getElementById('linkedIn').value;
alert('working');
    phone = phone1;
    Website = Website1;
    URL = URL1;

    document.getElementById('phone1').innerHTML = phone1;

    // Update Website and URL to be clickable links
    document.getElementById('website1').innerHTML = `<a href="${Website1}" target="_blank">${Website1}</a>`;
    document.getElementById('URL1').innerHTML = `<a href="${URL1}" target="_blank">${URL1}</a>`;

    uploadToLocalstorage1();
    close1();
}

function uploadToLocalstorage1() {
    localStorage.setItem('phone', phone);
    localStorage.setItem('Website', Website);
    localStorage.setItem('URL', URL);
}

function downloadFromLocalstorage1() {
    phone = localStorage.getItem('phone');
    Website = localStorage.getItem('Website');
    URL = localStorage.getItem('URL');

    document.getElementById('phone1').innerHTML = phone;

    // Update Website and URL to be clickable links
    if (Website) {
        document.getElementById('website1').innerHTML = `<a href="${Website}" target="_blank">${Website}</a>`;
    } else {
        document.getElementById('website1').innerHTML = '';
    }
    
    if (URL) {
        document.getElementById('URL1').innerHTML = `<a href="${URL}" target="_blank">${URL}</a>`;
    } else {
        document.getElementById('URL1').innerHTML = '';
    }
}

function close1() {
    if (Edit_info.style.display === 'block') {
        Edit_info.style.display = 'none';
    }
    if (Edit_About.style.display === 'block') {
        Edit_About.style.display = 'none';
    }
}

