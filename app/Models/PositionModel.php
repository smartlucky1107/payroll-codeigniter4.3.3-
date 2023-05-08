<?php
namespace App\Models;

use CodeIgniter\Model;

class PositionModel extends Model
{
    protected $table = 'positions';

    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'travelling', 'communication', 'health'];

    public function findAll($limit = null, $start = null)
    {
        $builder = $this->db->table('positions');
        $query = $builder->get();
        return $query->getResult();
    }

    public function find($id = NULL)
    {
        $builder = $this->db->table('positions');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getResult();
    }

}