# Binnected - Smart Waste Management Platform ♻️

Binnected is an innovative web platform dedicated to smart waste management and recycling. It helps communities optimize collection routes and allows users to track their environmental impact through personalized statistics.


##  Features
* **Interactive Dashboard:** Visualization of recycling data using Chart.js.
* **User Authentication:** Secure login and registration system.
* **Environmental Impact:** Personalized statistics to encourage better sorting habits.
* **Community Tools:** FAQ and contact sections for local waste management support.


##  Tech Stack
* **Frontend:** HTML5, CSS3, JavaScript (Chart.js)
* **Backend:** PHP (MySQLi)
* **Database:** MySQL (Hosted on Alwaysdata)


##  Live Demo
You can explore the application here: [https://binnected.alwaysdata.net/](https://binnected.alwaysdata.net/)

> **Note:** For security and stability reasons, the registration system is disabled on this demo. 
> Please use the following credentials to log in:
> - **Email:** `test@test`
> - **Password:** `12345678`


##  Security Disclaimer
This is an educational project from high school (2025). 
- **Read-only mode:** The online demo is set to read-only to prevent database misuse.
- **Code Integrity:** The source code available in this repository is the original version. For production, I recommend implementing `password_hash()` and `prepared statements`.


##  Group Project & IoT Integration
This platform is part of a larger collaborative project. While this repository hosts the web interface and backend, the physical "Binnected" smart bin relies on an **ESP32** system.


The hardware component includes:
- **Sensor Integration:** Real-time waste level and sorting sensors.
- **Data Transmission:** Automated data sending from the physical bin to this web platform.

🔗 **Hardware Repository:** [https://github.com/Thematiqueslol/binnected-esp32](https://github.com/Thematiqueslol/binnected-esp32)

Thanks to Thematiqueslol for this project !