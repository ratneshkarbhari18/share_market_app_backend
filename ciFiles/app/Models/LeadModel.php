<?php namespace App\Models;

use CodeIgniter\Model;

class LeadModel extends Model
{

    protected $table = "leads";

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'gender','contact_number','birth_date','birth_month','birth_year', 'birth_hour','birth_minute','birth_second','birth_place','service'];

}