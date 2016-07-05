<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use vova07\imperavi\Widget;

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

<div id="addmessage">
	<h2>Оставте сообщение</h2>
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'style'=>'max-width: 300px'], ]); ?>
	<table>
		<tr>
			<td>Имя пользователя</td>
			<td><?=$form->field($model, 'name')->label('Имя пользователя');?></td>			
		</tr>
		<tr>
			<td>email</td>
			<td><?=$form->field($model, 'email')->textInput(['style'=> 'max-width: 150px; min-width: 150px; word-wrap:break-word;']);?></td>			
		</tr>
		<tr>
			<td>домашняя страница</td>
			<td><?=$form->field($model, 'homepage')->label('');?></td>			
		</tr>
		<tr>
			<td>сообщение</td>
			 <td><?php echo $form->field($model, 'text')->widget(Widget::className(), [
   'settings' => [
		'lang' => 'ru',
		'minHeight' => 100,
		'pastePlainText' => true,
		'paragraphize' => true,
		'replaceTags' => [
			['del', 'strike'],	
			['b', 'strong'],
			['em', 'i'],
			['pre', 'code']
		],
		'buttons'=>['html', 'formatting',  'bold', 'italic', 'deleted', 'link'],	
		'formatting'=> ['pre'],	
	],	
		   
       
   ]);?></td>			
		</tr>
		<tr>
			<td>Добавить картинку:</td>
			<td>
				
				<?= $form->field($model, 'image')->fileInput()?>
			</td>
		</tr>
		
		<tr>
			<td>Добавить '.txt' файл:</td>
			<td>
				
				<?= $form->field($model, 'file')->fileInput()?>
			</td>
		</tr>
		
		<tr>
			<td><?= $form->field($model, 'captcha')->widget(Captcha::className()) ?></td>
		</tr>
		<tr>
				<td colspan="2">
					<input type="hidden" name="func" value="index" />
					<table class="button_subscribe">
						<tr>
							<td class="center">
								<?= Html::submitButton('Отправить', ['class' => 'bg_center'])?>
							</td>
						</tr>
					</table>
				</td>
		</tr>
	</table>
	
	<?php ActiveForm::end(); ?>
</div>