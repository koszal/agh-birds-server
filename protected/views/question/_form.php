<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'question'); ?>
		<?php echo $form->textField($model,'question',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'question'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer1'); ?>
		<?php echo $form->textField($model,'answer1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'answer1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer2'); ?>
		<?php echo $form->textField($model,'answer2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'answer2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer3'); ?>
		<?php echo $form->textField($model,'answer3',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'answer3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer4'); ?>
		<?php echo $form->textField($model,'answer4',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'answer4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'users_answer'); ?>
		<?php echo $form->textField($model,'users_answer'); ?>
		<?php echo $form->error($model,'users_answer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quiz_id'); ?>
		<?php echo $form->textField($model,'quiz_id'); ?>
		<?php echo $form->error($model,'quiz_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media_id'); ?>
		<?php echo $form->textField($model,'media_id'); ?>
		<?php echo $form->error($model,'media_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correct_answer'); ?>
		<?php echo $form->textField($model,'correct_answer'); ?>
		<?php echo $form->error($model,'correct_answer'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->