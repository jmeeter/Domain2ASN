<!DOCTYPE html>
<html>
<head>
    <title>Reverse DNS Lookup</title>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
</head>
<body>
    <h1>Reverse DNS Lookup</h1>
    <form action="lookup.php" method="post">
        <label for="domain_name">Enter a domain name:</label>
        <input type="text" name="domain_name" id="domain_name" required>
        <div class="cf-turnstile" data-sitekey="YOUR_KEY"></div> 
        <button type="submit">Lookup</button>
    </form>
    <?php
    // Sanitize the user input
    if (isset($_POST['domain_name'])) {
        $domain_name = $_POST['domain_name'];
        // Remove whitespace
        $domain_name = trim($domain_name);
        // Split the string by commas and remove any empty elements
        $domain_name = array_filter(explode(',', $domain_name), 'trim');
        // Remove any elements that are not valid domain names
        $domain_name = array_filter($domain_name, function($domain_name) {
            return preg_match('/^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $domain_name);
        });
        // Output the sanitized domain names
        echo '<p>Sanitized domains: ' . implode(', ', $domain_name) . '</p>';
    }
    ?>
</body>
</html>
