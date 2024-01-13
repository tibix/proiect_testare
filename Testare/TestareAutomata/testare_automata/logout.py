from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException
import time

# Set up Chrome options
chrome_options = webdriver.ChromeOptions()

# Set up Selenium WebDriver for Chrome
driver = webdriver.Chrome(options=chrome_options)

# Navigate to the login page
driver.get("https://testare.itdev.ro/login.php")

try:
    # Explicitly wait for the username field to be present
    username_field = WebDriverWait(driver, 10).until(
        EC.presence_of_element_located((By.ID, "login"))
    )
except TimeoutException as e:
    print("Timed out waiting for the username field to be present.")
    raise e  # Re-raise the exception to terminate the script

# Explicitly wait for the password field to be present
password_field = WebDriverWait(driver, 10).until(
    EC.presence_of_element_located((By.ID, "password"))
)

# Explicitly wait for the login button to be present
login_button = WebDriverWait(driver, 10).until(
    EC.presence_of_element_located((By.NAME, "autentificare"))
)

# Enter username and password
username_field.send_keys("bmov")
password_field.send_keys("cand1")

# Click the login button
login_button.click()

# Explicitly wait for a short time to allow the page to load
time.sleep(5)

# Check if the login was successful based on the presence of a specific element
try:
    dashboard_element = WebDriverWait(driver, 10).until(
        EC.presence_of_element_located((By.XPATH, "//div[@class='home']"))
    )
    print("Login Successful!")
except TimeoutException:
    print("Login Failed!")

# Perform the logout
try:
    # Find and click on the logout button
    logout_button = WebDriverWait(driver, 10).until(
        EC.presence_of_element_located((By.XPATH, "//a[contains(@href, 'logout.php')]"))
    )
    logout_button.click()
    print("Logout Successful!")
except TimeoutException:
    print("Logout Failed!")

# Close the browser window
driver.quit()
