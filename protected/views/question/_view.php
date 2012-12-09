<?php
/* @var $this QuestionController */
/* @var $model Question */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question')); ?>:</b>
	<?php echo CHtml::encode($data->question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer1')); ?>:</b>
	<?php echo CHtml::encode($data->answer1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer2')); ?>:</b>
	<?php echo CHtml::encode($data->answer2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer3')); ?>:</b>
	<?php echo CHtml::encode($data->answer3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer4')); ?>:</b>
	<?php echo CHtml::encode($data->answer4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correct')); ?>:</b>
	<?php echo CHtml::encode($data->correct); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('user_answer')); ?>:</b>
	<?php echo CHtml::encode($data->user_answer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_at')); ?>:</b>
	<?php echo CHtml::encode($data->modified_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deleted_at')); ?>:</b>
	<?php echo CHtml::encode($data->deleted_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quiz_id')); ?>:</b>
	<?php echo CHtml::encode($data->quiz_id); ?>
	<br />

	*/ ?>

</div>