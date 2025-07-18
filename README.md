# 📧 Phishing Awareness Campaign – Mock Test Project

This project simulates a **phishing attack** to train users on how to identify and avoid phishing attempts. It uses a **fake Instagram login page** and a simple backend to log user input and deliver awareness messages.

---

## 📝 Project Overview

- Sends a **mock phishing email** (stored in `email.txt`) to test users.
- Redirects users to a **fake Instagram login page** (`index.html`) hosted locally.
- Captures login attempts using PHP and logs them in `phish_log.txt`.
- Then redirects the user to an **awareness message page** (`review.php`) explaining the phishing scenario.

---

## 📁 Project Structure

| File / Folder       | Purpose                                                   |
|---------------------|-----------------------------------------------------------|
| `email.txt`         | Sample phishing email text with fake login link           |
| `index.html`        | Instagram-style fake login page (frontend)                |
| `capture.php`       | Handles form input and logs it in `phish_log.txt`         |
| `phish_log.txt`     | Log file storing captured credentials (for awareness)     |
| `review.php`        | Awareness page shown after form submission                |
| `Images/`           | Contains Instagram logo and background images             |
| `styles.css`        | CSS file for styling the fake login page                  |

---

## ✅ How to Run Locally

### 📌 Prerequisites
- PHP installed (verify with `php -v`)
- Cloudflared downloaded (`cloudflared.exe` for Windows)

---

### ▶ Step-by-Step Instructions

#### 1. Start Local PHP Server
Open PowerShell or CMD in your project directory and run:
```bash
php -S localhost:8000

This will host your project locally on [http://localhost:8000](http://localhost:8000)

---

#### 2. Start Cloudflare Tunnel

In the same directory, run:

```bash
.\cloudflared.exe tunnel --url http://localhost:8000
```

Cloudflare will generate a **temporary public link**, for example:

```
https://your-tunnel-id.trycloudflare.com
```

> ✅ Share this link with test users for mock phishing awareness.

---

#### 3. Send the Fake Email

Use the content from `email.txt` to simulate a phishing email.
Update the link to match your generated Cloudflare URL like:

```
https://your-tunnel-id.trycloudflare.com/index.html
```

---

## 💾 Data Storage

* Login attempts are **saved locally** in `phish_log.txt`.
* No external database is used.
* This project works **without XAMPP** — using only PHP’s built-in server.

---

## 🚨 Disclaimer

> ⚠ This project is for **educational use only**.
> Do not deploy or distribute it in real environments without proper consent.
> It is intended for **cybersecurity awareness training** purposes only.

---

## 🎯 Objective

* Simulate a phishing attack scenario.
* Teach users to detect suspicious links and fake pages.
* Promote safer online habits through a practical demo.

---

## 👤 Author

**RASI P**
For academic and awareness demonstration purposes.

