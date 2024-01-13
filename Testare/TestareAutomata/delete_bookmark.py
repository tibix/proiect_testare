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

    bookmark_title_to_delete = "Books-expressBooks-express"
    delete_button_xpath = f"//td[text()='{bookmark_title_to_delete}']/following-sibling::td/a[contains(@class, 'btn-outline-secondary')]"
    delete_button = WebDriverWait(driver, 10).until(
        EC.element_to_be_clickable((By.XPATH, delete_button_xpath))
    )

    delete_button.click()

    if "delete_bookmark.php" in driver.current_url:
        print("Bookmark deleted: Successfully.")
        print(f"Bookmark with title '{bookmark_title_to_delete}' deleted successfully!")
    else:
        print("Bookmark deleted: Failed!")

except TimeoutException:
    print("Bookmark deleted: Failed!")

finally:
    time.sleep(5)
    driver.quit()
