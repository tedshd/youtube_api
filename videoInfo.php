<?php
header('Content-Type: application/json; charset=utf-8');

define('APIKEY', '');

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
  return httpGet($api_url);
}

echo json_decode(video_info('Mz8uuWJEJpk'));

?>