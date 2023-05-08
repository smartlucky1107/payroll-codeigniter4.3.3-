<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'users';

  protected $primaryKey = 'id';
  protected $allowedFields =
    [
      'firstname',
      'lastname',
      'middlename',
      'address',
      'birthYear',
      'birthMonth',
      'birthDate',
      'province',
      'email',
      'taxID',
      'municipality',
      'barangay',
      'street',
      'number',
      'mobile1',
      'mobile2',
      'sex',
      'governmentPosition',
      'governmentSalaryGrade',
      'governmentSalaryStep',
      'nonGovernmentPosition',
      'nonGovernmentSalary',
      'nonGovernmentTax',
      'teaching',
      'school',
      'IDType',
      'IDNumber',
      'role',
      'password',
      'img_name',
      'file_type',
      'updated_at'
    ];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];



  public function payrolls()
  {
    return $this->hasMany('payrolls', 'App\Models\PayrollModel', 'PWID', 'id');
  }
  protected function beforeInsert(array $data)
  {
    $data = $this->passwordHash($data);
    $data['data']['created_at'] = date('Y-m-d H:i:s');

    return $data;
  }

  protected function beforeUpdate(array $data)
  {
    $data = $this->passwordHash($data);
    $data['data']['updated_at'] = date('Y-m-d H:i:s');
    return $data;
  }

  protected function passwordHash(array $data)
  {
    if (isset($data['data']['password']))
      $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

    return $data;
  }

  public function updateUser($id, $data)
  {
    $data = $this->passwordHash($data);
    $builder = $this->db->table('users');
    $builder->where('id', $id);
    $builder->update($data['data']);

    return $this->db->affectedRows();
  }

  public function findAll($limit = null, $start = null)
  {
    $builder = $this->db->table('users');
    $query = $builder->get();
    return $query->getResult();


  }

  public function find($id = null)
  {
    $builder = $this->db->table('users');
    $builder->where('users.id', $id);
    // $builder->join('officers', 'officers.userID = users.id');
    $query = $builder->get();
    return $query->getResult();
  }
  public function findEO($id = null)
  {
    $builder = $this->db->table('users');
    $builder->where('users.id', $id);
    $builder->join('officers', 'officers.userID = users.id');
    $query = $builder->get();
    return $query->getResult();
  }

  public function findPWs($municipality = null)
  {
    $builder = $this->db->table('users');
    $builder->where('municipality', $municipality);
    $query = $builder->get();
    return $query->getResult();
  }
}