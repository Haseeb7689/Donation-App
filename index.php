<?php
session_start();  // Start the session to access session variables
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="img/logo.png" sizes="48x48" type="image/x-icon" />
    <link rel="stylesheet" href="style.css" />
    <title>Heart Help</title>
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
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
      <div class="nav-button">
        <button onclick="Navigate('user.php')">Dashboard</button>
      </div>
    <?php else: ?>
      <div class="nav-button">
        <button onclick="Navigate('donate')">Donation Now</button>
      </div>
    <?php endif; ?>
    
      </div>
    </nav>

    <main id="Home">
      <div class="content">
        <span
          style="color: rgb(86, 86, 147); font-weight: bold; font-size: 20px"
          >WELCOME</span
        >
        <br />
        <br />
        <span style="font-weight: bold; font-size: 80px">Empowering</span>
        <br />
        <span
          style="color: rgb(80, 80, 152); font-weight: bold; font-size: 65px"
          >Communities,</span
        >
        <br />
        <span
          style="color: rgb(80, 80, 152); font-weight: bold; font-size: 65px"
          >Inspiring &nbsp;</span
        >
        <span style="color: rgb(0, 0, 0); font-weight: bold; font-size: 65px"
          >Change</span
        >
        <br />
        <br />
        <span style="color: rgb(0, 0, 0); font-size: 20px">
          Together, we create brighter futures through education support, and
          <br />collective action
        </span>
        <br />
        <br />

        <div class="content-button">
          <div class="content-button1">
            <button onclick="Navigate()">Get Involved</button>
          </div>
          <div class="content-button2">
            <button onclick="Navigate()">Donation Now</button>
          </div>
        </div>
      </div>
      <div class="images">
        <img class="children1" src="img/children1.jpg" alt="" />
        <img class="children2" src="img/children2.jpg" alt="" />
      </div>
    </main>

    <section class="About" id="About">
      <div class="About-content">
        <span
          style="color: rgb(86, 86, 147); font-weight: bold; font-size: 20px"
          >ABOUT US</span
        >
        <br />
        <br />
        <span style="font-weight: bold; font-size: 50px; color: black"
          >Who We Are</span
        >
        <br />
        <br />
        <p
          style="
            font-weight: 500;
            font-size: large;
            color: rgb(64, 60, 60);
            line-height: 35px;
          "
        >
          The Global Hygiene Initiative (GHI) is a 501(c)(3) nonprofit
          organization founded by Aleena Kendirjian with a mission to elevate
          hygiene standards in underserved communities worldwide. GHI was
          inspired by a trip Aleena took to Armenia in May 2023, where she
          noticed the significant hygiene challenges faced by children in rural
          areas.
        </p>
        <br />
        <br />
        <button>
          Read More
          <img
            src="icons/arrow-right-solid.svg"
            alt=""
            style="width: 16px; height: 16px; padding-top: 2px"
          />
        </button>
      </div>
      <div class="About-image">
        <img src="img/children3.jpg" alt="childern" />
      </div>
    </section>

    <section class="Projects" id="Projects">
      <div class="child1">
        <div class="Project-top-content">
          <span
            style="color: rgb(86, 86, 147); font-weight: bold; font-size: 20px"
            >FEATURED PROJECTS</span
          >
          <br />
          <span style="color: rgb(0, 0, 0); font-weight: bold; font-size: 65px"
            >Our Impactful Projects</span
          >
          <br />
          <p
            style="font-weight: 500; font-size: larger; color: rgb(64, 60, 60)"
          >
            At Global Hygiene Initiative we're committed to projects that bring
            lasting positive change to communities in need. Each initiative we
            undertake addresses specific challenges, aiming to improve quality
            of life and foster a supportive, educated community. Here are some
            of our key projects
          </p>
        </div>
        <div class="Project-bottom-content">
          <div class="pbc-img">
            <img src="img/hygiene.jpg" alt="" />
          </div>
          <div class="pbc-content">
            <span
              style="font-weight: bold; font-size: 30px; color: rgb(0, 0, 0)"
            >
              Hygiene Project
            </span>
            <br />
            <br />
            <span
              style="font-weight: bold; font-size: 50px; color: rgb(0, 0, 0)"
              >Hygiene Project</span
            >
            <br />
            <br />
            <p
              style="
                font-weight: 500;
                font-size: larger;
                color: rgb(64, 60, 60);
              "
            >
              Promoting hygiene education and health awareness in underserved
              communities.
            </p>
            <button>
              Read More
              <img
                src="icons/arrow-right-solid.svg"
                alt=""
                style="width: 16px; height: 16px; padding-top: 2px"
              />
            </button>
          </div>
        </div>
      </div>

      <div class="child2">
        <div class="Project-bottom-content">
          <div class="pbc-content">
            <span
              style="font-weight: bold; font-size: 50px; color: rgb(0, 0, 0)"
              >Posters Initiative</span
            >
            <br />
            <br />
            <p
              style="
                font-weight: 500;
                font-size: larger;
                color: rgb(64, 60, 60);
              "
            >
              Raising awareness through powerful visual messages shared across
              schools and communities. education and health awareness in
              underserved communities.
            </p>
            <button>
              Read More
              <img
                src="icons/arrow-right-solid.svg"
                alt=""
                style="width: 16px; height: 16px; padding-top: 2px"
              />
            </button>
          </div>
          <div class="pbc-img">
            <img src="img/poster.jpg" alt="" />
          </div>
        </div>
      </div>
    </section>

    <section class="Involved" id="Involved">
      <div class="Parent1">
        <div class="IC1">
          <img src="img/involved.avif" alt="" />
          <img src="img/involved2.webp" alt="" />
        </div>

        <div class="IC2">
          <span
            style="color: rgb(86, 86, 147); font-weight: bold; font-size: 20px"
            >GET INVOLVED</span
          >
          <br />
          <span style="font-weight: bold; font-size: 50px; color: rgb(0, 0, 0)"
            >How You Can Help</span
          >
          <br />
          <p
            style="
              font-weight: 500;
              font-size: larger;
              color: rgb(64, 60, 60);
              text-decoration: underline;
            "
          >
            Whether you're ready to volunteer, start a school club, or make a
            donation, there are many ways to support our mission and make a
            difference
          </p>
          <ol>
            <li>Become A Volunter</li>
            <li>Start A School Club</li>
            <li>Donate Supplies</li>
            <li>Partner With Us</li>
            <li>Translate Posters</li>
          </ol>
        </div>
      </div>
<!-- For Movement and jQuery -->
      <div class="Parent2">
        <div class="Parent2-top">
          <span style="font-weight: bold; font-size: 50px; color: rgb(0, 0, 0)"
            >Get Involved</span
          >
        </div>
        <br /><br />
        <div class="Parent2-bottom">
  <div class="imgs">
    <div
      class="p2-img"
      onclick="change('Become a Volunteer', 'Volunteering with Global Hygiene Initiative offers a unique opportunity to make a lasting impact in your community and beyond. As a volunteer, you will play an essential role in helping us deliver resources, organize events, and provide support to those in need.', 'img/volunter.jpg', this)"
    >
      <img src="img/volunter.jpg" alt="" />
      <span>Become a Volunteer</span>
    </div>
    <div
      class="p2-img"
      onclick="change('Join Our Advisory Board', 'Joining our advisory board allows you to contribute strategically to the mission of the Global Hygiene Initiative. Help us shape the future of charitable giving while working alongside other industry experts.', 'img/advisory.jpg', this)"
    >
      <img src="img/advisory.jpg" alt="" />
      <span>Join Our Advisory Board</span>
    </div>
    <div
      class="p2-img"
      onclick="change('Start A School Club', 'Start a school club to promote hygiene awareness and community building. This initiative empowers students to lead meaningful projects and bring change to their peers.', 'img/school.jpg', this)"
    >
      <img src="img/school.jpg" alt="" />
      <span>Start A School Club</span>
    </div>
    <div
      class="p2-img"
      onclick="change('Partner With Us', 'Partnering with us opens opportunities to create impactful campaigns and extend our reach to more communities. Together, we can drive sustainable change.', 'img/partner.jpg', this)"
    >
      <img src="img/partner.jpg" alt="" />
      <span>Partner With Us</span>
    </div>
  </div>
</div>

  <div class="p2-bottom-detail">
    <div class="p2b-description">
      <h1 id="h1">Become a Volunteer</h1>
      <p id="p1">
        Volunteering with Global Hygiene Initiative offers a unique opportunity
        to make a lasting impact in your community and beyond. As a volunteer,
        you'll play an essential role in helping us deliver resources, organize
        events, and provide support to those in need. Whether you're passionate
        about education, community outreach, or health initiatives, there's a
        place for you in our mission.
      </p>
      <button>
        View Details
        <img
          id="img-1"
          src="icons/arrow-right-solid.svg"
          alt=""
          style="width: 16px; height: 16px; padding-top: 2px"
        />
      </button>
    </div>
    <div class="p2b-image">
      <img id="detail-img" src="img/volunter.jpg" alt="" />
    </div>
  </div>
      </div>
    </section>

    <section class="Donation" id="Donation">
      <div class="Donation-main">
        <div class="Donation-description">
          <h1>Support Us with Donation & Supplies</h1>
          <p>
            Your donation and supply contributions empower our mission to bring
            vital resources to those in need. Every gifts, whether funds or
            essential items like school suplies and hygiene products, directly
            supports our program and transforms lives. Join us in creating
            lasting change. Thank you for making a difference
          </p>
          <button>Donate</button>
          <button>Supplies</button>
        </div>
        <div class="Donation-image">
          <img src="img/donation.jpg" alt="" />
        </div>
      </div>
    </section>

    <div class="Team">
      <div class="Team-top">
        <span style="color: rgb(0, 0, 0); font-weight: bold; font-size: 45px"
          >Our Team</span
        >
        <br />
        <p style="font-weight: 500; font-size: larger; color: rgb(64, 60, 60)">
          Meet the passionate individuals behind our work, each bringing unique
          skills and dedication to our cause.
        </p>
      </div>
      <div class="Team-bottom">
        <div class="cards">
          <img src="img/haseeb.jpg" alt="" />
          <div class="content">
            <h3>Haseeb ur Rehman</h3>
            Founder & Director
            <br />
            <br />
            <a href="https://www.facebook.com/share/1JMK5qdwni/" target="_blank"
              ><img src="icons/facebook.svg" alt=""
            /></a>
            <a
              href="https://www.instagram.com/hasi._.oo?igsh=d205cmUwaDhhYjVk"
              target="_blank"
              ><img src="icons/insta.svg" alt=""
            /></a>
          </div>
        </div>
        <div class="cards">
          <img src="img/Abdur Rehman.png" alt="" />
          <div class="content">
            <h3>Abdur Rehman Abid</h3>
            Co-Founder & Director
            <br />
            <br />
            <a
              href="https://www.facebook.com/abdurrehman.abid.902?mibextid=ZbWKwL"
              target="_blank"
              ><img src="icons/facebook.svg" alt=""
            /></a>
            <a
              href="https://www.instagram.com/abdurrehman._abid?igsh=MXNraW83MGRqaTNxeA=="
              target="_blank"
              ><img src="icons/insta.svg" alt=""
            /></a>
          </div>
        </div>
        <div class="cards">
          <img src="img/Abdullah.png" alt="" />
          <div class="content">
            <h3>Muhammad Abdullah</h3>
            CEO
            <br />
            <br />
            <a
              href="https://www.facebook.com/abdullah.abdulrehman.3910?mibextid=ZbWKwL"
              target="_blank"
              ><img src="icons/facebook.svg" alt=""
            /></a>
            <a
              href="https://www.instagram.com/mabdullah1745?igsh=MWYyNXBxOW0zdzltNg=="
              target="_blank"
              ><img src="icons/insta.svg" alt=""
            /></a>
          </div>
        </div>
      </div>
    </div>

    <div class="Review">
      <div class="Review-top">
        <span style="color: rgb(0, 0, 0); font-weight: bold; font-size: 45px"
          >What everyone says</span
        >
      </div>
      <div class="Review-bottom">
        <div class="Review-cards">
          <div class="rc-content">
            <p style="color: rgb(64, 60, 60); font-weight: 400">
              Volunteering with Global Hygiene Initiative has been one of the
              most fulfilling experiences of my life. Seeing the positive impact
              we're making in our communities is incredibly inspiring.
            </p>
            <br />
            <div class="reviewer">
              <img src="img/haseeb.jpg" alt="" /><span
                style="font-size: 17px; font-weight: 500"
                >Haseeb
                <br />
                <span style="color: rgb(102, 96, 96); font-size: 15px"
                  >Volunter</span
                ></span
              >
            </div>
          </div>
        </div>

        <div class="Review-cards">
          <div class="rc-content">
            <p style="color: rgb(64, 60, 60); font-weight: 400">
              Thanks to Global Hygiene Initiative our community has access to
              resources we've never had before. Their programs have empowered us
              to take charge of our health and well-being
            </p>
            <br />
            <div class="reviewer">
              <img src="img/Abdullah.png" alt="" /><span
                style="font-size: 17px; font-weight: 500"
                >Muhammad Abdullah
                <br />
                <span style="color: rgb(102, 96, 96); font-size: 15px"
                  >Needy Person</span
                ></span
              >
            </div>
          </div>
        </div>

        <div class="Review-cards">
          <div class="rc-content">
            <p style="color: rgb(64, 60, 60); font-weight: 400">
              I've been donating to Global Hygiene Initiative for over a year,
              and I'm continually impressed by their dedication and
              transparency. Knowing that my contributions go directly...
            </p>
            <br />
            <div class="reviewer">
              <img src="img/Abdur Rehman.png" alt="" /><span
                style="font-size: 17px; font-weight: 500"
                >Abdur Rehman Abid
                <br />
                <span style="color: rgb(102, 96, 96); font-size: 15px"
                  >Donor</span
                ></span
              >
            </div>
          </div>
        </div>
        <div class="Review-cards">
          <div class="rc-content">
            <p style="color: rgb(64, 60, 60); font-weight: 400">
              Volunteering with Global Hygiene Initiative has been one of the
              most fulfilling experiences of my life. Seeing the positive impact
              we're making in our communities is incredibly inspiring.
            </p>
            <br />
            <div class="reviewer">
              <img src="img/hamza.png" alt="" /><span
                style="font-size: 17px; font-weight: 500"
                >Hamza
                <br />
                <span style="color: rgb(102, 96, 96); font-size: 15px"
                  >Supplier</span
                ></span
              >
            </div>
          </div>
        </div>

        <div class="Review-cards">
          <div class="rc-content">
            <p style="color: rgb(64, 60, 60); font-weight: 400">
              Volunteering with Global Hygiene Initiative has been one of the
              most fulfilling experiences of my life. Seeing the positive impact
              we're making in our communities is incredibly inspiring.
            </p>
            <br />
            <div class="reviewer">
              <img src="img/muneeb.jpg" alt="" /><span
                style="font-size: 17px; font-weight: 500"
                >Muneeb
                <br />
                <span style="color: rgb(102, 96, 96); font-size: 15px"
                  >Child</span
                ></span
              >
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="signup-background">
      <img src="img/background1.jpg" alt="" width="100%" height="100%" />
      <div class="signup-content">
        <span style="color: rgb(0, 0, 0); font-weight: bold; font-size: 45px"
          >Stay Updates on Our Work and Impact</span
        ><br /><br />
        <p style="font-weight: 500; font-size: larger; color: rgb(64, 60, 60)">
          Join our community today and unlock exclusive access to resources,
          updates, and personalized features. Signing up is quick and easy—start
          your journey with us now and be part of something amazing!
        </p>
        <div class="content-button-input">
          <input type="email" placeholder="Enter you email" /><button>
            Sign Up
          </button>
        </div>
      </div>
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
    <a href="#nav" class="scroll-to-top" id="top"
      ><img src="icons/top.svg" alt="" style="width: 40px; height: 40px"
    /></a>
  </body>
  <script src="index.js"></script>
  <script>
  function Navigate(action) {
    if (action === 'logout') {
      // Perform logout logic, maybe redirect to a logout handler or destroy session
      window.location.href = 'logout.php'; // Replace with your logout page
    } else if (action === 'donate') {
      // Navigate to donation page
      window.location.href = 'login.php'; // Replace with your donation page
    }
  }
</script>
</html>
