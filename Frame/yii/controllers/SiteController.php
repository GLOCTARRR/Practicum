<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Session;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\MessageForm;
use app\models\Guests;
use yii\helpers\Html;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\helpers\Inflector;
use yii\helpers\Transliterator;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use yii\helpers\Json;

class SiteController extends Controller
{
	
	
	
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
			'image-upload' => [
           'class' => 'vova07\imperavi\actions\UploadAction',
           'url' => '/images/blog/', // Directory URL address, where files are stored.
           'path' => '@webroot/images/blog/' // Or absolute path to directory where files are stored.
			],
			'images-get' => [
           'class' => 'vova07\imperavi\actions\GetAction',
           'url' => '/images/blog/', // Directory URL address, where files are stored.
           'path' => '@webroot/images/blog/', // Or absolute path to directory where files are stored.
           'type' => '0',
       ],
'files-get' => [
           'class' => 'vova07\imperavi\actions\GetAction',
           'url' => '/files/blog/', // Directory URL address, where files are stored.
           'path' => '@webroot/files/blog/', // Or absolute path to directory where files are stored.
           'type' => '1',//GetAction::TYPE_FILES,
       ],
'file-upload' => [
           'class' => 'vova07\imperavi\actions\UploadAction',
           'url' => '/files/blog/', // Directory URL address, where files are stored.
           'path' => '@webroot/files/blog/' // Or absolute path to directory where files are stored.
       ],
        ];
    }

    public function actionIndex()
    {	
	
		$dataProvider = new ActiveDataProvider([
			'query' => Guests::find(),
			'pagination' => [
					'pagesize' => 25,
				],
			'sort' => [
				'defaultOrder' => [
					'user_name' => SORT_DESC,
					'email' => SORT_DESC,
				],
                'attributes' => [
                    'id' => [
						'asc' => ['id'=> SORT_ASC],
						'desc' => ['id' => SORT_DESC],
					],
                    'user_name' => [
						'asc' => ['user_name' => SORT_ASC,],
						'desc' => ['user_name' => SORT_DESC],
					],
                    'email' => [
                        'asc' => ['email' => SORT_ASC,],
                        'desc' => ['email' => SORT_DESC,],
                    ],
                ],
            ],
			
		]);
		
		//добавление записи
		$model = new MessageForm();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			//Если сообщение добавлено
			Yii::$app->session->setFlash('success', 'Ваше сообщение добавлено');
			
			$guest = new Guests();
			$image = UploadedFile::getInstance($model, 'image');
			if(!empty($image)){
				$image = UploadedFile::getInstance($model, 'image');	
				$dir = Yii::getAlias('@app/uploads/');
				$imageName = $model->name . time() . '.' . $image->extension;
				$image->saveAs(Yii::getAlias('@app/uploads/') . $imageName);
				$guest->image =  $imageName;
				//меняем размер
				$imagineObj = Image::getImagine();
				$imageObj = $imagineObj->open(Yii::getAlias('@app/uploads/') . $imageName);
				if($imageObj->getSize()->getWidth() > 320 || $imageObj->getSize()->getHeight() > 240){
                    $imageObj->thumbnail(new Box(320, 240))->save(Yii::getAlias('@app/uploads/') . $imageName, ['quality' => 90]);
				}
			} 
			$file = UploadedFile::getInstance($model, 'file');
			if(!empty($file)){
				$file = UploadedFile::getInstance($model, 'file');			
				$dir = Yii::getAlias('@app/uploads/');
				$fileName = $model->name . time() . '.' . $file->extension;
				$file->saveAs(Yii::getAlias('@app/uploads/') . $fileName);
				$guest->file =  $fileName;
			}
			//запись данных в БД	
			$guest->user_name = Html::encode($model->name);
			$guest->email = Html::encode($model->email);
			$guest->homepage = Html::encode($model->homepage);
			$guest->text = Html::encode($model->text);
			$guest->guest_ip = Yii::$app->request->userIP;
			$guest->guest_browser = $this->userBrowser();
			$guest->save();
		}  
		
		return $this->render('index', [
			'dataProvider' => $dataProvider,
		]);
				
    }
	
	public function actionAddmessage(){
		
		$model = new MessageForm();
		
		return $this->render('addmessage', [
			'model' => $model,
			'success' => true,
			'error' => false
		]);		
	} 
	
	public function actionPreview($id){
		//Предпросмотр сообщения
			$guests =  Guests::findOne($id);
			echo Json::encode($guests);		
	} 
	
	public function actionDownload($name)
	{
		
		if ($name !== NULL) {
            // некоторая логика по обработке пути из url в путь до файла на сервере
            $currentFile = Yii::$app->basePath . '\uploads\\' .  $name;

            if (is_file($currentFile)) {
                header("Content-Type: application/octet-stream");
                header("Accept-Ranges: bytes");
                header("Content-Length: " . filesize($currentFile));
                header("Content-Disposition: attachment; filename=" .$name);
                readfile($currentFile);
            };
        } else {
            $this->redirect('куда переправляем юзера в случае ошибки');
        };
	}
	
	public function filters() {
        return ['accessControl'];
    }
 
    public function accessRules() {
        return [['allow','actions'=>['captcha'],'users'=>['*'],],['deny','users'=>['*'],],];
    }
	
	public function userBrowser() {
		//получениеназвание браузера из user_agent
	preg_match("/(MSIE|Opera|Firefox|Chrome|Version|Opera Mini|Netscape|Konqueror|SeaMonkey|Camino|Minefield|Iceweasel|K-Meleon|Maxthon)(?:\/| )([0-9.]+)/", Yii::$app->request->headers->get('User-Agent'), $browser_info); // регулярное выражение, которое позволяет отпределить 90% браузеров
        list(,$browser,$version) = $browser_info; // получаем данные из массива в переменную
        if (preg_match("/Opera ([0-9.]+)/i", $agent, $opera)) return 'Opera '.$opera[1]; // определение _очень_старых_ версий Оперы (до 8.50), при желании можно убрать
        if ($browser == 'MSIE') { // если браузер определён как IE
                preg_match("/(Maxthon|Avant Browser|MyIE2)/i", $agent, $ie); // проверяем, не разработка ли это на основе IE
                if ($ie) return $ie[1].' based on IE '.$version; // если да, то возвращаем сообщение об этом
                return 'IE '.$version; // иначе просто возвращаем IE и номер версии
        }
        if ($browser == 'Firefox') { // если браузер определён как Firefox
                preg_match("/(Flock|Navigator|Epiphany)\/([0-9.]+)/", $agent, $ff); // проверяем, не разработка ли это на основе Firefox
                if ($ff) return $ff[1].' '.$ff[2]; // если да, то выводим номер и версию
        }
        if ($browser == 'Opera' && $version == '9.80') return 'Opera '.substr($agent,-5); // если браузер определён как Opera 9.80, берём версию Оперы из конца строки
        if ($browser == 'Version') return 'Safari '.$version; // определяем Сафари
        if (!$browser && strpos($agent, 'Gecko')) return 'Browser based on Gecko'; // для неопознанных браузеров проверяем, если они на движке Gecko, и возращаем сообщение об этом
        return $browser.' '.$version; // для всех остальных возвращаем браузер и версию
	}
	
	
}
 
   

    

