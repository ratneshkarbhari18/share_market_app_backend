<?php namespace App\Models;

use CodeIgniter\Model;

class LeadModel extends Model
{

    protected $table = "leads";

    protected $primaryKey = 'id';

    protected $allowedFields = ['fist_name', 'last_name','contact_number','message'];

}