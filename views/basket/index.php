<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Корзина';
?>
<div class="category-index">

	<h1>Корзина</h1>

	<?php foreach($basketProducts as $basketProduct): ?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success">
					<h2><?php echo $basketProduct->product->name; ?></h2>
					<div class="badge badge-inverse">Стоимость итого: <?php echo $basketProduct->product->price * $basketProduct->count; ?></div>
					<?php echo $basketProduct->product->description; ?>
					<div>Количество: <?php echo $basketProduct->count; ?></div>
                    <?= Html::a('Добавить', ['basket/add', 'id' => $basketProduct->id], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('Убрать', ['basket/remove', 'id' => $basketProduct->id], ['class' => 'btn btn-danger']) ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>




	<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

		<div class="alert alert-success">
			Thank you for contacting us. We will respond to you as soon as possible.
		</div>

		<p>
			Note that if you turn on the Yii debugger, you should be able
			to view the mail message on the mail panel of the debugger.
			<?php if (Yii::$app->mailer->useFileTransport): ?>
				Because the application is in development mode, the email is not sent but saved as
				a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
				                                                                                    Please configure the <code>useFileTransport</code> property of the <code>mail</code>
				application component to be false to enable email sending.
			<?php endif; ?>
		</p>

	<?php else: ?>

		<p>
			Создать заказ
		</p>

		<div class="row">
			<div class="col-lg-5">
				<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
				<?= $form->field($model, 'name') ?>
				<?= $form->field($model, 'email') ?>
				<?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
				<div class="form-group">
					<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
				</div>
				<?php ActiveForm::end(); ?>
			</div>
		</div>

	<?php endif; ?>

</div>
