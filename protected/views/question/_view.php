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

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_answer')); ?>:</b>
	<?php echo CHtml::encode($data->users_answer); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('quiz_id')); ?>:</b>
	<?php echo CHtml::encode($data->quiz_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_id')); ?>:</b>
	<?php echo CHtml::encode($data->media_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correct_answer')); ?>:</b>
	<?php echo CHtml::encode($data->correct_answer); ?>
	<br />

	*/ ?>

</div>