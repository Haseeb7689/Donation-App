<?php
require 'navigation.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rain Donation Landing Page</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            height: 100%;
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }

        .video-container {
            position: relative;
            width: 100%;
            height: 90.3%; /* Full screen height */
            overflow: hidden;
        }

        .video-container video {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .content {
            position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #fff;
    z-index: 2;
    padding: 40px;
    width: 90%;
    margin: 0px;
        }

        .content h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            line-height: 1.3;
        }

        .content p {
            margin: 1.5rem 0;
            font-size: 1.2rem;
            line-height: 1.8;
            color: #ddd;
            text-align: justify;
        }

        .content button {
            background-color: #ff6b6b;
            color: #fff;
            border: none;
            padding: 1rem 2.5rem;
            font-size: 1.2rem;
            cursor: pointer;
            border-radius: 30px;
            margin-top: 1.5rem;
            transition: background 0.3s ease;
        }

        .content button:hover {
            background-color: #e55656;
        }
        .content a{
            color: #fff;
            text-decoration: none;
        }
        /* Responsive design */
        @media (max-width: 768px) {
            .content h1 {
                font-size: 2.5rem;
            }
            .content p {
                font-size: 1rem;
            }
            .content button {
                font-size: 1rem;
                padding: 0.8rem 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="video-container">
        <video autoplay muted loop>
            <source src="https://www.w3schools.com/howto/rain.mp4" type="video/mp4">
        </video>
        <div class="overlay"></div>
        <div class="content">
            <h1>Every Donation Counts</h1>
            <p>
                In the rhythm of the falling rain, a story of hope unfolds. Imagine a world where a single act of kindness 
                can create ripples that touch countless lives. Together, we can make this vision a reality.
                Your donations empower initiatives that provide food, water, shelter, and education to those who need it most. 
                Each contribution, no matter how small, becomes a stepping stone toward a brighter tomorrow. 
                We believe in transparency and trust. That's why every donation is tracked, 
                and you'll receive detailed reports showing the real impact your generosity creates. Join us as we turn compassion into action.
                The rain symbolizes renewal, growth, and change. Be the rain in someone's life today. 
                Together, we can nourish the seeds of hope and transform communities across the globe.
            </p>
            <button><a href="shopping-page/shopping_page.php">Donate Now</a></button>
        </div>
    </div>
</body>
</html>
