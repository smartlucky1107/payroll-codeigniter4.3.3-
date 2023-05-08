<?php
namespace App\Models;

use CodeIgniter\Model;

class OfficerModel extends Model
{
    protected $table = 'officers';
    protected $allowedFields = ['precinctID', 'userID', 'name', 'mobile', 'landline', 'address', 'startDate'];



    public function findAll($limit = null, $start = null)
    {
        $builder = $this->db->table('officers');
        $builder->select('*');
        $builder->join('users', 'users.id = payrolls.PWID');
        $query = $builder->get();
        return $query->getResult();
    }

    public function find($userID = null)
    {
        $builder = $this->db->table('officers');
        $builder->where('userID', $userID);
        $query = $builder->get();
        return $query->getResult();
    }

}