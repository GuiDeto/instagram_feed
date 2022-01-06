<?php require_once __DIR__ . '/../config/config.php';

function cUrlRequest($url, $debug = false): array
{
    try {
        $timeout    = 5;
        $curl       = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_DNS_CACHE_TIMEOUT, 600);
        curl_setopt($curl, CURLOPT_TIMEOUT, 600);

        if ($debug) {
            curl_setopt($curl, CURLOPT_VERBOSE, 1);
            curl_setopt($curl, CURLOPT_STDERR, fopen(dirname(__FILE__) . '/errorlog.txt', 'w'));
        }

        $request    = curl_exec($curl);
        curl_close($curl);

        return !empty($request) ? (array)json_decode($request) : [];
    } catch (\Throwable $th) {
        exit($th);
    }
}

function refreshToken()
{
    global $lnkRefreshToken;

    $date                   = date("Y-m-d H:i:s");
    $lastRefreshTokenFile   = __DIR__ . '/../data/update.json';
    if (file_exists($lastRefreshTokenFile)) {
        $date_json          = json_decode(file_get_contents($lastRefreshTokenFile))->update;
    } else {
        $date_json          = $date;
    }

    if (strtotime($date) - strtotime($date_json) > 86400) {
        cUrlRequest($lnkRefreshToken);
        $array      = array('update' => $date);
        $fp         = fopen('update.json', 'w');
        fwrite($fp, json_encode($array, JSON_PRETTY_PRINT));
        fclose($fp);
    }
}

function instagramFeed()
{
    refreshToken();

    global $lnkFeeds;

    $rspFeeds = @cUrlRequest($lnkFeeds);
    return !empty($rspFeeds) && isset($rspFeeds['data']) ? $rspFeeds['data'] : false;
}
