<?php
/* @var $this TaxJurisdictionController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Tax Jurisdictions',
);

$this->menu=array(
	array('label'=>'Create TaxJurisdiction','url'=>array('create')),
	array('label'=>'Manage TaxJurisdiction','url'=>array('admin')),
);
?>

<h1>Tax Jurisdictions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>