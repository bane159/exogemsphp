This is my first serious SSR web application, thats based on a web shop.

### You can check out my official docs on this project here: https://github.com/bane159/ExoGems/blob/main/Dokumentacija.pdf (serbian version only.)
##  Note
Built entirely without AI tools (2024) to focus on hands-on learning and deep understanding of PHP and web development fundamentals.

# ExoGems - Jewelry E-Commerce Platform

A full-featured PHP e-commerce web application for browsing and purchasing jewelry products.

##  Table of Contents

- [About](#about)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Usage](#usage)
- [Project Structure](#project-structure)

##  About

ExoGems is an online jewelry store built with PHP, MySQL, and Bootstrap. It provides a complete shopping experience for customers and a comprehensive admin panel for store management.

##  Features

###  Customer Features

#### User Authentication & Account
- User registration with email, name, lastname, address, and password
- Email activation for account verification
- Secure login/logout with session management
- Account status tracking (Active/Inactive)

#### Product Browsing & Shopping
- Homepage with hero banner and featured products
- Best sellers section displaying trending products
- Full product catalog with:
  - Keyword search (by product name or category)
  - Category filtering
  - Material filtering
  - Multiple sorting options (popularity, price ascending/descending, newest)
  - Pagination support

#### Shopping Cart & Checkout
- Shopping cart with quantity management
- Complete checkout process with billing details
- Order confirmation page with email notification
- Purchase history for viewing past orders

#### Communication & Engagement
- Contact form with Google Maps integration
- Newsletter subscription/unsubscription system

###  Admin Features

#### User Management
- View all registered users
- Activate/Deactivate user accounts
- Remove user accounts
- Add new users directly
- View individual user purchase history

#### Product Management
- Add new products with:
  - Name, description, weight
  - Quantity available
  - Category and material selection
  - Price configuration
  - Image upload (PNG, JPG, JPEG)

#### Category & Material Management
- Add/Delete product categories
- Add/Delete material types

#### Newsletter Management
- View all subscribers
- Unsubscribe users
- Block/Unblock users from subscribing

#### Contact Management
- View and manage customer contact messages

##  Technologies Used

- **Backend:** PHP 7+
- **Database:** MySQL with PDO
- **Frontend:** HTML5, CSS3, JavaScript
- **CSS Framework:** Bootstrap 4
- **CSS Preprocessor:** SCSS
- **Icons:** Font Awesome, Themify Icons, Linericon
- **JavaScript Libraries:** jQuery, Owl Carousel, Nice Select, noUiSlider

##  Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/exogemsphp.git
   ```

2. **Move to your web server directory**
   ```bash
   # For XAMPP
   mv exogemsphp /xampp/htdocs/
   ```

3. **Configure database connection**
   - Open `php/conn.php`
   - Update database credentials as needed

4. **Import the database**
   - Import `exogems(1).sql` into your MySQL server

5. **Start your local server**
   - Start Apache and MySQL via XAMPP Control Panel

6. **Access the application**
   ```
   http://localhost/exogemsphp/
   ```

##  Database Setup

Import the SQL file into your MySQL database:

```bash
mysql -u root -p < exogems(1).sql
```

Or use phpMyAdmin to import `exogems(1).sql`.

##  Project Structure

```
exogemsphp/
├── css/                    # Compiled CSS files
├── img/                    # Images and assets
│   ├── category/
│   ├── home/
│   ├── non-template/
│   │   └── product-images/ # Uploaded product images
│   └── ...
├── js/                     # JavaScript files
│   ├── admin.js
│   ├── cart.js
│   ├── checkout.js
│   ├── login.js
│   ├── register.js
│   └── ...
├── php/                    # PHP backend files
│   ├── conn.php            # Database connection
│   ├── logic.php           # Core functions
│   ├── header.php          # Header component
│   ├── footer.php          # Footer component
│   └── ...
├── scss/                   # SCSS source files
│   └── theme/
├── vendors/                # Third-party libraries
│   ├── bootstrap/
│   ├── fontawesome/
│   ├── jquery/
│   └── ...
├── index.php               # Homepage
├── category.php            # Product catalog
├── cart.php                # Shopping cart
├── checkout.php            # Checkout page
├── login.php               # Login page
├── register.php            # Registration page
├── admin.php               # Admin dashboard
└── ...
```

##  Author

**Branislav Radovanovic 31/22**

##  License

This project is for educational purposes.
