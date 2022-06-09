<?php

namespace restapi\controllers;

use restapi\controllers\SettingsController;
use restapi\models\MyCompany;
use Yii;

class CompanyController extends SettingsController{





    public function actionIndex(){

        $company = MyCompany::find()->one();

        if($company){
            return [
                'success' => true,
                'message' => "Kompanya Haqida",
                'data' => $company,
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