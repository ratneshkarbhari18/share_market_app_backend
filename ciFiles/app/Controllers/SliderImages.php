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

}