<?php namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{

    protected $table = "questions";

    protected $primaryKey = 'id';

    protected $allowedFields = ['first_name', 'last_name','contact_number','question'];

}