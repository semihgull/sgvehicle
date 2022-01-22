<?php

namespace App\controllers;

use App\models\Department;
use Core\Controller;
use Symfony\Component\HttpFoundation\Request;

class DepartmentController extends Controller
{
    public function settings(Request $request){
        $departmants = Department::all();

        return $this->view('department.settings', ["departments" => $departmants]);
    }

    public function settingsSave(Request $request){
            if ($request->isMethod('POST')){
                $this->validator->rule('required', ['department-name']);
                $this->validator->rule('lengthMin' ,'department-name', 3);
                $this->validator->labels([
                    'department-name' => 'Departman Adı'
                ]);

                if ($this->validator->validate()){
                    $save = Department::create(['name' => $this->validator->data()["department-name"]]);
                }
            }


        $departmants = Department::all();

        return $this->view('department.settings', ["departments" => $departmants]);
    }

    public function settingsEdit(Request $request){
        if ($request->isMethod('POST')){
            $this->validator->rule('required', ['department-name-edit', 'department-id-edit']);
            $this->validator->rule('integer', ['department-id-edit']);
            $this->validator->rule('lengthMin' ,'department-name-edit', 3);
            $this->validator->labels([
                'department-name-edit' => 'Departman Adı'
            ]);

            if ($this->validator->validate()){
                $update = Department::where('id', $this->validator->data()['department-id-edit'])
                                    ->update(['name' => $this->validator->data()['department-name-edit']]);
            }

            $departmants = Department::all();

            return $this->view('department.settings', ["departments" => $departmants]);
        }
    }

    public function getDeparmtentInfo(Request $request){
        if ($request->isMethod("POST")){
            $this->validator->rule('integer', ['departmentId']);

            if ($this->validator->validate()){
                $department = Department::where('id', $request->get('departmentId'))->first();

                if ($department){
                    return $department;
                }else{
                    exit();
                }
            }
        }
    }
}