<?php
	function myInclude($file){
		$content = file_get_contents($file);
		$temp = [];
		preg_match_all('/<link.*>/sU', $content, $temp);
		$cssArray = $temp[0];

		$temp = [];
		preg_match_all('/<style.*<\/style>/sU', $content, $temp);
		// $cssArray = array_merge($cssArray, $temp[0]);
		$styleArray = $temp[0];
		
		$string = '';
		foreach($cssArray as $key => $value){
			$value = preg_replace('/\'/', '"', $value);
			$string .= "$('$value').appendTo($('head'));";
		}
		$string = '<script>'.$string.'</script>';
		echo $string;

		$string = '';
		foreach($styleArray as $key => $value){
			$value = preg_replace('/\s*/', '', $value);
			$value = preg_replace('/\'/', '"', $value);
			$string .= "$('$value').appendTo($('head'));";
		}
		$string = '<script>'.$string.'</script>';

		$temp = [];
		preg_match_all('/<script.*<\/script>/sU', $content, $temp);
		$jsArray = $temp[0];

		$string = '';
		$temp = [];
		foreach($jsArray as $key => $value){
			$value = preg_replace('/\'/', '"', $value);
			if(preg_match('/src="(.*)"/sU', $value, $temp) > 0){
				// var_dump($temp[1]);
				$string = "var script = document.createElement('script');
				script.src = '$temp[1]';     //填自己的js路径
				$('head').append(script);";
				echo '<script>'.$string.'</script>';
			}else{
				preg_match('/<script.*>(.*)<\/script>/sU', $value, $temp);
				// $temp = preg_replace('/\s*/', '', $temp);
				$temp[1] = trim($temp[1]);
				$temp[1] = preg_replace('/\r*\n*/', '', $temp[1]);
				// var_dump($temp[1]);
				$string = "var script = document.createElement('script');
				$(script).text('$temp[1]');
				$('body').append(script);";
				echo '<script>'.$string.'</script>';
			}
		}

		$temp = [];
		preg_match('/<body(.*>)(.*)<\/body>/sU', $content, $temp);
		echo $temp[2];

	}

?>