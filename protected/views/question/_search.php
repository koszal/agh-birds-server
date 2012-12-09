<?php
/* @var $this QuestionController */
/* @var $model Question */
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
		<?php echo $form->label($model,'question'); ?>
		<?php echo $form->textField($model,'question',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer1'); ?>
		<?php echo $form->textField($model,'answer1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer2'); ?>
		<?php echo $form->textField($model,'answer2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer3'); ?>
		<?php echo $form->textField($model,'answer3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer4'); ?>
		<?php echo $form->textField($model,'answer4',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'users_answer'); ?>
		<?php echo $form->textField($model,'users_answer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quiz_id'); ?>
		<?php echo $form->textField($model,'quiz_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'media_id'); ?>
		<?php echo $form->textField($model,'media_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'correct_answer'); ?>
		<?php echo $form->textField($model,'correct_answer'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->