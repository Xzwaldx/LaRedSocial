<?php
namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function login()
    {
        $model = new UserModel();

        if ($this->request->getPost('login') !== null) {

            if (
                $this->validate([
                    'login' => 'required',
                    'password' => 'required'
                ])
            ) {

                $user = $model->login([
                    'login' => $this->request->getPost('login'),
                    'password' => $this->request->getPost('password')
                ]);

                if ($user) {
                    session()->set([
                        'user_id' => $user['id'],
                        'name' => $user['name'],
                        'role' => $user['role']
                    ]);

                    if ($user['role'] === 'admin') {
                        return redirect()->to(base_url('admin'));
                    }

                    return redirect()->to(base_url('publication'));
                }
            }

            //If login fails
            session()->setFlashdata('login_error', 'Los datos ingresados no son correctos.');
        }

        return redirect()->to(base_url());
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }

    // Muestra el formulario
    public function register()
    {
        echo view('header');
        echo view('user/register');
        echo view('footer');
    }

    // Guarda el usuario
    public function save()
    {
        $model = new \App\Models\UserModel();

        // Reglas: requerido, formato alfanumérico con guiones/puntos, y único en tabla 'user'
        $rules = [
            'login' => 'required|regex_match[/^[a-zA-Z0-9._-]+$/]|is_unique[user.login]',
            'name' => 'required'
        ];

        if (!$this->validate($rules)) {
            // Si falla, regresamos al registro con errores
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->save([
            'name' => $this->request->getPost('name'),
            'login' => $this->request->getPost('login'),
            'password' => $this->request->getPost('password'),
            'role' => 'user'
        ]);

        return redirect()->to(base_url())->with('success', 'Cuenta creada con éxito.');
    }

}