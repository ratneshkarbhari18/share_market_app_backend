<?php namespace App\Models;

use CodeIgniter\Model;

class DailyHoroscopeModel extends Model
{

    protected $table = "daily_horoscopes";

    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'data','date'];

}