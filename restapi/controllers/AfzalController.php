<?php

namespace restapi\controllers;

use restapi\controllers\SettingsControllers;
use common\models\Afzal;
use Yii;    

class AfzalController extends SettingsController{
 

    public function actionIndex(){

        $afzal = Afzal::find()->where(['status' => 1])->limit(6)->all();

        if($afzal){
            return [
                'success' => true,
                'message' =>  "Biznig Afzalliklarimiz",
                'data' => $afzal,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }


    }

}