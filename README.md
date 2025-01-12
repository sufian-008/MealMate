# MealMate User Management System

This project is a simple user management system for MealMate, allowing users to sign up and log in as either **buyers** or **sellers**. It connects to a MySQL database to store and retrieve user information.

## Features
- **User Roles**: Separate signup forms for buyers and sellers.
- **User Data Storage**: Stores user information in a MySQL database.
- **Login**: Validates user credentials for login.
- **Buyer Dashboard**: Redirects buyers to their respective dashboard after login.
- **Seller Dashboard**: Redirects sellers to their respective dashboard after login.

## File Structure
- **signup.html**: The signup page with forms for buyers and sellers.
- **login.html**: The login page.
- **signup.php**: Handles signup requests and stores user data in the database.
- **login.php**: Handles login requests and validates user credentials.
- **BuyerDashboard.html**: Placeholder for the buyer's dashboard.
- **SellerDashboard.html**: Placeholder for the seller's dashboard.
- **Database**: MySQL database for storing user information.


## Installation
1. **Clone the Repository**: Download or clone the project files.`
2. **Move Files to Web Server**: Place the files in your web server directory (e.g., `htdocs` for XAMPP).



3. **Start Local Server**:
   - Use XAMPP, WAMP, or any local server to run the project.
   - Ensure MySQL and Apache are running.

## Usage
### Signup
1. Open the signup page.
2. Choose a role (**Buyer** or **Seller**).
3. Fill in the required details and submit the form.
4. User details will be saved in the `users` table.

### Login
1. Open the login page.
2. Enter your email and password.
3. Upon successful login, you will be redirected to:
   - **BuyerDashboard.html** if you are a buyer.
   - **SellerDashboard.html** if you are a seller.
4. If credentials are invalid, an error message will be displayed.


## Future Enhancements
- Implement password hashing for better security.
- Add email verification during signup.
- Include password recovery functionality.
- Enhance the UI/UX of the signup and login pages.

## License
This project is for educational purposes and is not intended for production use.

