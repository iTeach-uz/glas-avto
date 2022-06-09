<?php

namespace restapi\controllers;

use restapi\controllers\SettingsController;
use restapi\models\Tan;
use yii\data\ActiveDataProvider;


class TanlovController extends SettingsController{



    public function actionIndex(){

        $tanlov = Tan::find()->andWhere(['status' => Tan::STATUS_ACTIVE]);

        if($tanlov->count() != 0){

            $provider = new ActiveDataProvider([
                'query' => $tanlov,
                'pagination' => [
                    'pageSize' => 6,
                    'totalCount' => $tanlov->count(),
                ],
            ]);
    
            return [
                'success' => true,
                'message' => "Tanlov",
                'data' => $provider,
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

        if(Tan::findOne($id)){

            $tanlov = Tan::findOne($id);

            $tanlov->updateCounters(['view_count' => 1]);

            return [
                'success' => true,
                'message' => "Tanlov Batafsil",
                'data' => $tanlov,
            ];

        }
        else{

            return [
                'choisOne' => "Sahifa Mavjud Emas",
            ];

        }

    }

}