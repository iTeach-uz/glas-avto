<?php

namespace restapi\controllers;

use restapi\controllers\SettingsController;
use restapi\models\Hamkor;

class HamkorlarController extends SettingsController{





    

    public function actionIndex(){

        $hamkorlar = Hamkor::find()->where(['status' => 1])->all();

        if($hamkorlar){
            return [
                'success' => true,
                "message" => "Hamkorlar",
                'data' => $hamkorlar,
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