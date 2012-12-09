<?php
/* @var $this BirdController */
/* @var $model Bird */

$this->breadcrumbs=array(
	'Birds'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Bird', 'url'=>array('index')),
	array('label'=>'Create Bird', 'url'=>array('create')),
	array('label'=>'Update Bird', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Bird', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bird', 'url'=>array('admin')),
);
?>

<h1>View Bird #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'latin_name',
		'description',
		'order',
		'family',
		'genus',
		'species',
		'created_at',
		'modified_at',
	),
)); ?>
