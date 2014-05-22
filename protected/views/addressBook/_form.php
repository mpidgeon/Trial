<!--Generated using Gimme CRUD freeware from www.HandsOnCoding.net -->

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'client-account-create-form',
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
	
    <div class="row">
        <?php echo $form->labelEx($model,'userid'); ?>
        <?php echo $form->textField($model,'userid'); ?>
        <?php echo $form->error($model,'userid'); ?>
    </div>
	
	
    <div class="row">
        <?php echo $form->labelEx($model,'tag'); ?>
        <?php echo $form->textField($model,'tag'); ?>
        <?php echo $form->error($model,'tag'); ?>
    </div>
	
	
    <div class="row">
        <?php echo $form->labelEx($model,'address1'); ?>
        <?php echo $form->textField($model,'address1'); ?>
        <?php echo $form->error($model,'address1'); ?>
    </div>
	
	
    <div class="row">
        <?php echo $form->labelEx($model,'address2'); ?>
        <?php echo $form->textField($model,'address2'); ?>
        <?php echo $form->error($model,'address2'); ?>
    </div>
	
	
    <div class="row">
        <?php echo $form->labelEx($model,'city'); ?>
        <?php echo $form->textField($model,'city'); ?>
        <?php echo $form->error($model,'city'); ?>
    </div>
	
	
    <div class="row">
        <?php echo $form->labelEx($model,'region'); ?>
        <?php echo $form->textField($model,'region'); ?>
        <?php echo $form->error($model,'region'); ?>
    </div>
	
	
    <div class="row">
        <?php echo $form->labelEx($model,'zipcode'); ?>
        <?php echo $form->textField($model,'zipcode'); ?>
        <?php echo $form->error($model,'zipcode'); ?>
    </div>
	
	
    <div class="row">
        <?php echo $form->labelEx($model,'country'); ?>
        <?php echo $form->textField($model,'country'); ?>
        <?php echo $form->error($model,'country'); ?>
    </div>
	
    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form --> 
