<?php 



session_start();

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

require_once 'validator.php';

$validator = new Validator();



$validator->set_error_delimiters('<div class="error">', '</div>');

//Задаем правила валидации
$rules = array(
	array(
		'field' => 'user_name',
		'label' => 'Ваше имя',
		'rules' => array(
                        'trim' => '', //Обрезаем пробелы по бокам
                        'strip_tags' => '', // Удаляем HTML и PHP теги
                        'required' => 'Поле %s обязательно для заполнения'
					)
	),
	array(
		'field' => 'user_email',
		'label' => 'Ваш e-mail адрес',
		'rules' => array(
                        'trim' => '',
                        'required' => 'Поле %s обязательно для заполнения',
                        'valid_email' => 'Поле %s должно содержать правильный email-адрес'
					)
	),
	/*array(
		'field' => 'user_url',
		'label' => 'URL адрес сайта',
		'rules' => array(
                        'trim' => '',
                        'valid_url' => 'Поле %s должно содержать правильный URL адрес'
					)
	),*/
    array(
		'field' => 'subject',
		'label' => 'Тема письма',
		'rules' => array(
                        'trim' => '', //Обрезаем пробелы по бокам
                        'strip_tags' => '', // Удаляем HTML и PHP теги
                        'required' => 'Поле %s обязательно для заполнения'
					)
	),
    array(
		'field' => 'text',
		'label' => 'Текст сообщения',
		'rules' => array(
                        'trim' => '', //Обрезаем пробелы по бокам
                        'strip_tags' => '', // Удаляем HTML и PHP теги
                        'required' => 'Поле %s обязательно для заполнения'
					)
	),
    array(
		'field' => 'keystring',
		'label' => 'Капча',
		'rules' => array(
                        'trim' => '', //Обрезаем пробелы по бокам
                        'required' => 'Вы не ввели цифры изображенные на картинке',
    					'valid_captcha[keystring]' => 'Вы ввели неправильные цифры с картинки'
					)
	)
);

//Устанавливаем правила валидации
$validator->set_rules($rules);
$message = '';

//Запускаем валидацию POST данных
if($validator->run()){
	
	//Здесь впишите свой e-mail адрес
	//на негу будут приходить уведомления с формы
	$to = 'nasya.panika@yandex.ru';
 
	//$from = "=?UTF-8?b?" . base64_encode($validator->postdata('user_name')) . "?=";
    //$subject = "=?UTF-8?b?" . base64_encode( $validator->postdata('subject') ) . "?=";

    $from = $validator->postdata('user_name');
	$subject = $validator->postdata('subject');

	$mail_body = "Поступил новый ответ от формы обратной связи.\r\nАвтор оставил такие данные:\r\n";
	
	//Формируем текст сообщения
	foreach($rules as $rule){
		if($rule['field'] == 'keystring') continue;
		$mail_body .= $rule['label'].': '.$validator->postdata($rule['field'])."\r\n";

		if ($rule['label']=='Тема письма') $theme = $validator->postdata($rule['field']);
		if ($rule['label']=='Текст сообщения') $text = $validator->postdata($rule['field']);
	}


	$header = "MIME-Version: 1.0\n";
	$header .= "Content-Type: text/plain; charset=UTF-8\n";
    //$header = "Content-Type: text/plain;";
	$header .= "From: ". $from . " <" . $validator->postdata('user_email'). ">";

	//Отправка сообщения
	if(mail($to, $subject, $mail_body, $header)){


	    $validator->wright_to_db($from, $theme, $text, $validator->postdata('user_email'));
		
		$message = '<div class="error">Ваше сообщение успешно отправлено!</div>';
		
		//Очищаем форму обратной связи
		$validator->reset_postdata();
	}
	else{
		
		$message = '<div class="error">Ошибка, сообщение не отправлено!</div>';
	}
}
else{
	
    //Получаем сообщения об ошибках в виде строки
	$message = $validator->get_string_errors();
	
    //Получаем сообщения об ошибках в виде массива
	$errors = $validator->get_array_errors();

}


include('formTemplate.php');
?>


