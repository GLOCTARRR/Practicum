<?php

namespace app\models;
use yii\web\UploadedFile;
use yii\base\Model;
use app\components\HtmlValidator;

class MessageForm extends Model
{
	public $name;
	public $email;
	public $homepage;
	public $text;
	public $verifyCode;
	public $captcha;
	public $file;
	public $image;
	
	
	
	public function rules()
	{
		return [
			['name', 'required', 'message' => 'Введите ваше имя'], 
			['email', 'required', 'message' => 'Введите ваш email'],
			['email', 'email', 'message' => 'Некорректный email'],
			//проверка текста на запрещенные тэги и наличие закрывающих тэгов
			['text', HtmlValidator::className()],
			['homepage', 'url', 'message' => 'Некорректный адрес сайта'],
			['captcha', 'required'],
			['captcha', 'captcha'],
			[['image'], 'image', 'extensions' => ['jpg','png'], 'message' => 'Недопустимый  формат'],
			[['file'], 'file', 'extensions' =>['txt'], 'maxSize' => 1024],			
		];
	}
	
}

?>