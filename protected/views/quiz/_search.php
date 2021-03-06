<?php
/* @var $this QuizController */
/* @var $model Quiz */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'api_user_key'); ?>
		<?php echo $form->textField($model,'api_user_key',array('size'=>31,'maxlength'=>31)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_limit'); ?>
		<?php echo $form->textField($model,'time_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->