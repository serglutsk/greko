<?php
/**
 * Created by PhpStorm.
 * User: Юзер
 * Date: 13.07.14
 * Time: 14:49
 */
class Ajax extends CController
{

   
    public function actionIndex(){



        if(Yii::app()->request->isAjaxRequest){

            $month = Yii::app()->request->getPost('m');
            $month2 = Yii::app()->request->getPost('m2');
            $year = Yii::app()->request->getPost('y');
            $days = Yii::app()->request->getPost('d');
            $start=$year.'-'.$month.'-'.$days[0];


echo 12345;

echo 777;
            Yii::app()->end();



    }
}
}
