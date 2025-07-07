

---

# Donation App

## Overview

The Donation App is a platform designed to facilitate charitable donations and streamline the process of supporting various causes. It enables users to contribute to campaigns, view donation statistics, and manage donations securely.

## Features

- **User Authentication**: Secure login and registration for users.
- **Donation Management**: Support for various donation campaigns with easy payment options.
- **Admin Panel**: Manage donation campaigns, view donation details, and track progress.
- **Responsive Design**: Works seamlessly on desktops, tablets, and mobile devices.
- **Real-Time Updates**: Instant feedback on donation goals and statistics.

## Technologies Used

- **Frontend**: HTML, CSS, Bootstrap
- **Backend**: PHP
- **Database**: MySQL
- **Other Tools**: PayPal/Stripe API (for payment processing)

## Getting Started

### Prerequisites

Before running the application, ensure you have the following installed:

- A local server environment (e.g., XAMPP, WAMP, or LAMP)
- PHP 7.4+ or higher
- MySQL

### Installation

1. **Clone the Repository**  
   Clone the repository to your local system:
   ```bash
   git clone https://github.com/Haseeb7689/Donation-App.git
   ```

2. **Set Up the Database**  
   - Import the `donation_app.sql` file into your MySQL server to create the required tables.
   - Update the database configuration in `config.php`:
     ```php
     $servername = "localhost";
     $username = "your_database_username";
     $password = "your_database_password";
     $dbname = "donation_app";
     ```

3. **Run the Application**  
   - Place the project folder in the `htdocs` directory of your XAMPP/WAMP server.
   - Start your server and open the application in your browser at `http://localhost/Donation-App`.

## Usage

1. **User Actions**  
   - Register and log in to access donation features.
   - Browse active campaigns and contribute securely.

2. **Admin Actions**  
   - Access the admin panel to manage donation campaigns, view contributors, and monitor progress.

## Folder Structure

- `Admin.php`: Handles admin functionalities.
- `Donation.php`: Manages donation logic and functionality.
- `Login.php`: Handles user authentication.
- `config.php`: Database connection file.
- `assets/`: Contains static files like images, CSS, and JavaScript.

## Contributing

We welcome contributions to improve the Donation App! To contribute:

1. Fork the repository.
2. Create a new branch for your feature or bug fix:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes and push them to your forked repository.
4. Submit a pull request to this repository.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.

## Contact

For any queries or feedback, please contact:

- **Author**: Haseeb and Abdur rehman Abid
- **Email**: [abidmani790@gmail.com](mailto:abidmani790@gmail.com) [raoh2651@gmail.com](mailto:raoh2651@gmail.com)
- **GitHub**: [Haseeb7689](https://github.com/Haseeb7689) and [Abdurrehamn211](https://github.com/Abdurrehman211)

- Special Thanks to **[Triodevelopers.com](https://abdurrehman-portfolio-121.netlify.app/)** For this App.
- **Collaborations** are Accepted warm-heartedly.

---

