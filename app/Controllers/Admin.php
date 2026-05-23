<?php
namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    // Muestra la lista de usuarios
    public function index()
    {
        $model = new UserModel();
        // Trae todos los usuarios menos al admin mismo
        $data['users'] = $model->where('role !=', 'admin')->findAll();

        echo view('header');
        echo view('admin/dashboard', $data);
        echo view('footer');
    }

    // Borra un usuario y sus publicaciones por cascada
    public function delete_user($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to(base_url('admin'))->with('success', 'Usuario eliminado.');
    }

    // Procesa la actualización asíncrona de un campo de usuario
    public function update_user()
    {
        $id = $this->request->getPost('id');
        $field = $this->request->getPost('field');
        $value = $this->request->getPost('value');

        $model = new \App\Models\UserModel();

        // Validamos que los campos permitidos sean estrictamente name o login
        if (in_array($field, ['name', 'login']) && !empty($id)) {
            $model->update($id, [$field => $value]);
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setJSON(['status' => 'error']);
    }

}