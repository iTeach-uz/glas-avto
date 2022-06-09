<?php
namespace restapi\models;


use common\models\HomeBanner;
use restapi\models\Url;


class MyHomeBanner extends HomeBanner{


    public function fields(){
        return [
            'id',
            'imgs' => function(HomeBanner $model){
                return $model->getImageUrl();
            },
            'title',
            'text',
        ];
    }

}