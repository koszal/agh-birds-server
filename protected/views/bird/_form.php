<?php
/* @var $this BirdController */
/* @var $model Bird */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bird-form',
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
		<?php echo $form->labelEx($model,'latin_name'); ?>
		<?php echo $form->textField($model,'latin_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'latin_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order'); ?>
		<?php echo $form->textField($model,'order',array('size'=>60,'maxlength'=>127)); ?>
		<?php echo $form->error($model,'order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'family'); ?>
		<?php echo $form->textField($model,'family',array('size'=>60,'maxlength'=>127)); ?>
		<?php echo $form->error($model,'family'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'genus'); ?>
		<?php echo $form->textField($model,'genus',array('size'=>60,'maxlength'=>127)); ?>
		<?php echo $form->error($model,'genus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'species'); ?>
		<?php echo $form->textField($model,'species',array('size'=>60,'maxlength'=>127)); ?>
		<?php echo $form->error($model,'species'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->