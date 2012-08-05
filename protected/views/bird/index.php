<?php
/* @var $this BirdController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Birds',
);

$this->menu=array(
	array('label'=>'Create Bird', 'url'=>array('create')),
	array('label'=>'Manage Bird', 'url'=>array('admin')),
);
?>

<h1>Birds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
