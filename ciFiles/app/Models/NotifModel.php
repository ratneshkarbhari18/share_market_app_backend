<?php namespace App\Models;

use CodeIgniter\Model;

class NotifModel extends Model
{

    protected $table = "notiications";

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'buy_price','stop_loss','market_price'];

}