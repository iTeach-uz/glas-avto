<?php

$this->title = "Avto Oyna";

use common\models\Contact;
use common\models\Product;
use common\models\News;


$contacts = Contact::find()->where(['status' => 1])->all();

$counter = 0;

foreach($contacts as $contact){
    $counter +=1;
}

$_SESSION['counter'] = $counter;


$contactss = Contact::find()->all();

$counters = 0;

foreach($contactss as $item){
    $counters +=1;
}

$product = Product::find()->all();

$counterProduct = 0;

foreach($product as $item){
    $counterProduct +=1;
}

$news = News::find()->all();

$counterNews = 0;

foreach($news as $item){
    $counterNews +=1;
}




?>


<section class="content" style="padding: 20px;">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Yangi Xabarlar Soni</span>
                <span class="info-box-number"><?=$_SESSION['counter'];?></span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->


        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Barcha Xabarlar Soni</span>
              <span class="info-box-number"><?=$counters;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->


        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Maxsulotlar soni</span>
              <span class="info-box-number"><?=$counterProduct;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- ./col -->


        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Yangiliklar Soni</span>
              <span class="info-box-number"><?=$counterNews;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- ./col -->
    </div>
</section>