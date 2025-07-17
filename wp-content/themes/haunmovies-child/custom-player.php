<?php

add_filter( 'halim_custom_player_types', function($data)
{
	// sample code
    if($data->episode_type == 'xxx-iframe')
    {
        $data->player_type = 'custom_iframe'; // link sẽ chạy qua iframe mặc định trong theme

        $data->link = $data->link.'?subtitle='.$data->subtitle; // thêm subtitle...
    }
	elseif($data->episode_type == 'zingtv')
    {
        $data->player_type = 'custom_api'; // sources sẽ chạy qua player mặc định trong theme (jwplayer)
        $sources = getZingTV($data->link);
        $data->sources = $sources;
    }
    elseif($data->episode_type == 'embed') {
		//if(strpos($data->link, 'ok.ru')) {
		$data->player_type = 'custom_iframe'; // sources sẽ chạy qua player mặc định trong theme (jwplayer)
		//preg_match('#(https://www.ok.ru/|https://ok.ru/)(video|live|videoembed)/([A-Za-z0-9]+)#s', $data->link, $match);
        //$sources   = $match[3];
		$host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'];
		$data->sources = '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="'.$host.'/embed/?url='.$data->link.'" allowfullscreen></iframe></div>';


		//}elseif(strpos($data->link, 'drive.google.com')) {
		//$data->player_type = 'custom_api';
		// $sources   = HalimGetDrive($data->link);
		// $data->sources = $sources;
		
		//} elseif(strpos($data->link, 'tv.zing.vn')) {
	    // $data->player_type = 'custom_api'; // sources sẽ chạy qua player mặc định trong theme (jwplayer)
	    // $sources = getZingTV($data->link);
	    // $data->sources = $sources;
		// $data->player_type = 'custom_iframe'; // dành cho type mặc định là "link" và bạn lại muốn chạy dạng embed
		// $data->sources = '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="'.$data->link.'" allowfullscreen></iframe></div>';
		//} 

	}
    return $data;

}, 10, 2);

function haundrive($url){
    preg_match('~/d/\K[^/]+(?=/)~', $url, $result);
    return $result[0];
}
function hadpro($link){
	$data->player_type = 'custom_iframe';
	preg_match('#(https://www.ok.ru/|https://ok.ru/)(video|live|videoembed)/([A-Za-z0-9]+)#s', $link, $match);
    $sources   = $match[3]; 
	$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://sv1.mphe.net/api/?host=okru&id=$sources&ahost=&aid=&onlylink=no",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: Basic YWRtaW46QCFIYXUwNzEwMTk5NA=="
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
//var_dump(json_decode($response));
$arr = json_decode($response,true);
$links = $arr["sources"][0]["file"];
$api[] = array(
                'file'      => $links,
                'type'      => 'hls',
                'label'		=> 'ZingTV'
            );
   return json_encode($api);	
}
function getZingTV($link)
{
    $curl = HALIMHelper::cURL($link);

    if(preg_match('/hlsSupport/is', $curl))
    {
        preg_match('/playlist.source = "(.*?)";/is', $curl, $hls); //hls streaming
        if($hls[1])
        {
            $api[] = array(
                'file'      => $hls[1],
                'type'      => 'hls',
                'label'		=> 'ZingTV'
            );
        }
    }
    else
    {
        preg_match_all('/playlist\.source = "(.*?)"/is', $curl, $data);
        if($data[1])
        {
            $label = preg_match('/1080/is', $data[1][0]) ? array(0 => '1080p', 1 => '720p', 2 => '480p', 3 => '360p', 4 => '240p') : array(0 => '720p', 1 => '480p', 2 => '360p', 3 => '240p');
            foreach ($data[1] as $key => $value) {
                $api[] = array(
                    'file'      => $value,
                    'label'     => $label[$key],
                    'type'      => 'video/mp4',
                    'default'   => $label[$key] == '720p' ? true : false
                );
            }
        }
    }

    return json_encode($api);
}



class HalimGetDrive
{
    function get_link($link)
    {
    	$id = HALIMHelper::getDriveId($link);
		$videoUrl = $this->getDownloadLink($id);
		$result[] = array(
			'file' => $videoUrl,
			'label' => 'Custom API',
			'type' => 'video/mp4'
		);
		return json_encode($result);
    }

	function getDownloadLink($fileId) {
		$driveUrl	= "https://drive.google.com/uc?id=".urlencode($fileId)."&export=download";
		$returnUrl = $this->parseUrl($driveUrl);
		return $returnUrl;
	}

	function parseUrl($url, $cookies = null) {
		$fileId = null;
		$idPos = strpos($url, 'id=');

		if ($idPos !== false) {
			$fileId = substr($url, $idPos+3);
			$fileId = substr($fileId, 0, strpos($fileId, '&'));
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_COOKIESESSION, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		if ($cookies != null && is_array($cookies) && count($cookies) > 0) {
			curl_setopt($ch, CURLOPT_COOKIE, implode('; ', $cookies));
		}

		$response = curl_exec($ch);

		$headers = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
		$headers = explode("\r\n", $headers);

		$redirect = null;
		$cookies = array();

		foreach ($headers as $header) {
			$delimeterPos = strpos($header, ':');
			if ($delimeterPos === false)
				continue;

			$key = trim(strtolower(substr($header, 0, $delimeterPos)));
			$value	= trim(substr($header, $delimeterPos+1));

			if ($key == 'location') {
				$redirect = $value;
			}

			if (strpos($key, 'cookie') !== false) {
				$cookies[] = substr($value, 0, strpos($value, ';'));
			}
		}

		if ($redirect == null) {
			$confirm = strpos($response, "confirm=");

			if ($confirm !== false) {
				$confirm = substr($response, $confirm, strpos($response, '"'));
				$confirm = substr($confirm, strpos($confirm, '=')+1);
				$confirm = substr($confirm, 0, strpos($confirm, '&'));
				$redirect = $this->parseUrl("https://drive.google.com/uc?export=download&confirm=".urlencode($confirm)."&id=".urlencode($fileId), $cookies);
			}
		}

		return $redirect;
	}

}
