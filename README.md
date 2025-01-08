<!-- @format -->

# Tip calculator in PHP

This is a simple tip calculator project developed in PHP. It allows users to enter the total bill and tip percentage to calculate the total amount to pay.

![Screenshot of Tip Calculator](assets/tip-calculator-screenshot.png)

### Files and Directories

- **public/**: Contains publicly accessible files.

  - **.htaccess**: Server configuration for cache handling.
  - **index.php**: Main file that handles the tip calculator logic.
  - **styles/**: Directory containing CSS files.
    - **style.css**: CSS file for custom styles.

- **src/**: Contains PHP function files.

  - **functions.php**: File containing the `tipCalculator` function.

- **templates/**: Contains HTML templates.
  - **form.php**: File containing the HTML form for entering bill and tip data.

## Installation

1. Clone the repository to your local machine.
2. Ensure you have a web server (like Apache) and PHP installed.
3. Place the files in the root directory of your web server.
4. Access `index.php` through your web browser.

## Usage

1. Enter the total bill in euros.
2. Enter the tip percentage you want to leave.
3. Click the "Calculate" button to see the total tip and the total amount to pay.

## Technologies Used

- MAMP: Local server environment.
- PHP: Server-side scripting language.
- Bulma: CSS framework for styling.
- HTML: Markup language for creating web pages.
- CSS: Stylesheet language for describing the presentation of a document.

## What I Learned

Through this project, I learned the following:

1. **PHP**:

   - How to handle forms and process data sent via POST methods.
   - Including PHP files to modularize the code (e.g., `include '../templates/form.php';`).

2. **Apache Configuration**:

   - Configuring the `.htaccess` file to handle caching for different types of files.

3. **Web Development Basics**:
   - Setting up a local development environment using MAMP.

## Author

Name: Juan C. Eugenio
Creation Date: 07 Jan 2025

## License

This project is licensed under the MIT License. See the LICENSE file for details.
