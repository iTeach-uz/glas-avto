<?php

namespace restapi\controllers;

use restapi\controllers\Controller;
use common\models\Navbar;

class TelController extends SettingsController{




    public function actionIndex(){

        $navbar = Navbar::find()->all();
        
        if($navbar){
            return [
                'success' => true,
                "message" => "Telefon",
                'data' => $navbar,
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