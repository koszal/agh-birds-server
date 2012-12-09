<?php
/* @var $this ApiRequestsController */
/* @var $model ApiRequests */

$this->breadcrumbs=array(
	'Api Requests'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ApiRequests', 'url'=>array('index')),
	array('label'=>'Create ApiRequests', 'url'=>array('create')),
	array('label'=>'Update ApiRequests', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ApiRequests', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ApiRequests', 'url'=>array('admin')),
);
?>

<h1>View ApiRequests #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'created_at',
		'url',
		'api_user_key',
	),
)); ?>
