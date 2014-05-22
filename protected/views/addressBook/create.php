<!--Generated using Gimme CRUD freeware from www.HandsOnCoding.net -->
<?php
$this->breadcrumbs=array(
	'addressbooks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List addressbooks', 'url'=>array('index')),
    array('label'=>'Manage addressbook', 'url'=>array('admin')),
);
?>

<h1>Create addressbook</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
