<!--Generated using Gimme CRUD freeware from www.HandsOnCoding.net -->
<?php
$this->breadcrumbs=array(
	'addressbooks'=>array('index'),
	'View',
);

$this->menu=array(
	array('label'=>'List addressbook', 'url'=>array('index')),
	array('label'=>'Create addressbook', 'url'=>array('create')),
	array('label'=>'Update addressbook', 'url'=>array('update', 'userid'=>$model->userid, 'tag'=>$model->tag)),
	array('label'=>'Delete addressbook', 'url'=>'delete', 
	      'linkOptions'=>array('submit'=>array('delete',
	                                           'userid'=>$model->userid, 'tag'=>$model->tag),
									'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage addressbook', 'url'=>array('admin')),
);
?>

<h1>View addressbook</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'userid',
		'tag',
		'address1',
		'address2',
		'city',
		'region',
		'zipcode',
		'country',
	),
)); ?>
