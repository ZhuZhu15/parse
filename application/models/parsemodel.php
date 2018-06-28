<?php

class Parsemodel extends CI_Model {

    public function isSunday($date) {
        return (date('N', strtotime($date)) == 7);
    }

    public function isMonday($date) {
        return (date('N', strtotime($date)) == 1);
    }

    public function get_content() {
    $url = $this->parsemodel->chooseDateUrl();    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36');curl_setopt($curl, CURLOPT_URL, $url); // отправляем на
    curl_setopt($curl, CURLOPT_HEADER, 0); // пустые заголовки
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // возвратить то что вернул сервер
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30); // таймаут4
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // отключаем проверку сертификата
    $result = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($result, true);
    return $result;
    }
    
    public function chooseUrl($year,$month,$day){
        $url = "https://www.cbr-xml-daily.ru/archive/". $year ."/". $month. "/". $day ."/daily_json.js";
        return $url;
    }
    
    public function chooseDateUrl(){
    $date = date('Y-m-d');
	if (isset($_POST['date']))
	{
		$date = $_POST['date'];	
		}
        $sunday = $this->parsemodel->isSunday($date);
        $monday = $this->parsemodel->isMonday($date);
		if ($sunday == true) {
			$date = date('Y-m-d', strtotime($date.'-1 DAY'));
        }
        if ($monday == true) {
			$date = date('Y-m-d', strtotime($date.'-2 DAY'));
        }
        $year = date('Y', strtotime($date));
		$month = date('m', strtotime($date));
        $day = date('d', strtotime($date));
        $url = $this->parsemodel->chooseUrl($year,$month,$day);
        return $url;
    }
   


}

?>