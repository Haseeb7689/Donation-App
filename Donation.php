
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation</title>
    <link rel="icon" href="img/logo.png" sizes="48x48" type="image/x-icon" />
    <link href="./Donationpg.css" rel="stylesheet">
    <link href="./style.css" rel="stylesheet">
</head>
<body>
    <nav id="nav">
        <div class="nav">
          <div class="logo">
            <img src="img/logo.png" alt="logo" />
          </div>
  
          <div class="list">
            <ul>
              <li>
                <a href="/index.html" style="text-decoration: none; color: inherit"
                  >Home</a
                >
              </li>
              <li>
                <a href="#About" style="text-decoration: none; color: inherit"
                  >About us</a
                >
              </li>
              <li>

                <a href="#Projects" style="text-decoration: none; color: inherit"
                  >Our Projects</a
                >
              </li>
              <li>
                <a href="#Involved" style="text-decoration: none; color: inherit"
                  >Get Involved</a
                >
              </li>
              <li>
                <a href="#Donation" style="text-decoration: none; color: inherit"
                  >Donation</a
                >
              </li>
              <li>
                <a href="#Contact" style="text-decoration: none; color: inherit"
                  >Contact us</a
                >
              </li>
            </ul>
          </div>
  
          <div class="nav-button">
            <button onclick="Navigate()">Donation Now</button>
          </div>
        </div>
      </nav>
    <section id="Banner">
    </section>
    <section id="donation">
        <div class="donation_Block">
            <div class="donation1">
                <h1>Support Us with <br><span>Donation</span> & <br><span>Supplies</span></h1>
            </div>
            <div class="donation2">
                <p>
                    Your donation and supply contributions empower our mission to bring
                    vital resources to those in need. Every gifts, whether funds or
                    essential items like school supplies and hygiene products, directly
                    supports our program and transforms lives. Join us in creating
                    lasting change. Thank you for making a difference
                </p>
                <button onclick="Navigate1();">Donate</button>
                <button onclick="NavigatetoShop();">Supplies</button>
            </div>
        </div>
    </section>
    <section id="Donate">
      <div class="banner">
      </div>
      <div class="donation">
        <div class="feedback">
          <button>My Donation</button>
          <button disabled>Payment Type</button>
          <button disabled>Payment detail</button>
        </div>
        <div class="MyDonation">
          <div class="Mode">
            <button>One Time</button>
            <button>Monthly</button>
          </div>
          <div class="amount">
            <button>100$</button>
            <button>75$</button>
            <button>50$</button>
            <button>25$</button>
            <input type="number" placeholder="Other amount" id="amount"/>
          </div>
            <label >Note: 10$ is the minimum for online donation</label>
          </div>
          <div class="gift">
            <input type="checkbox" id="gift" name="gift" value="gift"/>
            <label for="gift">
              Please make my gift go further by adding $1.88 to cover the processing fees and other expenses associated with my donation
            </label>
          </div>
          <div class="support">
            <p>I want to support</p>
            <select>
              <option value="Disaster Relief">Disaster relief</option>
              <option value="Education">Education</option>
              <option value="Healthcare">Healthcare</option>
              <option value="Shelter">Shelter</option>
              <option value="Hunger">Hunger</option>
              <option value="Water">Water</option>
              <option value="Child" selected>Child</option>
            </select>
          </div>
          <div class="submit">
            <button>Submit</button>
          </div>
        </div>
        <div class="Payment">
       
        <div class="feedback">
          <button>My Donation</button>
          <button >Payment Type</button>
          <button disabled>Payment detail</button>
        </div>
        <div class="Payment-label">
          <h1>Payment Type</h1>
        </div>
        <div class="Type">
 
          <button>Card</button>
          <button>Online Transfer</button>
        </div>
        <br><br><br><br>
        </div>
    </section>
    <br><br><br><br><br>
    <div class="cards">
 
        <img src="./img/AmericanExp.webp" alt="logos" id="accepted-cards"/>
        <img src="./img/Gpay.png" alt="logos" id="accepted-cards"/>
        <img src="./img/masterCard.webp" alt="logos" id="accepted-cards"/>
        <img src="./img/visa.png" alt="logos" id="accepted-cards"/>
 

    </div>
    


    <section id="Contact" class="Contact">
      <div class="contact-main">
        <div class="contact-logo">
          <img src="img/logo.png" alt="" />
          <span style="color: white; font-weight: bold">Follow us</span>
          <div class="contact-socials">
            <a
              href="https://www.facebook.com/abdullah.abdulrehman.3910?mibextid=ZbWKwL"
              ><img src="icons/facebook-yellow.svg" alt=""
            /></a>
            <a href="https://www.instagram.com/hasi._.oo?igsh=d205cmUwaDhhYjVk"
              ><img src="icons/instagram-yellow.svg" alt=""
            /></a>
            <a href="twitter.com"
              ><img src="icons/twitter-yellow.svg" alt=""
            /></a>
            <a href="https://github.com/Haseeb7689"
              ><img src="icons/github-yellow.svg" alt=""
            /></a>
          </div>
        </div>
        <div class="contact-list">
          <h1>Company</h1>
          <ul>
            <li>
              <a href="#Home" style="text-decoration: none; color: inherit"
                >Home</a
              >
            </li>
            <li>
              <a href="#About" style="text-decoration: none; color: inherit"
                >About us</a
              >
            </li>
            <li>
              <a href="#Projects" style="text-decoration: none; color: inherit"
                >Our Projects</a
              >
            </li>
            <li>
              <a href="#Involved" style="text-decoration: none; color: inherit"
                >Get Involved</a
              >
            </li>
            <li>
              <a href="#Donation" style="text-decoration: none; color: inherit"
                >Donation</a
              >
            </li>
            <li>
              <a href="#Contact" style="text-decoration: none; color: inherit"
                >Contact us</a
              >
            </li>
          </ul>
        </div>
        <div class="contact-links">
          <h1>Links</h1>
          <a href="mailto: battlemani790@gmail.com">
            <img src="icons/email.svg" alt="" />
            battlemani790@gmail.com
          </a>

          <a href="tel:+923109306567"
            ><img src="icons/phone.svg" alt="" />+923109306567</a
          >
          <a><img src="icons/location.svg" alt="" />Location</a>
        </div>
        <div class="contact-button">
          <h1>SUBSCRIBE</h1>
          <div class="content-button-input">
            <input type="email" placeholder="Enter you email" /><button>
              Sign Up
            </button>
          </div>
        </div>
      </div>

      <hr style="margin: 0px 100px 0px 100px" />
      <p style="color: aliceblue">
        Global Hygiene initiative &copy; Copyright 2024, All Rights Reserved by
        TrioDevelopers.com
      </p>
    </section>
    <script src="index.js"></script>
</body>
</html>