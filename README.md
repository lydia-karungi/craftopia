# 🧵 Craftopia – Online Crafts Shop

Craftopia is an online shop built to showcase and sell a wide variety of local and international crafts. The platform targets tourists and local residents across Australia who appreciate handmade and cultural items.

## Getting Started

### 1. Clone the Repository

git clone https://github.com/yourusername/craftopia.git
cd craftopia

2. Set Up the MySQL Database

Make sure MySQL is installed and running. Then:
	•	Create a new database named craftopia_db
	•	Import the schema:
 mysql -u root -p craftopia_db < database/schema.sql

	•	Update the database credentials in your config.php file:
    $host = 'localhost';
    $dbname = 'craftopia_db';
    $username = 'root';
    $password = '';

3. Run the PHP Server

In the project root directory, start the server with:
  php -S localhost:8000

Then open http://localhost:8000 in your browser.
