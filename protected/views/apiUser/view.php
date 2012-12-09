<?php
/* @var $this ApiUserController */
/* @var $model ApiUser */

$this->breadcrumbs=array(
	'Api Users'=>array('index'),
	$model->key,
);

$this->menu=array(
	array('label'=>'List ApiUser', 'url'=>array('index')),
	array('label'=>'Create ApiUser', 'url'=>array('create')),
	array('label'=>'Update ApiUser', 'url'=>array('update', 'id'=>$model->key)),
	array('label'=>'Delete ApiUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->key),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ApiUser', 'url'=>array('admin')),
);
?>

<h1>View ApiUser #<?php echo $model->key; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'key',
		'created_at',
		'modified_at',
	),
)); ?>
