<?php date_default_timezone_set("America/Sao_Paulo");

$token              = '<your-token>';
$lnkRefreshToken    = "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=$token";
$lnkFeeds           = "https://graph.instagram.com/me/media?fields=username,permalink,timestamp,caption,media_type,media_url&access_token=$token";

