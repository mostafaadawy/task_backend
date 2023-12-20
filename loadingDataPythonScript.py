import requests
from bs4 import BeautifulSoup
import mysql.connector

# Function to scrape data from the website
def scrape_and_save_to_db():
    # URL of the website to scrape
    url = "https://techybusinessservices.co.uk/examPython.php"

    # Send a GET request to the URL
    response = requests.get(url)

    if response.status_code == 200:
        # Parse the HTML content using BeautifulSoup
        soup = BeautifulSoup(response.content, 'html.parser')

        # Extract employee data
        employee_data = []
        for row in soup.find_all('tr')[1:]:  # Skip the header row
            columns = row.find_all('td')
            name = columns[1].text.strip()
            email = columns[2].text.strip()
            salary = columns[3].text.strip()

            employee_data.append((name, email, salary))

        # Print the extracted data before saving
        print("Extracted Employee Data:", employee_data)

        # Save data to MySQL database
        save_to_database(employee_data)
        print("Data scraped and saved to the database.")
    else:
        print("Failed to retrieve data. HTTP Status Code:", response.status_code)

# Function to save data to MySQL database
def save_to_database(employee_data):
    # Connect to MySQL database
    conn = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="task_backend",
        port=3308  # Replace with your MySQL port if it's not 3306
    )

    cursor = conn.cursor()

    # Create the employee table if it doesn't exist
    cursor.execute('''
        CREATE TABLE IF NOT EXISTS employees (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            email VARCHAR(255),
            salary VARCHAR(255)
        )
    ''')

    # Insert employee data into the table
    cursor.executemany('''
        INSERT INTO employees (name, email, salary) VALUES (%s, %s, %s)
    ''', employee_data)

    # Commit changes and close the connection
    conn.commit()
    conn.close()

if __name__ == "__main__":
    scrape_and_save_to_db()
