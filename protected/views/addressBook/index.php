<!--Generated using Gimme CRUD freeware from www.HandsOnCoding.net -->
<?php
$this->breadcrumbs=array(
	'addressbooks',
);

$this->menu=array(
	array('label'=>'Create addressbook', 'url'=>array('create')),
	array('label'=>'Manage addressbook', 'url'=>array('admin')),
);
?>

<h1>addressbooks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
