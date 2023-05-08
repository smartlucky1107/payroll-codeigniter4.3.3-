<?php
namespace App\Models;

use CodeIgniter\Model;

class TaxModel extends Model
{
    protected $table = 'taxes';

    protected $primaryKey = 'id';
    protected $allowedFields = ['type', 'value'];

    public function findAll($limit = null, $start = null)
    {
        $builder = $this->db->table('taxes');
        $query = $builder->get();
        return $query->getResult();
    }

}