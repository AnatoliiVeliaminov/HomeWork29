<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function Site_source_code($domain){
    if(!filter_var($domain, FILTER_VALIDATE_URL))
    {
        return false;
    }
    $desk_url = curl_init($domain);
    curl_setopt  ($desk_url, CURLOPT_RETURNTRANSFER, 1);
    $return_result = curl_exec($desk_url);
    curl_close($desk_url);

    return $return_result;
}

$page_site = Site_source_code('https://my.olympus-consumer.com/');
if ($page_site == FALSE) {
    echo "Проверьте адрес сайта";
}
$file = './markup.html';
$site = file_put_contents($file, $page_site);

