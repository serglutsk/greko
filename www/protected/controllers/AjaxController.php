<?php
/**
 * Created by PhpStorm.
 * User: Юзер
 * Date: 13.07.14
 * Time: 14:49
 */
class Ajax extends CController
{

    public function filters() {
        return array(
            'ajaxOnly + index',
        );
    }
    public function actionIndex(){
var_dump(456);die();
if('i'=='i'){
    $hhjhjh=5;
}
        if(Yii::app()->request->isAjaxRequest){

            $month = Yii::app()->request->getPost('m');
            $month2 = Yii::app()->request->getPost('m2');
            $year = Yii::app()->request->getPost('y');
            $days = Yii::app()->request->getPost('d');
            $start=$year.'-'.$month.'-'.$days[0];
var_dump(123);die();



            Yii::app()->end();



    }
}
}