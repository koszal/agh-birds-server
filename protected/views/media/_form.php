<?php
/* @var $this MediaController */
/* @var $model Media */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'media-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'filename'); ?>
		<?php echo $form->textField($model,'filename',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'filename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mime_type'); ?>
		<?php echo $form->textField($model,'mime_type',array('size'=>60,'maxlength'=>63)); ?>
		<?php echo $form->error($model,'mime_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_at'); ?>
		<?php echo $form->textField($model,'modified_at'); ?>
		<?php echo $form->error($model,'modified_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resource_type'); ?>
		<?php echo $form->textField($model,'resource_type',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'resource_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bird_id'); ?>
		<?php echo $form->textField($model,'bird_id'); ?>
		<?php echo $form->error($model,'bird_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->