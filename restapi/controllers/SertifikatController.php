<?php

namespace restapi\controllers;

use restapi\controllers\SettingsController;
use restapi\models\Sertifikatt;
use common\models\SertifikatItem;

class SertifikatController extends SettingsController{

    public function actionIndex(){

        $sert = Sertifikatt::find()->where(['status' => 1])->all();

        if($sert){
            return [
                'success' => true,
                'message' => "Sertifikat",
                'data' => $sert,
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