<!--Generated using Gimme CRUD freeware from www.HandsOnCoding.net -->
<?php
$this->breadcrumbs=array(
	'addressbooks'=>array('index'),
	'View'=>array('view', 'userid'=>$model->userid, 'tag'=>$model->tag),
	'Update',
);

$this->menu=array(
	array('label'=>'List addressbook', 'url'=>array('index')),
	array('label'=>'Create addressbook', 'url'=>array('create')),
	array('label'=>'View addressbook', 'url'=>array('view', 'userid'=>$model->userid, 'tag'=>$model->tag)),
	array('label'=>'Manage addressbook', 'url'=>array('admin')),
); 
?>

<h1>Update Client</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
