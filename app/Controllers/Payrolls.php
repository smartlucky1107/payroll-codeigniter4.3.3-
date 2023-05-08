<?php
namespace App\Controllers;


use App\Models\OfficerModel;
use App\Models\UserModel;
use App\Models\PayrollModel;
use App\Models\PositionModel;
use App\Models\PrecinctModel;
use App\Models\TaxModel;


class Payrolls extends BaseController
{


    public function index()
    {
        $data = [];

        $model = new UserModel();
        $user = $model->find(session()->get('id'));
        if (intval($user[0]->role) < 2) {
            return redirect()->to('/');
        } else {
            $officerModel = new OfficerModel();
            $EO = $officerModel->find(session()->get('id'));

            $precinctId = ($EO[0]->PrecinctID);
            $precinctModel = new PrecinctModel();
            $precinct = $precinctModel->find($precinctId);
            $municipality = $precinct[0]->city;

            $data['municipality'] = $municipality;

            //filter payroll by EO
            $payrollModel = new PayrollModel();
            $items = $payrollModel->findByEO($EO[0]->id);

            $activities = array();
            array_push($activities, $items[0]->activity);
            $tmp = $items[0]->activity;
            foreach ($items as $item) {
                if ($item->activity != $tmp) {
                    array_push($activities, $item->activity);
                    $tmp = $item->activity;
                }
            }
            $data['activities'] = $activities;

            foreach ($activities as $activity) {

            }
        }



        echo view('templates/header', $data);
        echo view('payrolls/index.php', $data);

        echo view('templates/footer');
    }

    public function single()
    {
        $activity = urldecode($this->request->uri->getSegment(2));
        $data = [];

        $model = new UserModel();
        $user = $model->find(session()->get('id'));

        if (intval($user[0]->role) < 2) {
            return redirect()->to('/');
        } else {
            $officerModel = new OfficerModel();
            $EO = $officerModel->find(session()->get('id'));

            $precinctId = ($EO[0]->PrecinctID);
            $precinctModel = new PrecinctModel();
            $precinct = $precinctModel->find($precinctId);
            $municipality = $precinct[0]->city;


            $payrollModel = new PayrollModel();
            $results = $payrollModel->findByActivity($activity);
            $allowance_titles = array();
            $tax_titles = array();

            foreach (json_decode($results[0]->allowance) as $key => $value) {
                array_push($allowance_titles, $key);
            }

            foreach (json_decode($results[0]->tax) as $key => $value) {
                array_push($tax_titles, $key);
            }

            foreach ($results as $item) {
                $allowance = json_decode($item->allowance);
                $tax = json_decode($item->tax);


                $allowances = array();

                $taxes = array();
                foreach ($allowance as $key => $value) {
                    array_push($allowances, $value);
                }

                foreach ($tax as $key => $value) {
                    array_push($taxes, $value);
                }

                $item->allowances = $allowances;
                $item->taxes = $taxes;
            }

            $data['payrolls'] = $results;
            $data['tax_titles'] = $tax_titles;
            $data['allowance_titles'] = $allowance_titles;
            $data['municipality'] = $municipality;
            $data['activity'] = $activity;
            echo view('templates/header', $data);
            echo view('payrolls/single.php', $data);

            echo view('templates/footer');
        }

    }
    public function create()
    {
        $data = [];
        helper(['form']);


        $model = new UserModel();
        //same muniicipality
        $user = $model->find(session()->get('id'));


        if (intval($user[0]->role) == 2) {
            $officer = $model->findEO(session()->get('id'));
            $precinctId = ($officer[0]->PrecinctID);
            $precinctModel = new PrecinctModel();
            $precinct = $precinctModel->find($precinctId);
            $municipality = $precinct[0]->city;

            $PWs = $model->findPWs($municipality);
            $data['PWs'] = $PWs;
            $data['municipality'] = $municipality;

        } else {
            return redirect()->to('/');
        }


        $model1 = new PositionModel();
        $positions = $model1->findAll();

        $data['positions'] = $positions;

        $model2 = new TaxModel();
        $taxes = $model2->findAll();
        $data['taxes'] = $taxes;


        if ($this->request->getPost()) {
            $post = array();
            $officerModel = new OfficerModel();
            $EO = $officerModel->find(session()->get('id'));
            foreach ($_POST as $key => $value) {
                $post[$key] = $this->request->getPost($key);
            }
            $PWs = $post['PWID'];
            // $officer = $model->findEO(session()->get('id'));
            foreach ($PWs as $key => $PW) {
                $allowance = array();
                foreach ($post['allowance_title'] as $index => $title) {
                    $allowance[$title] = $post['allowance_' . ($index + 1)][$key];
                }
                $tax = array();

                foreach ($post['tax_title'] as $index => $title) {
                    $tax[$title] = $post['tax_' . ($index + 1)][$key];
                }

                $position = $model1->find($post['position'][$key]);

                $model = new PayrollModel();
                $newData = [
                    'PWID' => $PW,
                    'position' => $position[0]->name,
                    'taxID' => $post['taxID'][$key],
                    'allowance' => json_encode($allowance),
                    'tax' => json_encode($tax),
                    'total' => $post['total'][$key],
                    'incomeTax' => $post['incomeTax'][$key],
                    'amountDue' => $post['amountDue'][$key],
                    'supervisor' => $post['supervisor'],
                    'sign1' => $post['sign1'],
                    'sign2' => $post['sign2'],
                    'sign3' => $post['sign3'],
                    'date1' => $post['date1'],
                    'date2' => $post['date2'],
                    'date3' => $post['date3'],
                    'date4' => $post['date4'],
                    'activity' => $post['activity'],
                    'EOID' => $EO[0]->id,
                ];
                $model->upsert($newData);

            }

        }

        echo view('templates/header', $data);
        echo view('payrolls/create', $data);

        echo view('templates/footer');
    }

//--------------------------------------------------------------------

}