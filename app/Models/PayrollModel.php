<?php
namespace App\Models;

use CodeIgniter\Model;

class PayrollModel extends Model
{
  protected $table = 'payrolls';
  protected $allowedFields = [
    'PWID',
    'position',
    'taxID',
    'allowance',
    'tax',
    'total',
    'incomeTax',
    'EOID',
    'activity',
    'sign1',
    'sign2',
    'sign3',
    'supervisor',
    'date1',
    'date2',
    'date3',
    'date4',
    'amountDue'
  ];

  public function user()
  {
    $this->belongsTo('user', 'App\Models\UserModel', 'PWID', 'id');
  }

  public function findAll($limit = null, $start = null)
  {
    $builder = $this->db->table('payrolls');
    $builder->select('*');
    $builder->join('users', 'users.id = payrolls.PWID');
    $query = $builder->get();
    return $query->getResult();
  }

  public function findByEO($EOID)
  {
    $builder = $this->db->table('payrolls');
    $builder->where('EOID', $EOID);
    $query = $builder->get();
    return $query->getResult();
  }

  public function findByActivity($activity)
  {
    $builder = $this->db->table('payrolls');
    $builder->join('users', 'users.id = payrolls.PWID');
    $builder->where('activity', $activity);
    $query = $builder->get();
    return $query->getResult();
  }

}