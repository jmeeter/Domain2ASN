<?php
$domain_name = $_POST["domain_name"];
try {
    $ip_address = gethostbyname($domain_name);

    // Get ASN information using the IPinfo API
    $url = "https://ipinfo.io/{$ip_address}/json";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($response, true);
    $asn = $json["org"];

    echo "ASN: " . $asn;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
