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
var payment_type;
function popup1()
{
    payment_type = "Card";
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
    payment_type = "Online";
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
var Cnic;
function payment(){
    var mobile = document.getElementById('jazzcash').value;
Mobile=mobile;
var cnic = document.getElementById('cnic').value;
Cnic= cnic;
console.log(mobile);
console.log(Cnic);    
}
var gift = document.getElementById('gift');
function Gift(){
    let Gift = gift;
if (Gift.checked){
    Gift.value="Yes";
    gift=Gift;
    console.log('Gift Value'+ Gift.value);
    return  true;
}
else{
    Gift.value="No";
    gift=Gift;
    console.log('Gift Value'+ Gift.value);
    return false;
}

}
var support;
function Support(){
    const SelectedElement = document.querySelector("select");
    const selectedValue = SelectedElement.value;
    
    console.log(selectedValue);
    switch (selectedValue) {
        case "Disaster Relief":
            support = "Disaster Relief";
            break;
         
        case "Education":
            support = "Education";
            break;
        case "Healthcare":
            support = "Healthcare";
            break;  
         case "Hunger":
            support = "hunger";
            break;
         case "Water":
            support = "water";
            break;
         case "Child":
            support = "Child";
            break;
        case "Shelter":
            support = "Shelter";
            break;    
        default:
            break;
    }
}let isData = false;

async function selectedAmount() {
    try {
        Support();
        alert(support);
        if (isData) {
            alert("You have already submitted the data.");
            return;
        }

        if (Gift()) {
            Amount += 1.8;
           
          // Adjust amount if gift is selected
        }
       
        isData = true;

        // Prepare the data to be sent to the backend
        const data = {
            donationAmount: Amount,
            mobile: Mobile,
            cnic: Cnic,
            gift: gift.value,
            support: support,
            payment_type: payment_type,
            recurring: Time,
        };

        console.log("Sending Data:", data);

        const response = await fetch('Donation-ins.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        });

        const responseData = await response.json();

        if (!response.ok) {
            console.error("Server Error:", responseData);
            alert("Error: " + (responseData.message || "An error occurred on the server."));
            return;
        }

        console.log("Server Response:", responseData);

        if (responseData.status === "success") {
            alert("Donation Successful!");
            window.location.href = 'Donation.php';
        } else {
            alert("Error: " + (responseData.message || "Something went wrong."));
        }
    } catch (error) {
        console.error("Error during fetch:", error);
        alert("Entered");
    } finally {
        isData = false; 
    }
}

var Time;
var times= document.getElementById('OneTime');
function OneTime(){
    
Time = "one time";
if (times.style.background === 'white' || times.style.background === '') {
    times.style.background = 'cornflowerblue';
    times.style.color = 'white';
    recurring.style.background = 'white';
    recurring.style.color = 'black';
    return true;
}
else{
    
    times.style.background = 'white';
    times.style.color = 'black';
    return false;
}
} var recurring= document.getElementById('Monthly');
function Monthly(){
   
Time = "recurring";
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

