
<?php
ini_set('display_errors', 'On'); // сообщения с ошибками будут показываться
error_reporting(E_ALL); // E_ALL - отображаем ВСЕ ошибки
header('Content-Type: text/html; charset=utf-8');
// Куда отправлять сообщения
$email1 = 'banker99@yandex.ru';
$email2 = 'beherit1977@gmail.com';
$email3 = 'burma2000@mail.ru';

// Тема сообщения
$emailTheme = 'Заявка на подключение';
//Админская почта
$siteEmail = "burmistrov@grainholding.ru"

?>
<?php
// Проверяем была ли отправлена форма
if(isset($_POST['submit'])) {
        // Переменная, в которую будем собирать текст нашего сообщения
        $message = 'Была отправлена заявка!<br />';
        //Поле Организация
        $org = isset($_POST['org']) ? $_POST['org'] : '';
        $message .= 'Организация: ' . htmlspecialchars($org) . '<br />';
          // Поле для отдела
        $fio = isset($_POST['fio']) ? $_POST['fio'] : '';
        $message .= 'ФИО: ' . htmlspecialchars($fio) . '<br />';
		// Поле для отдела
        $otd = isset($_POST['otd']) ? $_POST['otd'] : '';
        $message .= 'Отдел: ' . htmlspecialchars($otd) . '<br />';
        // Поле для email
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $message .= 'Почта: ' . htmlspecialchars($email) . '<br />';
         // Поле для Информации админам
        $info = isset($_POST['info']) ? $_POST['info'] : '';
        $message .= 'Информация: ' . htmlspecialchars($info) . '<br />';
         // Чекбоксы
				 $check = isset($_POST['check']) ? $_POST['check'] : '';
				 if (!empty($check))
	{
		foreach ($check as $go)
		{
			$message .= 'Базы данных 1С: ' . htmlspecialchars($go) . '<br />';
		}
	}
		 
		 $nameuppphk = isset($_POST['nameuppphk']) ? $_POST['nameuppphk'] : '';
		 if (!empty($nameuppphk))
			 $message .= 'Фамилия примера для базы УПП_ПХK(Подольск): ' . htmlspecialchars($nameuppphk) . '<br />';
		 $nameuspphk = isset($_POST['nameuspphk']) ? $_POST['nameuspphk'] : '';
		 if (!empty($nameuspphk))
        $message .= 'Фамилия примера для базы УСП_ПХK(Подольск): ' . htmlspecialchars($nameuspphk) . '<br />';
		 $td = isset($_POST['td']) ? $_POST['td'] : '';
		 if (!empty($td))
        $message .= 'Фамилия примера для базы Торговый дом(Подольск): ' . htmlspecialchars($td) . '<br />';
		 $pz = isset($_POST['pz']) ? $_POST['pz'] : '';
		 if (!empty($pz))
        $message .= 'Фамилия примера для базы PZ(Подольск): ' . htmlspecialchars($pz) . '<br />';
		 $bars = isset($_POST['bars']) ? $_POST['bars'] : '';
		 if (!empty($bars))
        $message .= 'Фамилия примера для базы БАРС(Подольск): ' . htmlspecialchars($bars) . '<br />';
		$upprhleb = isset($_POST['upprhleb']) ? $_POST['upprhleb'] : '';
		if (!empty($upprhleb))
        $message .= 'Фамилия примера для базы УПП_РХЛЕБ(Рязань): ' . htmlspecialchars($upprhleb) . '<br />';
		$usprhleb = isset($_POST['usprhleb']) ? $_POST['usprhleb'] : '';
		if (!empty($usprhleb))
        $message .= 'Фамилия примера для базы УСП_РХЛЕБ(Рязань): ' . htmlspecialchars($usprhleb) . '<br />';
		 $upprzp = isset($_POST['upprzp']) ? $_POST['upprzp'] : '';
		 if (!empty($upprzp))
        $message .= 'Фамилия примера для базы УПП_РЗП(Рязань): ' . htmlspecialchars($upprzp) . '<br />';
		$upprh = isset($_POST['upprh']) ? $_POST['upprh'] : '';
		if (!empty($upprh))
        $message .= 'Фамилия примера для базы УПП_РХ(Кострома): ' . htmlspecialchars($upprh) . '<br />';
		$usprh = isset($_POST['usprh']) ? $_POST['usprh'] : '';
		if (!empty($usprh))
        $message .= 'Фамилия примера для базы УСП_РХ(Кострома): ' . htmlspecialchars($usprh) . '<br />';
    
					
					$org_select = $_POST["org"];
				switch ($org_select) {
					case "Грейнхолдинг":
					$emailAddress = $email1;
					break;
					case "Подольский хлебокомбинат":
					$emailAddress = $email2;
					break;
					case "РязаньХлеб":
					$emailAddress = $email3;
					break;
					case "Рязаньзернопродукт":
					$emailAddress = $email4;
					break;
					case "Руский хлеб(Кострома)":
					$emailAddress = $email5;
					break;
					
			
			}

		
		// Отправляем письмо
        $headers = array(
                'MIME-Version: 1.0',
                'From: ' . $siteEmail,
                'Reply-To: ' . $siteEmail,
                'Content-Type: text/html; charset=utf-8'
        );
        if(mail($emailAddress, $emailTheme, $message, implode("\r\n", $headers)))
                $message .= '<br />Ваша заявка принята';
        else
                $message .= '<br />Ваша заявка не принятя. Позвоните в IT отдел';
        // А также покажем на странице введённые данные и результат отправки письма
        echo($message);
}
  header('Refresh: 3; URL=/index.html');
  echo 'Вы будете перенаправлены автоматически в течение трех секунд';
  exit;
?>




