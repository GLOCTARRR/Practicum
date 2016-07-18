<?php namespace app\components;

use yii\validators\Validator;
use app\models\MessageForm;

class HtmlValidator extends Validator
{
    public function init()
    {
        parent::init();
        $this->message = 'Html тэги не закрыты или не допустимы.';
    }

    public function validateAttribute($model, $attribute)
    {
		//проверяем допустимые тэги
		$patternOne = '/<(?!\/*code|\/*p|\/*i|\/*strike|\/*strong|\/*a\shref=\".*\"\stitle=\".*\")(.*)>/';
		$patternTwo = '/<(.*)>/';
		$patternThree = '/(<(.*)>.*<\/\1>)*/';
        $value = $model->$attribute;
		if(preg_match($patternOne, $value)){        
            $model->addError($attribute, $this->message);
		} else{
			if(preg_match($patternTwo, $value)){
				if(!preg_match($patternThree, $value))
					$model->addError($attribute, $this->message);
			}
		}
    }

    public function clientValidateAttribute($model, $attribute, $view)
    {
		//проверяем допустимые тэги  на клиенте
		$val = json_encode($model->$attribute, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $message = json_encode($this->message, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
       return <<<JS
	   if(/<(?!\/*code|\/*p|\/*i|\/*strike|\/*strong|\/*a\shref=\".*\"\stitle=\".*\")(.*)>/.test(value)){
		messages.push($message);
	   } else {
		   if(/<(.*)>/g.test(value)){
				if(!/<(.*)>.*<\/\\1>/g.test(value)){
					messages.push($message);	
				}	
			}				
	   }
JS;
    }
}
?>