<?php
 
/* https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */
 
//Переменная $name,$phone, $mail получает данные при помощи метода POST из формы
//$phone = $_POST['Phone'];
$phone = $_POST['new_phone'];
 
//в переменную $token нужно вставить токен, который нам прислал @botFather
$token = "968345227:AAG_Q79uDO1-7YUkURyVMvDv04BxlFZm_CQ";
 
//нужна вставить chat_id (Как получить chad id, читайте ниже)
$chat_id = "250896225";
 
//Далее создаем переменную, в которую помещаем PHP массив
//$arr = array(
 // 'Телефон: ' => $phone,
  //'Email' => $email
//);
 
//При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
//foreach($arr as $key => $value) {
 // $txt .= "<b>".$key."</b> ".$value."%0A";
//};
 
//Осуществляется отправка данных в переменной $sendToTelegram
$sendToTelegram = fopen("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$phone","");
 
//Если сообщение отправлено, напишет "Thank you", если нет - "Error"
if ($sendToTelegram) {
  echo "Спасибо, в скором времени я вам перезвоню";
} else {
  echo "Ошибка";
}
?>