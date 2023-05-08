<?php
namespace App\Controllers;

use App\Models\UserModel;


class Users extends BaseController
{

	public function index()
	{
		$data = [];
		helper(['form']);


		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];

			if (!$this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			} else {
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))
					->first();

				$this->setUserSession($user);
				//$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('dashboard');

			}
		}

		echo view('templates/header', $data);
		echo view('login');
		echo view('templates/footer');
	}

	private function setUserSession($user)
	{
		$data = [
			'id' => $user['id'],
			'firstname' => $user['firstname'],
			'lastname' => $user['lastname'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	public function register()
	{
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				'middlename' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[8]|max_length[255]',
				'password_confirm' => 'matches[password]',
			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {
				$model = new UserModel();

				$newData = [
					'firstname' => $this->request->getVar('firstname'),
					'lastname' => $this->request->getVar('lastname'),
					'middlename' => $this->request->getVar('middlename'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
				];

				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/');

			}
		}


		echo view('templates/header', $data);
		echo view('register');
		echo view('templates/footer');
	}

	public function profile()
	{

		$data = [];
		helper(['form']);
		$model = new UserModel();

		if ($this->request->getMethod() == 'post') {
			$imageFile = $this->request->getFile('photo');
			$imageFile->move('../public/uploads');


			// var_dump($_POST);
			//let's do the validation here
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
			];

			if ($this->request->getPost('password') != '') {
				$rules['password'] = 'required|min_length[8]|max_length[255]';
				$rules['password_confirm'] = 'matches[password]';
			}


			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {
				$newData = [
					'id' => session()->get('id'),
					'firstname' => $this->request->getPost('firstname'),
					'lastname' => $this->request->getPost('lastname'),
					'middlename' => $this->request->getPost('middlename'),
					'birthDate' => $this->request->getPost('birthDate'),
					'birthYear' => $this->request->getPost('birthYear'),
					'birthMonth' => $this->request->getPost('birthMonth'),
					'address' => $this->request->getPost('address'),
					'province' => $this->request->getPost('province'),
					'municipality' => $this->request->getPost('municipality'),
					'barangay' => $this->request->getPost('barangay'),
					'street' => $this->request->getPost('street'),
					'number' => $this->request->getPost('number'),
					'email' => $this->request->getPost('email'),
					'mobile1' => $this->request->getPost('mobile1'),
					'mobile2' => $this->request->getPost('mobile2'),
					'taxID' => $this->request->getPost('taxID'),
					'sex' => $this->request->getPost('sex'),
					'governmentPosition' => $this->request->getPost('governmentPosition'),
					'governmentSalaryGrade' => $this->request->getPost('governmentSalaryGrade'),
					'governmentSalaryStep' => $this->request->getPost('governmentSalaryStep'),
					'nonGovernmentPosition' => $this->request->getPost('nonGovernmentPosition'),
					'nonGovernmentSalary' => $this->request->getPost('nonGovernmentSalary'),
					'nonGovernmentTax' => $this->request->getPost('nonGovernmentTax'),
					'teaching' => ($this->request->getPost('teaching') == 'true') ? True : False,
					'IDNumber' => $this->request->getPost('IDNumber'),
					'IDType' => $this->request->getPost('IDType'),
					'img_name' => base_url() . 'uploads/' . ($imageFile->getClientName()),
					'file_type' => $imageFile->getClientMimeType()
				];

				$data = array(
					'data' => $newData,
				);
				$updated = $model->updateUser(session()->get('id'), $data);

				if ($updated) {
					session()->setFlashdata('success', 'Successfully Updated!');
					return redirect()->to('/profile');
				} else {
					session()->setFlashdata('error', 'Errors');

				}
				// return redirect()->to('/profile');

			}
		}

		$data['user'] = $model->where('id', session()->get('id'))->first();
		echo view('templates/header', $data);
		echo view('profile');
		echo view('templates/footer');
	}

	public function reset()
	{
		$data = [];
		if ($this->request->getMethod() == 'post') {


			$model = new UserModel();

			$user = $model->where('email', $this->request->getVar('email'))
				->first();

			if (!$user) {
				$rules = [
					'email' => 'required|min_length[6]|max_length[50]|valid_email|validateEmail[email]',
				];
				$errors = [
					'email' => [
						'validateEmail' => "Email doesn't exist"
					]
				];
				if (!$this->validate($rules, $errors)) {

					$data['validation'] = $this->validator;
				}

			} else {
				$session = session();
				$session->setFlashdata('email', $user['email']);
				return redirect()->to('confirm-password');
			}

		}

		echo view('templates/header', $data);
		echo view('reset-password');
		echo view('templates/footer');

	}

	public function confirm()
	{
		$data = [];
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'password' => 'required|min_length[8]|max_length[255]',
				'password_confirm' => 'matches[password]',
			];
			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {
				$model = new UserModel();
				$user = $model->where('email', $this->request->getVar('email'))
					->first();
				$data = [
					'id' => $user['id'],
					'firstname' => $user['firstname'],
					'lastname' => $user['lastname'],
					'email' => $user['email'],
					'password' => $this->request->getVar('password'),
				];
				$newData = array(
					'data' => $data
				);
				$updated = $model->updateUser($user['id'], $newData);
				if ($updated) {
					session()->setFlashdata('success', 'Successful Registration');
					return redirect()->to('/');
				} else {
					session()->setFlashdata('error', 'Errors');

				}

			}



		}
		echo view('templates/header', $data);
		echo view('confirm-password');
		echo view('templates/footer');
	}
	public function logout()
	{
		session()->destroy();
		return redirect()->to('/');
	}

//--------------------------------------------------------------------

}