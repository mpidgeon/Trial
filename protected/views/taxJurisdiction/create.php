<?php
/* @var $this TaxJurisdictionController */
/* @var $model TaxJurisdiction */
?>

<?php
$this->breadcrumbs=array(
	'Tax Jurisdictions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TaxJurisdiction', 'url'=>array('index')),
	array('label'=>'Manage TaxJurisdiction', 'url'=>array('admin')),
);
?>

<h1>Create TaxJurisdiction</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>