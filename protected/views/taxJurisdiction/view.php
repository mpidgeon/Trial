<?php
/* @var $this TaxJurisdictionController */
/* @var $model TaxJurisdiction */
?>

<?php
$this->breadcrumbs=array(
	'Tax Jurisdictions'=>array('index'),
	$model->userid,
);

$this->menu=array(
	array('label'=>'List TaxJurisdiction', 'url'=>array('index')),
	array('label'=>'Create TaxJurisdiction', 'url'=>array('create')),
	array('label'=>'Update TaxJurisdiction', 'url'=>array('update', 'id'=>$model->userid)),
	array('label'=>'Delete TaxJurisdiction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->userid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TaxJurisdiction', 'url'=>array('admin')),
);
?>

<h1>View TaxJurisdiction #<?php echo $model->userid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'userid',
		'country',
		'startdate',
		'enddate',
	),
)); ?>