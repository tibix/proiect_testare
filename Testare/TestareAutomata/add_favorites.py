import time
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.support.ui import Select

chrome_options = webdriver.ChromeOptions()
driver = webdriver.Chrome(options=chrome_options)
driver.get("https://testare.itdev.ro/")

try:
    # Sign In
    sign_in_link = WebDriverWait(driver, 10).until(
        EC.element_to_be_clickable(
            (By.XPATH, "//a[@class='menu__link framed-item shiny-item' and contains(text(), 'Sign In')]"))
    )
    sign_in_link.click()

    # Fill in login details
    username_field = WebDriverWait(driver, 5).until(
        EC.presence_of_element_located((By.ID, "login"))
    )
    password_field = WebDriverWait(driver, 5).until(
        EC.presence_of_element_located((By.ID, "password"))
    )
    login_button = WebDriverWait(driver, 5).until(
        EC.presence_of_element_located((By.NAME, "autentificare"))
    )

    username_field.send_keys("test_beatrice")
    password_field.send_keys("123cand")
    login_button.click()

    user_menu = WebDriverWait(driver, 5).until(
        EC.element_to_be_clickable(
            (By.XPATH, "//a[@class='menu__link framed-item framed-item--dif shiny-item dropdown-toggle account']"))
    )
    user_menu.click()

    bookmarks_link = WebDriverWait(driver, 5).until(
        EC.element_to_be_clickable((By.XPATH, "//i[@class='fa-solid fa-book-bookmark']/ancestor::a[@class='dropdown-item']"))
    )
    bookmarks_link.click()

    desired_title = "Carturesti"
    xpath_expression = f"//td[contains(text(), '{desired_title}')]/following-sibling::td//i[@class='fa-regular fa-heart']"

    favorite_button = WebDriverWait(driver, 5).until(
        EC.element_to_be_clickable((By.XPATH, xpath_expression))
    )
    driver.execute_script("arguments[0].scrollIntoView();", favorite_button)
    driver.execute_script("arguments[0].click();", favorite_button)


    if "home.php" in driver.current_url:
        print("Bookmark added to Favorites: Successfully.")
        print(f"Bookmark with title '{desired_title}' add to Favorites successfully!")
    else:
        print("Bookmark added to Favorites: Failed!")

except TimeoutException:
    print("Bookmark added to Favorites: Failed!")

finally:
    time.sleep(5)
    driver.quit()
