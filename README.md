# 📧 Phishing Awareness Campaign – Mock Test Project

This project is a **phishing awareness mock test campaign** designed to simulate a phishing attack in a controlled environment. It helps educate users on recognizing phishing attempts and avoiding credential theft.

---

## 📝 Project Overview

- This project sends a **fake email** (stored in `email.txt`) to test users, which contains a **link to a fake Instagram login page**.
- When the user clicks the link and attempts to log in, the system captures the attempt and then **redirects them to an awareness message** explaining the phishing risk.
- It is intended purely for **educational and awareness training purposes**.

---

## 📁 Files Included

| File / Folder       | Purpose                                              |
|---------------------|------------------------------------------------------|
| `email.txt`         | The mock phishing email template                    |
| `index.html`        | Fake Instagram login page (entry point)            |
| `capture.php`       | Captures user input (simulating credential theft)   |
| `phish_log.txt`     | Logs login attempts for evaluation                  |
| `review.php`        | Displays an awareness or warning message            |
| `Images/`           | Contains all fake branding images                   |
| `styles.css`        | Custom styling for fake login interface             |

---

## 🚨 Disclaimer

This project is strictly for **cybersecurity training and internal awareness campaigns**.  
**Do not deploy or use this on live systems or against individuals without consent.**

---

## ✅ How It Works

1. A user receives a fake email (from `email.txt`).
2. Clicking the link opens a fake Instagram login page (`index.html`).
3. If they try to log in, their input is logged in `phish_log.txt`.
4. The user is then redirected to an **awareness page** (`review.php`) explaining the purpose of the campaign.

---

## 💡 Objective

The goal of this mock campaign is to:
- Simulate real-world phishing attacks.
- Educate users on recognizing suspicious links and pages.
- Encourage proactive cybersecurity habits.

---

## 👤 Author

**RASI P**  
For academic/project submission and awareness purpose only.

---
