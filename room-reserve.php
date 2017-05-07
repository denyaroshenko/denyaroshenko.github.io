<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'])) {$name = $_POST['name'];}
    if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
	$room =$_POST ['room']; // сохраняем данные из выпадающего списка
	$people_count = $_POST ['PeopleCount'];
    // if (isset($_POST['email'])) {$email = $_POST['email'];}
    if (isset($_POST['formData'])) {$formData = $_POST['formData'];}
 
    $to = "denyaroshenko@gmail.com"; /*Укажите адрес, га который должно приходить письмо*/
    $sendfrom   = "support@sitename.ru"; /*Укажите адрес, с которого будет приходить письмо, можно не настоящий, нужно для формирования заголовка письма*/
    $headers  = "From: " . strip_tags($sendfrom) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($sendfrom) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8 \r\n";
    $subject = "$formData";
    $message = "
		<h2>$formData</h2><br>
		<b>Имя:</b> $name<br>
		<b>Телефон:</b> $phone<br>
		$room<br>
		<b>Количество человек:</b> $people_count";
    $send = mail ($to, $subject, $message, $headers);
    if ($send == 'true')
    {
    echo '<center style="font-size: 16px; font-weight: 500;">
 
Спасибо за заявку!
 
</center>';
    }
    else
    {
    echo '<center style="font-size: 16px; font-weight: 500;>
 
<b>Ошибка. Сообщение не отправлено!</b>
 
</center>';
    }
} else {
    http_response_code(403);
    echo "Попробуйте еще раз";
}?>
