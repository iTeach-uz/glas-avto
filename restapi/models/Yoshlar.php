<?php
namespace restapi\models;

use restapi\models\Url;

class Yoshlar extends \common\models\Yoshlar{

    public function fields(){
        return [
            'id',
            'file' => function(Yoshlar $model){
                return $model->getImageUrl();
            },
            'title',
            'content',
        ];
    }
}