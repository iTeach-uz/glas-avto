<?php

namespace backend\modules\menumanager;

/**
 * menumanager module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\menumanager\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * Menu uchun sayt bo'limlari
     */
    public function sections()
    {
        return [
            'babout' => "Tashkilot haqida",
            'bkorxona' => "Sho'xa korxonamiz",
            'brahbar' => 'Rahbariyat',
            'blabaratoriya' => 'Labaratoriya',
            'bmahalliy' => 'Mahalliylashtirish',
            'bsertifikat' => 'Sertifikatlar',
            'bhuquq' => 'Normativ huquq hujjatlari',
            'boshirish' => 'Martabani oshirish',
            'bish' => 'Bo’sh ish o’rinlari',
            'bmuvofiq' => 'Muvofiqlik',
            'byoshlar' => 'Yoshlar Ittifoqi',
            'tnizom' => "Tanlov o’tkazish nizomi",
            'ttanlov' => "Tanlovlar",
            'msifat' => "Sifat",
            'mnomenklatura' => "Nomenklatura",
            'mmarka' => "Avtomobil markalari",
            'msotish' => "Sotish va jo’natish",
            'mxalq' => "Xalq iste’mol mollari",
            'yanilik' => "Yangiliklar",
            'oferta' => "Biz haqimizda ommaviy oferta",
            'foto' => "Fotogalereya",
            'video' => "Videogalereya",
        ];

    }
}
