<?php
/* @var $this TaxJurisdictionController */
/* @var $model TaxJurisdiction */
?>

<?php
$this->breadcrumbs=array(
	'Tax Jurisdictions'=>array('index'),
	$model->userid=>array('view','id'=>$model->userid),
	'Update',
);

$this->menu=array(
	array('label'=>'List TaxJurisdiction', 'url'=>array('index')),
	array('label'=>'Create TaxJurisdiction', 'url'=>array('create')),
	array('label'=>'View TaxJurisdiction', 'url'=>array('view', 'id'=>$model->userid)),
	array('label'=>'Manage TaxJurisdiction', 'url'=>array('admin')),
);
?>

    <h1>Update TaxJurisdiction <?php echo $model->userid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>