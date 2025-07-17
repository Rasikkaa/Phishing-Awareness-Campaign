<?php
$secret = 'changeme123'; // Change this to a strong secret code
$provided = $_GET['code'] ?? $_POST['code'] ?? '';
if ($provided !== $secret) {
    echo '<form method="get"><label>Admin Code: <input type="password" name="code"></label> <button type="submit">View Log</button></form>';
    exit;
}
$logfile = __DIR__ . '/phish_log.txt';
if (file_exists($logfile)) {
    $log = htmlspecialchars(file_get_contents($logfile));
} else {
    $log = 'No log file found.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Phishing Log Review</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body { font-family: Arial, sans-serif; background: #fafafa; color: #222; }
        .container { max-width: 700px; margin: 40px auto; background: #fff; padding: 2em; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); }
        h1 { color: #e1306c; }
        pre { background: #eee; padding: 1em; border-radius: 4px; overflow-x: auto; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Phishing Log Review</h1>
        <pre><?php echo $log; ?></pre>
    </div>
</body>
</html> 