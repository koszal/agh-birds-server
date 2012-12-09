<?php
/* @var $this ApiRequestsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Api Requests',
);

$this->menu=array(
	array('label'=>'Create ApiRequests', 'url'=>array('create')),
	array('label'=>'Manage ApiRequests', 'url'=>array('admin')),
);
?>

<h1>Api Requests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
