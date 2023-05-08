<?php
namespace App\Models;

use CodeIgniter\Model;

class PrecinctModel extends Model
{
    protected $table = 'precincts';

    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'address', 'contactNum', 'email', 'region', 'city', 'district', 'barangay', 'EO_id'];

    public function find($id = null)
    {
        $builder = $this->db->table('precincts');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getResult();

    }

}