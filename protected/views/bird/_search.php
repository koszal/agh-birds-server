<?php
/* @var $this BirdController */
/* @var $model Bird */
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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'latin_name'); ?>
		<?php echo $form->textField($model,'latin_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order'); ?>
		<?php echo $form->textField($model,'order',array('size'=>60,'maxlength'=>127)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'family'); ?>
		<?php echo $form->textField($model,'family',array('size'=>60,'maxlength'=>127)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'genus'); ?>
		<?php echo $form->textField($model,'genus',array('size'=>60,'maxlength'=>127)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'species'); ?>
		<?php echo $form->textField($model,'species',array('size'=>60,'maxlength'=>127)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified_at'); ?>
		<?php echo $form->textField($model,'modified_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->