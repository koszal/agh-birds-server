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
		<?php echo $form->textField($model,'question',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer1'); ?>
		<?php echo $form->textField($model,'answer1',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer2'); ?>
		<?php echo $form->textField($model,'answer2',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer3'); ?>
		<?php echo $form->textField($model,'answer3',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer4'); ?>
		<?php echo $form->textField($model,'answer4',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'correct'); ?>
		<?php echo $form->textField($model,'correct'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_answer'); ?>
		<?php echo $form->textField($model,'user_answer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified_at'); ?>
		<?php echo $form->textField($model,'modified_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deleted_at'); ?>
		<?php echo $form->textField($model,'deleted_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quiz_id'); ?>
		<?php echo $form->textField($model,'quiz_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->