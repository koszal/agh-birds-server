<?php
/* @var $this ApiRequestsController */
/* @var $model ApiRequests */

$this->breadcrumbs=array(
	'Api Requests'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ApiRequests', 'url'=>array('index')),
	array('label'=>'Create ApiRequests', 'url'=>array('create')),
	array('label'=>'View ApiRequests', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ApiRequests', 'url'=>array('admin')),
);
?>

<h1>Update ApiRequests <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>