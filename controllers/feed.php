<?php require_once __DIR__ . '/functions.php';

header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: GET");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');
header('Content-type: application/json; charset=utf-8');

$feeds_content  = instagramFeed();
$str            = [];

if(!empty($feeds_content)){
    $str = array_map(function($c) {
        return [ 
                    'id'            => $c->id, 
                    'username'      => $c->username, 
                    'media_type'    => $c->media_type, 
                    'media_url'     => $c->media_url,
                    'permalink'     => $c->permalink,
                    'caption'       => isset($c->caption)?$c->caption:'',
        ];
    }, $feeds_content);
}


echo json_encode($str, JSON_PRETTY_PRINT);
