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

function get_video_categories($id='', $hl='en_US')
{
  $api_url = 'https://www.googleapis.com/youtube/v3/videoCategories?part=snippet&hl=' . $hl . '&id=' . $id . '&key=' . APIKEY;
  return json_decode(httpGet($api_url), true)['items'][0]['snippet'];
}

echo json_encode(get_video_categories('20', 'zh_TW'));
?>