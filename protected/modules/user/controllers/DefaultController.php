<?php

class DefaultController extends Controller
{
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$role = User::getRole(Yii::app()->user->id);
		$user = Yii::app()->getModule('user')->user();
		
		if($role=='Administrator'){
			$dataProvider=new CActiveDataProvider('User', array(				
				'pagination'=>array(
					'pageSize'=>Yii::app()->controller->module->user_page_size,
				),
			));
		/* } else if($role=='Blogger') {	*/
		} else if($role!='Administrator') {		
			$dataProvider=new CActiveDataProvider('User', array(
				'criteria'=>array(
					'condition'=>'id='.Yii::app()->user->id,
				),				
				'pagination'=>array(
					'pageSize'=>Yii::app()->controller->module->user_page_size,
				),
			));		
		} else {
			$dataprovider=null;
		}

		$this->render('/user/index',array(
			'dataProvider'=>$dataProvider,
		));
	}

}