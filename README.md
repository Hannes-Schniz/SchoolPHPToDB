# Bulletin Board – PHP Classifieds Project

## Overview

This project is a web-based "Bulletin Board" (classifieds portal) for schools or clubs. Users can create, browse, filter, and edit ads. The application is fully implemented in PHP and MySQL and **does not require JavaScript** for its core functions.

---

## Features

- **Create Ads:**  
  Users can create new ads with title, text, one or more categories, name, email, and phone number. Multiple categories can be selected per ad.

- **Filter Ads:**  
  Ads can be filtered by category using the sidebar.

- **Sort Ads:**  
  By default, the newest ads are displayed first.

- **Edit Ads:**  
  Each ad is fully clickable. Clicking on an ad opens an edit page where the ad can be changed.

- **Multiple Categories:**  
  Ads can be assigned to multiple categories (multi-select in the form).

- **Responsive Design:**  
  The interface works on both desktop and mobile devices.

- **No JavaScript Dependency:**  
  All functions (filtering, displaying, editing, creating) are handled server-side with PHP.

- **Secure Database Access:**  
  All database operations use prepared statements.

---

## Technologies

- **PHP**  
  For all server logic, forms, database access, and HTML output.

- **MySQL/MariaDB**  
  For storing ads, categories, and user information.

- **HTML5 & CSS3**  
  For layout and interface styling.

---

## Project Structure

- **index.php**  
  Homepage with category filter, ad list, and link to create new ads.

- **add_posting.html / add_posting.php**  
  Form and backend for creating new ads (with multi-select for categories).

- **change_posting_page.php / change_posting.php**  
  Form and backend for editing existing ads.

- **messages.php**  
  Outputs all ads as HTML blocks (included in index.php).

- **db.php**  
  Establishes the database connection and provides the current query result depending on the category filter.

- **getPost.php**  
  Loads the data of a specific ad for the edit page.

---

## Database Structure (Short Overview)

- **anzeige**  
  ad number, title, text, date, user number

- **inserent**  
  user number, name, email, phone number

- **anzeigerubrik**  
  category number, label

- **rubrikzuordnung**  
  ad number, category number (enables multiple assignments)

---

## Usage

1. **Homepage:**  
   Shows all ads. Categories can be filtered using the links.

2. **New Ad:**  
   "+ Neue Anzeige" leads to the form. Multiple categories can be selected.

3. **Edit Ad:**  
   Clicking an ad opens the edit form with all current data.

4. **Save Ad:**  
   Changes are applied immediately after saving.

---

## Notes

- **Error Handling:**  
  Errors are displayed in a user-friendly way. If there are database problems, an appropriate message appears.

- **Security:**  
  All user input is protected with `htmlspecialchars` before output.

- **Extensibility:**  
  The system can easily be extended with more fields, categories, or features.

---

## Installation

1. **Create Database**  
   Set up the table structure as described above in MySQL/MariaDB. Use createTable.sql.

2. **Insert Data**
   You can use the insert.php to add dummy data to your database.

3. **Check Configuration**  
   Adjust credentials in all php files if necessary.

4. **Copy Project to Web Server**  
   Place all files in a web server directory (e.g. `/var/www/html/BulletinBoard`).

5. **Open in Browser**  
   Go to `http://localhost/BulletinBoard/index.php`.

---

## License

This project is free to use for educational and private purposes.

See [MIT License](LICENSE) for details.

MIT License

Copyright (c) 2025 Hannes

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
