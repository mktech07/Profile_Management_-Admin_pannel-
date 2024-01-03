<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use Tests\Support\Models\UserModel;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        helper('form');
        $model = new CustomerModel();



        $data['session'] = $session;

        if ($this->request->is('get')) {
            $name = $this->request->getGet('name');
            $email = $this->request->getGet('email');
            $gender = $this->request->getGet('gender');
            $designation = $this->request->getGet('designation');
            $qulification = $this->request->getGet('qulification');
            $mobile = $this->request->getGet('mobile');
            $address = $this->request->getGet('address');
            $city = $this->request->getGet('city');
            $state = $this->request->getGet('state');
            $date_range = $this->request->getGet('daterange');
            // $from = $this->request->getGet('from');
            // $to = $this->request->getGet('to');
            // d($to);
            if (!empty($name)) {
                $model->like('name', $name);
            }
            if (!empty($email)) {
                $model->like('email', $email);
            }
            if (!empty($gender)) {
                $model->like('gender', $gender);
            }
            if (!empty($designation)) {
                $model->like('designation', $designation);
            }
            if (!empty($qulification)) {
                $model->like('qulification', $qulification);
            }
            if (!empty($mobile)) {
                $model->like('mobile', $mobile);
            }
            if (!empty($address)) {
                $model->like('address', $address);
            }
            if (!empty($city)) {
                $model->like('city', $city);
            }
            if (!empty($state)) {
                $model->like('state', $state);
            }

            // if (!empty($from) && !empty) {
            //     $fromDate = strtotime($from);

            //     dd(date('Y-m-d', $fromDate));

            //     $toDate = $to . " 23:59:59";
            //     // dd($fromDat e, $toDate);
            //     $fromDateTime = \DateTime::createFromFormat('d-m-Y H:i:s', $fromDate, new \DateTimeZone('Asia/Kolkata'));
            //     $toDateTime = \DateTime::createFromFormat('d-m-Y H:i:s', $toDate, new \DateTimeZone('Asia/Kolkata'));
            //     // dd($fromDateTime, $toDateTime);
            //     $model->where('created_at >=', $fromDateTime->format('Y-m-d H:i:s'));
            //     $model->where('created_at <=', $toDateTime->format('Y-m-d H:i:s'));
            // }
            // Fetching Data from DB

            if (!empty($date_range)) {
                $from = substr($date_range, 0, 10);
                // $finalFrom = date('Y-m-d', $from) . " 00:00:00";
                $dateObject = Time::createFromFormat('d/m/Y', $from);

                // Format the date in a different format
                $formattedDate = $dateObject->format('Y-m-d') . " 00:00:00";

                // dd($from, $dateObject, $formattedDate);
                $to = substr($date_range, 13, 10);
                $dateObject2 = Time::createFromFormat('d/m/Y', $to);
                $formattedDate2 = $dateObject2->format('Y-m-d') . " 23:59:59";
                // dd($formattedDate, $formattedDate2);
                $model->where('created_at >=', $formattedDate);
                $model->where('created_at <=', $formattedDate2);
            }
            $data['records'] = $model->paginate(6);

            if (empty($data['records'])) {
                $data['error'] = 'Record Not Found !';
                $data['pager'] = $model->pager;

                return view('welcome_message', $data);
            } else {

                // $data['records'] = $customerRecords;
                $data['pager'] = $model->pager;

                return view('welcome_message', $data);
            }

        }

        // $customerRecords = $model->getRecords();

        $data['records'] = $model->paginate(5);
        $data['pager'] = $model->pager;
        return view('welcome_message', $data);
    }


    public function regForm()
    {
        //Registraion Controller
        $session = \Config\Services::session();
        helper('form');
        $data = [];
        if ($this->request->is('post')) {
            $input = $this->validate([
                // Receiving Data from Form
                'name' => 'required|alpha_space|min_length[3]',
                'email' => 'required|valid_email|is_unique[customers.email]',
                'mobile' => 'required|numeric|exact_length[10]',
                'password' => 'required|min_length[8]',
                'gender' => 'required|in_list[male,female,other]',
                'designation' => 'required|alpha_space',
                'experience' => 'required|numeric',
                'qulification' => 'required',
                'address' => 'required',
                'city' => 'required|alpha_space',
                'pincode' => 'required|numeric|exact_length[6]',
                'state' => 'required|alpha_space',
                'country' => 'required|alpha_space',
                // 'profile_image' => 'required',
            ]);
            if ($input == true) {

                // Load Password Hashing Library
                $reqData = $this->request->getPost();
                $dataToInsert = [];

                if (!empty($reqData['name'])) {
                    $dataToInsert['name'] = filter_var($reqData['name'], FILTER_SANITIZE_STRING);
                }
                if (!empty($reqData['email'])) {
                    $dataToInsert['email'] = filter_var($reqData['email'], FILTER_VALIDATE_EMAIL);
                }
                if (!empty($reqData['gender'])) {
                    $dataToInsert['gender'] = $reqData['gender'];
                }
                if (!empty($reqData['password'])) {
                    $dataToInsert['password'] = password_hash($reqData['password'], PASSWORD_BCRYPT);
                }
                if (!empty($reqData['designation'])) {
                    $dataToInsert['designation'] = $reqData['designation'];
                }
                if (!empty($reqData['experience'])) {
                    $dataToInsert['experience'] = filter_var($reqData['experience'], FILTER_VALIDATE_INT);
                }
                if (!empty($reqData['qulification'])) {
                    $dataToInsert['qulification'] = $reqData['qulification'];
                }
                if (!empty($reqData['mobile'])) {
                    $dataToInsert['mobile'] = filter_var($reqData['mobile'], FILTER_VALIDATE_INT);
                }
                if (!empty($reqData['address'])) {
                    $dataToInsert['address'] = $reqData['address'];
                }
                if (!empty($reqData['city'])) {
                    $dataToInsert['city'] = $reqData['city'];
                }
                if (!empty($reqData['pincode'])) {
                    $dataToInsert['pincode'] = filter_var($reqData['pincode'], FILTER_VALIDATE_INT);
                }
                if (!empty($reqData['state'])) {
                    $dataToInsert['state'] = $reqData['state'];
                }
                if (!empty($reqData['country'])) {
                    $dataToInsert['country'] = $reqData['country'];
                }

                // Save to DB
                $model = new CustomerModel();

                $dataF = $model->save($dataToInsert);
                if (!empty($dataF)) {
                    $session->setFlashdata('success', 'Record Added Successfully!');
                    return redirect()->to('/');
                }
            } else {
                // form not validated
                $data['validation'] = $this->validator;
            }

        }
        return view('Customers/registration.php', $data);
    }


    public function edit($id)
    {
        $session = \Config\Services::session();
        helper('form');

        $model = new CustomerModel();
        $fetchedData = $model->fetchRecord($id);

        $data = [];
        // print_r($fetchedData);
        if (empty($fetchedData)) {
            $session->setFlashdata('error', 'Record Not Found !');
            return redirect()->to('/');
        }
        $data['ftdata'] = $fetchedData;

        if ($this->request->getMethod() == 'post') {

            $input = $this->validate([
                // Receiving Data from Form
                'name' => 'required|min_length[3]',
                'email' => 'required|valid_email',
                'mobile' => 'required|numeric|min_length[10]',
                'password' => 'required|min_length[6]',
                'gender' => 'required|in_list[male,female,other]',
                'designation' => 'required',
                'experience' => 'required|numeric',
                'qulification' => 'required',
                'address' => 'required',
                'city' => 'required',
                'pincode' => 'required|numeric',
                'state' => 'required',
                'country' => 'required',
                // 'profile_image' => 'required',
            ]);


            if ($input == true) {
                $tableData = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'mobile' => $this->request->getPost('mobile'),
                    'password' => $this->request->getPost('password'),
                    'gender' => $this->request->getPost('gender'),
                    'designation' => $this->request->getPost('designation'),
                    'experience' => $this->request->getPost('experience'),
                    'qulification' => $this->request->getPost('qulification'),
                    'address' => $this->request->getPost('address'),
                    'city' => $this->request->getPost('city'),
                    'pincode' => $this->request->getPost('pincode'),
                    'state' => $this->request->getPost('state'),
                    'country' => $this->request->getPost('country'),
                ];

                // Save to DB
                $model = new CustomerModel();
                $model->update($id, $tableData);

                $session->setFlashdata('success', 'Record Updated Successfully!');
                return redirect()->to('/');
            } else {
                // form not validated
                $data['validation'] = $this->validator;
                return view('Customers/edit.php', $data);

            }

        }
        return view('Customers/edit.php', $data);

    }

    public function delete()
    {
        $session = \Config\Services::session();
        helper('form');
        $id = $this->request->getPost('delete_user_id');
        // print_r($id);
        $model = new CustomerModel();
        $fetchedData = $model->fetchRecord($id);

        $data = [];
        // print_r($fetchedData);
        if (empty($fetchedData)) {
            $session->setFlashdata('error', 'Record Not Found !');
            return redirect()->to('/');
        }
        $model->delete($id);
        $session->setFlashdata('success', 'Record Deleted Successfully !');
        return redirect()->to('/');

    }

}