# Arcade Ticketing System

The **Arcade Ticketing System** is a web-based application designed to streamline ticket purchasing for arcade games. It allows users to browse available games, select tickets, and make secure payments, all through an intuitive interface.

---

## Features

- **Game Browsing**: Explore a list of all games available in the arcade.
- **Ticket Management**: Add tickets to your cart based on the group you choose.
- **Payment Processing**: Integrated with the **M-Pesa Daraja API** for secure payments.
- **Informative Pages**: Includes pages like *About Us* and *Contact Us* for user engagement.
- **Admin Dashboard**: Provide CRUD operations for managing games, tickets and users.

  ---

  ## Prerequisites

  - PHP 8.0+
  - Laravel Framework
  - Composer (PHP Dependency Manager)
  - Node.js and NPM
  - MySQL Database

  ---

  ## Installation

    1. **Clone the Repository**:
       ```bash
       git clone <repository-url>
    2. **Navigate to the Project Directory**:
       ```bash
       cd project-directory
    3. **Install Backend Dependencies**:
       ```bash
       composer install
    4. **Install Frontend Dependencies**:
       ```bash
       npm install && npm run dev
    5. **Set Up the Environment File**:
       - Rename the `.env.example` file to `.env`:
         ```bash
         mv .env.example .env
         ```
       - Open the `.env` file in a text editor and update the following configurations:
       - **Database Credentials**:  
       ```env
       DB_HOST=127.0.0.1
       DB_PORT=3306
       DB_DATABASE=your_database_name
       DB_USERNAME=your_username
       DB_PASSWORD=your_password
       ```
       - **M-Pesa Daraja API Keys**:  
       ```env
       MPESA_CONSUMER_KEY=your_consumer_key
       MPESA_CONSUMER_SECRET=your_consumer_secret
       MPESA_ENV=sandbox # or live
       MPESA_SHORTCODE=your_shortcode
       MPESA_PASSKEY=your_passkey
       ```
       - Save the file after making these changes.
    6. **Run Database Migrations**:
       ```bash
       php artisan migrate
    7. **Start the Development Server**:
       ```bash
       php artisan serve
    8. Access the Application on your web browser.

## How It Works
1. **Browse Available Games**: Users can view all arcade games and explore ticket options.
2. **Add Tickets to Cart**: Select and add tickets for games or groups based on preferences.
3. **Proceed to Checkout**: Review your cart and complete payment using the M-Pesa Daraja API.
4. **Enjoy Your Arcade Experience!**

## Future Enhancements
- **Special Offers**: Add discounts and offers during holidays, weekends, or weekdays.
- **Analytics Dashboard**: Introduce analytics for most visited days, highest revenue, and popular games.

## Feel Free to Use This Project  
We built the Arcade Ticketing System as a learning experience and to solve real-world challenges for arcade businesses. You're welcome to use, modify, and adapt this project for your own needs!

Whether you're looking to build a similar system or expand upon the existing features, feel free to:  
- Clone and fork the repository.  
- Share feedback or report issues.  
- Submit pull requests for improvements.

## Acknowledgments  
- **Safaricom Developers Community**: For resources and support on integrating the M-Pesa Daraja API.  
- **Laravel**: For extensive tutorials and forums that helped in development.

## License  
This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).

 

       
    
