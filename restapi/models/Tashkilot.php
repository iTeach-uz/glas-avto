<?php
namespace restapi\models;

use restapi\models\Url;


class Tashkilot extends \common\models\Tashkilot
{
    public function fields(){
        return [
            'id',
            'title',
            'text',
            'images'=>function(Tashkilot $model){
                return  $model->images();
            }
        ];
    }     
}