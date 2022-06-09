<?php


namespace restapi\controllers;

use restapi\controllers\SettingsController;
use common\models\Oav;
use common\models\OavImg;

class OavController extends SettingsController{



    public function actionIndex(){
        
        $oav = Oav::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(3)->all();
        $img = OavImg::find()->one();

        if($oav || $img){
            return [
                'success' => true,
                'message' => "OAV",
                'data' => $oav,
                'dataImg' => $img
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