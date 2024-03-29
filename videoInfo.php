<?php
header('Content-Type: application/json; charset=utf-8');
define('APIKEY', '');

$id = $_GET['id'] ?? 'Mz8uuWJEJpk';

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

function video_info($id='')
{
  $api_url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id=' . $id . '&key=' . APIKEY;
  return json_decode(httpGet($api_url), true)['items'][0]['snippet'];
}

function video_statistics($id='')
{
  $api_url = 'https://youtube.googleapis.com/youtube/v3/videos?part=statistics&id=' . $id . '&key=' . APIKEY;
  return json_decode(httpGet($api_url), true)['items'][0];
}

echo json_encode(video_info($id));
?>
