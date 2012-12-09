<?php
/* @var $this ApiUserController */
/* @var $model ApiUser */

$this->breadcrumbs=array(
	'Api Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ApiUser', 'url'=>array('index')),
	array('label'=>'Manage ApiUser', 'url'=>array('admin')),
);
?>

<h1>Create ApiUser</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>