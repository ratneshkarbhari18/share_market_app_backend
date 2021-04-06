<?php

namespace App\Controllers;
use App\Models\SliderImagesModel;
use App\Controllers\PageLoader;


class SliderImages extends BaseController
{

    public function upload(){
        if($sliderImage = $this->request->getFile('slider_image'))
        {
            $randomName = $sliderImage->getRandomName();
            $done = $sliderImage->move('./assets/images/slider', $randomName);
            $sliderImagesModel = new SliderImagesModel();
            if($done){
                $sliderImagesModel->insert(array(
                    "name" => $randomName
                ));
                return redirect()->route('manage-slider-images');
            }
        }
    }

    public function delete(){
        $id = $this->request->getPost("id");
        $sliderImagesModel = new SliderImagesModel();
        $deleted = $sliderImagesModel->delete($id);
        if($deleted){
            return redirect()->route('manage-slider-images');
        }
    }

    public function fetchApi(){

        $api_key = $this->request->getPost("api_key");
        if($api_key!="5f4dbf2e5629d8cc19e7d51874266678"){
            return json_encode(
                array(
                    "result" => "failure",
                    "reason" => "API Key is incorrect"
                )
            );
        }

        $sliderImagesModel = new SliderImagesModel();
        $sliderImages = $sliderImagesModel->findAll();
        return json_encode(array(
            "result" => "success",
            "data" => json_encode($sliderImages)
        ));

    }
}