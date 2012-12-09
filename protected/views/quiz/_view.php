<?php
/* @var $this QuizController */
/* @var $model Quiz */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('api_user_key')); ?>:</b>
	<?php echo CHtml::encode($data->api_user_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_limit')); ?>:</b>
	<?php echo CHtml::encode($data->time_limit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />


</div>