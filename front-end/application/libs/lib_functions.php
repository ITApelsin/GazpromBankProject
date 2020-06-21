<?

	class lib_functions extends core
	{
		const KEY = 'SECRET_KEY'; // Ключ для шифрования

		public function encodeString($str)
		{
			return md5(md5(base64_encode(base64_encode($str))));
		}

		public function encryptString($data, $key = false) 
		{
			if(!$data) 
			{
				return '';
			}

			$key = ($key === false) ? self::KEY : $key;
			$key = hash('sha256', $key, true);
			$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
			$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	        $encrypted = $iv .  mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, $iv);

	        return base64_encode($encrypted);
		}
 
		public function decryptString($data, $key = false) 
		{
			if(!$data) 
			{
				return '';
			}

			$key = ($key === false) ? self::KEY : $key;
			$data = base64_decode($data);
			$key = hash('sha256', $key, true);
	        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	        $iv = substr($data, 0, $iv_size);
	        $data = substr($data, $iv_size);
	        $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, $iv);
	        $decrypted = rtrim($decrypted, chr(0));

	        return $decrypted;
		}

		public function CPYString($str = NULL)
		{
			if(empty($str)) 
			{
				return false;
			}

			$str = trim($str);

			$trans = array(
				'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 
				'Е' => 'E', 'Ё' => 'Jo', 'Ж' => 'Zh', 'З' => 'Z', 'И' => 'I', 
				'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 
				'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 
				'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C', 'Ч' => 'Ch', 
				'Ш' => 'Sh', 'Щ' => 'Shh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 
				'Э' => 'Je', 'Ю' => 'Ju', 'Я' => 'Ja',

				'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 
				'е' => 'e', 'ё' => 'jo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 
				'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 
				'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 
				'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 
				'ш' => 'sh', 'щ' => 'shh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 
				'э' => 'je', 'ю' => 'ju', 'я' => 'ja'
			);
			
    		$url = strtr($str, $trans);    						// Заменяем кириллицу согласно массиву замены
    		$url = mb_strtolower($url);	      					// В нижний регистр
	
			$url = preg_replace("/[,-]/ui", " ", $url);         // Заменяем на пробелы
    		$url = preg_replace("/[^a-z0-9- ,]/ui", "", $url);  // Удаляем лишние символы
    		$url = preg_replace("/[ ]+/ui", "-", $url);  

    		return urlencode($url);
		}
	}