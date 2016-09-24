<?php
	$url = $_SERVER["QUERY_STRING"];
	if(preg_match("@^http://(.+?)\.(.+?)/@", $url, $m)){
		if($m[1] === "www" && $m[2] === "nicovideo.jp"){
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: {$url}");
		}else if($m[2] === "nicovideo.jp" || $m[2] === "nimg.jp" || $m[2] === "smilevideo.jp"){
			curl_setopt($ch = curl_init($url), CURLOPT_RETURNTRANSFER, true);
			$content = curl_exec($ch);
			$content = str_replace("http://", "?http://", $content);
			$content = str_replace("url('", "url('?http://{$m[1]}.{$m[2]}", $content);
			$type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
			header("Content-Type: {$type}");
			echo($content);
		}
	}
?>
