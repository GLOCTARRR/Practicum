<?php
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\models\MessageForm;
use yii\web\Session;
use yii\web\View; 
use yii\helpers\URL;


$this->head();
$this->title = "Guest book";

$this->registerMetaTag([
	'name' => 'description',
	'content' => 'Guest book'
]);
$this->registerMetaTag([
	'name' => 'keywords',
	'content' => 'Guest book'
])

?>

	<?php
	//Модальное окно добавления сообщения
		Modal::begin([
			'header' => '<h2>Оставте сообщение</h2>',
			'id' => 'message',
			'toggleButton' => [
				'label' => 'Оставить сообщение',
				'tag' => 'button',
				'class' => 'btn btn-danger',
			],
			'footer' => 'Низ окна',
		]); 
		$model = new MessageForm();
		echo $this->context->renderPartial('/site/addmessage', [
			'model' => $model,
		]);		
		Modal::end();
	?>
	
	
	<?php
	//модальное окно предпросомтра
		Modal::begin([
			'header' => 'Сообщение',
			'id' => 'modal',
			'size' => 'modal-md',       
		]);
		$model = new MessageForm();
	?>
	<div id='modal-content'></div>
	<?php Modal::end(); ?>
	
	
	
	<?php
	//Вывод уведомления "Сообщение добавлено"
	if(Yii::$app->session->hasFlash('success')):?>
	<div class="info" style="display:none;">
	<?php  echo Yii::$app->session->getFlash('success'); ?>
	</div>
	<?php
		$this->registerJs(
        '$(".info").animate({height: "show"}, 1000).fadeOut("slow");',
		View::POS_END,
		'myShowHideEffect'
		);
	?>
    <?php endif; ?>

	<?= GridView::widget([
    'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
    'columns' => [
        'id',
		[
            'attribute'=>'user_name',
            'value'=>'user_name',
            'contentOptions' => ['style'=>'max-width: 100px; min-width: 1000px; word-wrap:break-word;'],
        ],
		[
            'attribute'=>'email',
            'value'=>'email',
            'contentOptions' => ['style'=>'max-width: 100px; min-width: 100px; word-wrap:break-word;'],
        ],
		[
            'attribute'=>'homepage',
            'value'=>'homepage',
            'contentOptions' => ['style'=>'max-width: 100px; min-width: 100px; word-wrap:break-word;'],
        ],
		[
            'attribute'=>'text',
            'value'=>function($data){
				return Html::decode($data->text);
			
			},
			'format'=>'html',
            'contentOptions' => ['style'=>'max-width: 300px; min-width: 300px; word-wrap:break-word;'],
        ],
		[
			//кнопка для предпросомтра
            'class' => 'yii\grid\ActionColumn',
            'header'=>'View', 
            'template' => '{view}',
			'buttons' => [
                'view' => function ($url,$model) {
					
                    return Html::button('',[ 'class' => 'glyphicon glyphicon-eye-open', 'onclick' => '(function ( $event ) { $.get("index.php?r=site/preview", {id :'. $model->id .'}, function(data){ var data = $.parseJSON(data);$("#modal").find("#modal-content").html(data.text).text(); $("#modal").modal("show");})})();' ]);
                }
            ],
			'contentOptions' => ['style'=>'max-width: 20px; min-width: 20px; word-wrap:break-word;'],
        ],
		[
			'label'=>'Image',
			'format'=>'raw',
			'value' => function($data){
				if(!empty($data->image))				
					return Html::a(Html::img('http://yii/uploads/' . $data->image, ['style' => 'width:150px;']) ,$url = null, $options = ['alt'=>'yii2 - картинка в gridview', 'style' => 'width:150px;','href' => 'http://yii/uploads/' . $data->image, 'data-lightbox'=>'image-1', 'rel' => 'lightbox[roadtrip]']);
				return '';
			},	
		],	
		[
			'label'=>'file',
			'format'=>'raw',
			'value' => function($data){
					if(!empty($data->file))				
						return Html::a('download', $url = 'http://yii/web/index.php?r=site%2Fdownload&name=' . $data->file);
					return '';	
			},
			'contentOptions' => ['style'=>'max-width: 100px; min-width: 100px; word-wrap:break-word;'],	
		],
		'guest_ip',
		'guest_browser',
		
    ],
]); ?>
