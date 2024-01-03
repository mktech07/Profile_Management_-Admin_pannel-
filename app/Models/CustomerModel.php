<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'email',
        'mobile',
        'password',
        'gender',
        'designation',
        'experience',
        'qulification',
        'address',
        'city',
        'pincode',
        'state',
        'country',
    ];

    // this method fetch records form table
    public function getRecords()
    {
        return $this->orderBy('id', 'DESC')->findAll();
    }
    public function fetchRecord($id)
    {
        // Select * form customers where id = $id; 
        return $this->where('id', $id)->first();
    }
    

}



?>