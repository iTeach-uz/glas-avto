<?php

namespace restapi\controllers;

use restapi\controllers\SettingsController;
use restapi\models\MyHomeBanner;
use Yii;


class HomeBannerController extends SettingsController{





    public function actionIndex(){

        $homeBanner = MyHomeBanner::find()->one();

        if($homeBanner){
            return [
                'success' => true,
                "message" => "Home Banneri",
                'data' => $homeBanner,
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