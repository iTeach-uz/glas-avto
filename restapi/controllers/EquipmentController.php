<?php

namespace restapi\controllers;

use restapi\controllers\SettingsControllers;
use restapi\models\Equip;
use Yii;


class EquipmentController extends SettingsController{



    public function actionIndex(){

        $equipment = Equip::find()->one();

        if($equipment){
            return [
                'success' => true,
                'message' => "Uskunalar ishlab",
                'data' => $equipment,
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

        if(Equip::findOne($id)){

            $equipment = Equip::findOne($id);

            return [
                'equipment' => $equipment,
            ];
        }
        else{
            return "Bunday Sahifa Mavjud Emas!";
        }

    }

}