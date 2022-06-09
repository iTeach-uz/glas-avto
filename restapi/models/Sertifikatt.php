<?php

namespace restapi\models;

use common\models\Sertifikat;
use restapi\models\Url;


class Sertifikatt extends Sertifikat{

    public function fields(){
        return [
            'id',
            'title',
            'items' => function(Sertifikat $model){
                return $model->sertifikatItems;
            }
        ];
    }

}