<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstname')); ?>:</b>
	<?php echo CHtml::encode($data->firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateofbirth')); ?>:</b>
	<?php echo CHtml::encode($data->dateofbirth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('company')); ?>:</b>
	<?php echo CHtml::encode($data->company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primaryAddressTag')); ?>:</b>
	<?php echo CHtml::encode($data->primaryAddressTag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phonenumber')); ?>:</b>
	<?php echo CHtml::encode($data->phonenumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobilenumber')); ?>:</b>
	<?php echo CHtml::encode($data->mobilenumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activkey')); ?>:</b>
	<?php echo CHtml::encode($data->activkey); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_at')); ?>:</b>
	<?php echo CHtml::encode($data->create_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastvisit_at')); ?>:</b>
	<?php echo CHtml::encode($data->lastvisit_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>