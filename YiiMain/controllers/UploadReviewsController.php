<?php
namespace app\controllers;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Yii;
use yii\web\Controller;

class UploadReviewsController extends Controller
{
    public function actionIndex()
    {
        $data['image'] = "here the image that you uploaded";
        return $this->render('uploaded', $data);
    }
}

