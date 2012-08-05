<?php
/* @var $this BirdController */
/* @var $model Bird */

$this->breadcrumbs=array(
	'Birds'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bird', 'url'=>array('index')),
	array('label'=>'Create Bird', 'url'=>array('create')),
	array('label'=>'View Bird', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Bird', 'url'=>array('admin')),
);
?>

<h1>Update Bird <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>