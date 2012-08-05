<?php
/* @var $this BirdController */
/* @var $model Bird */

$this->breadcrumbs=array(
	'Birds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bird', 'url'=>array('index')),
	array('label'=>'Manage Bird', 'url'=>array('admin')),
);
?>

<h1>Create Bird</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>