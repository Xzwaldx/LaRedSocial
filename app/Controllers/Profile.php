<?php namespace App\Controllers;

use App\Models\PublicationModel;

class Profile extends BaseController
{
    public function index()
    {
        $model = new PublicationModel();
        $user_id = session()->get('user_id');

        // Conectamos a la DB para traer tus publicaciones con tu nombre de usuario
        $db = \Config\Database::connect();
        $builder = $db->table('publication');
        $builder->select('publication.*, user.name as user_name');
        $builder->join('user', 'user.id = publication.user_id');
        
        // Solo  las publicaciones del usuario de la sesión
        $builder->where('publication.user_id', $user_id);
        $builder->orderBy('publication.posted_time', 'DESC');
        
        $data['posts'] = $builder->get()->getResultArray();
        $data['user_name'] = session()->get('name');

        echo view('header');
        echo view('profile/index', $data); // Mandamos los datos a la vista del perfil
        echo view('footer');
    }
}