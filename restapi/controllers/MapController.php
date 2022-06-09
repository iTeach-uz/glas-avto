<?php

namespace restapi\controllers;

use restapi\controllers\SettingsController;
use common\models\Map;

class MapController extends SettingsController{

    public function actionIndex(){

        $map = Map::find()->one();

        return [
            'map' => $map,
        ];

    }

}