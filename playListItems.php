<?php
header('Content-Type: application/json; charset=utf-8');
define('APIKEY', '');

$id = $_GET['playlistid'] ?? 'PL8CKkc4Hozgo8T48LuVObc16i_2CQdz3g';

/**
 * [httpGet curl use get]
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function httpGet($url)
{
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false);
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
}

function playlist_items($id='') {
  $api_url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=' . $id . '&key=' . APIKEY;
  return json_decode(httpGet($api_url), true)['items'][0]['snippet'];
}

echo json_encode(playlist_items($id));
?>
