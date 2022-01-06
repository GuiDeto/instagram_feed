<?php date_default_timezone_set("America/Sao_Paulo");

$token              = "IGQVJWcFUwNkNlWFBZAendaQ3VSazNfTHlhLVA5bTJmZAG9FeW01R3lCdEg0RWN4eE5leEYxZAFJ3TW0wSUh3ZA3NmRkN2dC1YQzVTbkJfa2JDcnVENUNCejhxTnNRdDhwWlFNdDFiVnJDUlM0d29NTlJ3QQZDZD";
$lnkRefreshToken    = "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=$token";
$lnkFeeds           = "https://graph.instagram.com/me/media?fields=username,permalink,timestamp,caption,media_type,media_url&access_token=$token";
$linkAuthFeeds      = "https://detonix.com.br/controllers/feed/feed.php";
