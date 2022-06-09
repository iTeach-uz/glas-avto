<?php

namespace restapi\controllers;

use restapi\controllers\SettingsController;
use restapi\models\Oyna;
use Yii;


class OynalarController extends SettingsController{


    public function actionIndex(){

        $oyna = Oyna::find()->one();

        if($oyna){
            return [
                'success' => true,
                'message' => "Oynalar Isshlab chiqarish",
                'data' => $oyna,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            ];
        }
    }



    


    public function actionDetail($id){

        if(Oyna::findOne($id)){

            $oyna = Oyna::find()->one();

            return [
                'glasses' => $oyna,
            ];

        }
        else{
            return [
                'glasses' => $oyna,
            ];
        }

    }




}