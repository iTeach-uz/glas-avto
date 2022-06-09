<?php

namespace restapi\controllers;

use restapi\controllers\SettingsController;
use common\models\Contact;
use Yii;

class ContactController extends SettingsController{

 

    public function actionIndex(){

        $model = new Contact();

        $json=json_decode(Yii::$app->request->getRawBody(),true);
        $model->name=$json['name'];
        $model->email=$json['email'];
        $model->tel=$json['tel_number'];
        
        $model->status = 1;
        if($model->load(Yii::$app->request->post(), '') && $model->validate()){
            
            if($model->save()){

                return [
                    'status' => 200,
                    'message' => 'success'
                ];

            }

        }
    
        else{
            
            return [
                'status' => 403,
                'message' => $model->errors,
            ]; 

        }
    
    }

}