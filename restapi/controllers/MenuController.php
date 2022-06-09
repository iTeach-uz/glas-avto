<?php

namespace restapi\controllers;

use restapi\controllers\SettingsController;
use restapi\models\Tashkilot;
use common\models\Videogalareya;
use restapi\models\MyAvtomarka;
use restapi\models\AvtomarkaItem;
use restapi\models\Foto;
use common\models\Shoxa;
use common\models\Sotish;
use restapi\models\Nomens;
use common\models\Sifat;
use common\models\BizHaq;
use restapi\models\Sel;
use common\models\Rahbaryat;
use restapi\models\Lab;
use common\models\LabaratoryaImgs;
use common\models\Mahalliy;
use restapi\models\Sertifikatt;
use restapi\models\Muvofiqlik;
use common\models\Consumers;
use restapi\models\Tan;
use common\models\TanlovItem;
use common\models\ProductCategory;
use common\models\Product;
use common\models\News;
use restapi\models\Upload;
use restapi\models\Works;
use restapi\models\Yoshlar;
use common\models\NomenImg;
use yii\data\ActiveDataProvider;
use backend\modules\menumanager\models\Menu;

class MenuController extends SettingsController{

  



    public function actionIndex(){

    
        $main_menu = Menu::getMenu('header_menu') ;
        $menus = $main_menu->activeSubMenus;

        if($menus){
            return [
                'menu' => $menus,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }

    }


    public function actionBabout(){

        $tashkilot = Tashkilot::find()->one();
        if($tashkilot){
            return [
                'success'=>true,
                'message'=>'Biz haqimizda',
                'data' => $tashkilot,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }

    }


    public function actionBkorxona(){

        $korxona = Shoxa::find()->one();

        if($korxona){

            return [
                'success' => true,
                'message' => 'Shoba Korxona',
                'data' => $korxona,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }


    }


    public function actionBrahbar(){

        $rahbar = Rahbaryat::find()->where(['status' => 1])->limit(3)->all();

        if($rahbar){
            return [
                'success' => true,
                'message' => "Rahbaryat",
                'data' => $rahbar,
            ];
        }

        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }

    }


    public function actionBlabaratoriya(){

        $labartory = Lab::find()->one();

        if($labartory){
            return [
                'success' => true,
                'message' => "Labaratoriya",
                'data' => $labartory,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }

    }

    public function actionBmahalliy(){

        $mahalliy = Mahalliy::find()->one();

        if($mahalliy){
            return [
                'success' => true,
                'message' => "Mahalliylasshtirish",
                'data' => $mahalliy,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }

    }

    public function actionBsertifikat(){

        $sertifikat = Sertifikatt::find()->where(['status' => 1])->all();

        if($sertifikat){
            return [
                'success' => true,
                'message' => 'Sertifikat',
                'data' => $sertifikat,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }

    }

    public function actionBhuquq(){

        return [
            'huquq' => 'Sahifa bo\'sh, sahifa qayta ishlanmoqda',
        ];

    }


    public function actionBoshirish(){

        return [
            'message' => "Bu Sahifa Chizilmagan",
        ];

    }


    public function actionBish(){

        $works = Works::find()->one();

        if($works){
            return [
                'success' => true,
                'message' => "Bo'sh ish o'rinlari",
                'data' => $works,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }

    }


    public function actionBmuvofiq(){

        $muvofiq = Muvofiqlik::find()->one();

        if($muvofiq){
            return [
                'success' => true,
                'message' => "Muvofiqlik",
                'data' => $muvofiq,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }

    }


    public function actionByoshlar(){

        $yoshlar = Yoshlar::find()->one();

        if($yoshlar){
            return [
                'success' => true,
                'message' => "Yoshlar Ittifoqi",
                'data' => $yoshlar 
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }

    }



    public function actionTnizom(){

        $select = Sel::find()->one();

        if($select){
            return [
                'success' => true,
                'message' => 'Tanlov Nizpmi',
                'data' => $select,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }

    }









    public function actionMsifat(){

        $sifat = Sifat::find()->one();

        if($sifat){
            return [
                'success' => true,
                'message' => "Sifat",
                'data' => $sifat,
            ];
        }

        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }
    }



    public function actionMnomenklatura(){
        
        $nomen = Nomens::find()->where(['status' => 1])->all();
        $img = NomenImg::find()->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(3)->all();

        if($nomen && $img){
            return [
                'success' => true,
                'message' => "Nomenklatura",
                'data' => $nomen,
                'dataImgs' => $img
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }

    }


    public function actionMmarka(){

        $avtomarka = MyAvtomarka::find()->where(['status' => 1])->all();

        if($avtomarka){
            return [
                'success' => true,
                'message' => "Avto Marka",
                'data' => $avtomarka,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }
    }




    public function actionMsotish(){
        
        $sotish = Sotish::find()->one();

        if($sotish){
            return [
                'success' => true,
                'message' => "Sotish",
                'data' => $sotish,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }

    }

    

    public function actionMxalq(){

        $consumers = Consumers::find()->one();
        $productCategory = ProductCategory::find()->where(['status' => 1])->all();

        if($consumers && $productCategory){
            return [
                'success' => true,
                'message' => "Xalq istemol mollari",
                'data' => $consumers,
                'datProducts' => $productCategory,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }
    }



    public function actionOferta(){

        $bizHaq = BizHaq::find()->one();

        if($bizHaq){
            return [
                'success' => true,
                'message' => "Biz Haimizda Offerta",
                'data' => $bizHaq,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }
    }


    public function actionFoto(){

        $foto = Foto::find()->where(['status' => 1])->all();

        if($foto){
            return [
                'success' => true,
                "message" => "Foto Galareya",
                'data' => $foto,
            ];
        }
        else{
            return [
                'success'=>false,
                'message'=>'Ma\'lumot topilmadi'
            
            ];
        }
    }


    

    public function actionVideo(){

        $videogalareya = Videogalareya::find()->one();
        
        if($videogalareya){
            return [
                'success' => true,
                "message" => "Video Galareya",
                'data' => $videogalareya,
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