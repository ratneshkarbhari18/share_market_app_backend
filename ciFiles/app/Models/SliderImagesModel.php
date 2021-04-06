<?php namespace App\Models;

use CodeIgniter\Model;

class SliderImagesModel extends Model
{

    protected $table = "slider_images";

    protected $primaryKey = 'id';

    protected $allowedFields = ['name'];

}