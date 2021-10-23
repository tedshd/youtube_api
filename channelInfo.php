<?php
header('Content-Type: application/json; charset=utf-8');
define('APIKEY', '');

$id = $_GET['channelid'] ?? 'PL8CKkc4Hozgo8T48LuVObc16i_2CQdz3g';
$user_name= $_GET['playlistid'] ?? 'tysh310246';

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
// https://developers.google.com/youtube/v3/docs/playlistItems/list
function channel_indo_by_username($user_name='') {
  $api_url = 'https://youtube.googleapis.com/youtube/v3/channels?part=contentDetails&forUsername=' . $user_name . '&key=' . APIKEY;
  return json_decode(httpGet($api_url), true)['items'][0]['contentDetails']['relatedPlaylists']['uploads'];
}
function channel_indo_by_channelid($id='') {
  $api_url = 'https://youtube.googleapis.com/youtube/v3/channels?part=contentDetails&id=' . $id . '&key=' . APIKEY;
  return json_decode(httpGet($api_url), true)['items'][0]['contentDetails']['relatedPlaylists']['uploads'];
}

echo json_encode(channel_indo_by_username($user_name));
?>
