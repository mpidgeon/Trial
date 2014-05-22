<?php
/* @var $this TaxJurisdictionController */
/* @var $data TaxJurisdiction */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('userid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->userid),array('view','id'=>$data->userid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startdate')); ?>:</b>
	<?php echo CHtml::encode($data->startdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enddate')); ?>:</b>
	<?php echo CHtml::encode($data->enddate); ?>
	<br />


</div>