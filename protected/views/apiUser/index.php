<?php
/* @var $this ApiUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Api Users',
);

$this->menu=array(
	array('label'=>'Create ApiUser', 'url'=>array('create')),
	array('label'=>'Manage ApiUser', 'url'=>array('admin')),
);
?>

<h1>Api Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
