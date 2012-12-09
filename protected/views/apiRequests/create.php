<?php
/* @var $this ApiRequestsController */
/* @var $model ApiRequests */

$this->breadcrumbs=array(
	'Api Requests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ApiRequests', 'url'=>array('index')),
	array('label'=>'Manage ApiRequests', 'url'=>array('admin')),
);
?>

<h1>Create ApiRequests</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>