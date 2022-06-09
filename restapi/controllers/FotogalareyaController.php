<?php

namespace restapi\controllers;

use restapi\controllers\SettingsController;
use restapi\models\Foto;

class FotogalareyaController extends SettingsController{



    public function actionIndex(){

        $foto = Foto::find()->where(['status' => 1])->all();

        if($foto){
            return [
                'success' => true,
                'message' => "Foto Glareya",
                'data' => $foto,
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