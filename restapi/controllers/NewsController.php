<?php

namespace restapi\controllers;

use restapi\controllers\SettingsController;
use common\models\News;
use yii\data\ActiveDataProvider;

class NewsController extends SettingsController{



    public function actionIndex(){

        $news = News::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC]);

        if($news){

            $provider = new ActiveDataProvider([
                'query' => $news,
                'pagination' => [
                    'pageSize' => 4,
                ],
            ]);
    
            return [
                'success' => true,
                "message" => "Yangiliklar",
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

        if(News::findOne($id)){

            $newsOne = News::findOne($id);

            $newsOne->updateCounters(['view_count' => 1]);

            return [
                "success" => true,
                "message" => "Yangilik Batafsil",
                'data' => $newsOne,
            ];

        }

        else{
            return [
                'erorr' => "Bunday Sahifa mavjud emas!"
            ];
        }

    }

}