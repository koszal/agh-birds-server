<?php
/* @var $this ApiUserController */
/* @var $model ApiUser */

$this->breadcrumbs=array(
	'Api Users'=>array('index'),
	$model->key=>array('view','id'=>$model->key),
	'Update',
);

$this->menu=array(
	array('label'=>'List ApiUser', 'url'=>array('index')),
	array('label'=>'Create ApiUser', 'url'=>array('create')),
	array('label'=>'View ApiUser', 'url'=>array('view', 'id'=>$model->key)),
	array('label'=>'Manage ApiUser', 'url'=>array('admin')),
);
?>

<h1>Update ApiUser <?php echo $model->key; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>