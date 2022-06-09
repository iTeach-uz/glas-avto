<?php

namespace restapi\controllers;

use restapi\controllers\SettingsController;
use common\models\Terim;

class ShartController extends SettingsController{

    public function actionIndex(){

        $terim = Terim::find()->one();

        if($terim){
            return [
                'success' => true,
                'message' => "Terim",
                'data' => $terim,
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