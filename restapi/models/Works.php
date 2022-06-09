<?php
namespace restapi\models;
use Yii;


class Works extends \common\models\Works{

    public function fields(){
        return [
            'id',
            'file' => function(Works $model){
                return $model->getAsdUrl();
            },
            'img' => function(Works $model){
                return $model->getImageUrl();
            },
        ];
    }
}