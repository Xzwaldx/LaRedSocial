<?php
namespace App\Controllers;

use App\Models\PublicationModel;
use CodeIgniter\Controller;

class Publication extends Controller
{
    public function index()
    {
        $model = new PublicationModel();
        $data['posts'] = $model->show();

        echo view('header');
        echo view('Publication/all', $data);
        echo view('footer');
    }

public function add()
{
    $model = new PublicationModel();
    
    $user_id = session()->get('user_id');

    if (!$user_id) {
        return redirect()->to(base_url())->with('error', 'Debes iniciar sesión.');
    }

    $img = $this->request->getFile('image');
    $image_name = null; 

    if ($img && $img->isValid() && !$img->hasMoved()) {
        
        $image_name = $img->getRandomName();
        
        $img->move(FCPATH . 'uploads/gallery', $image_name);
    }

    
    $model->save([
        'user_id'    => $user_id,
        'content'    => $this->request->getPost('content'),
        'image_name' => $image_name 
    ]);

    
    return redirect()->to(base_url('publication'));
}

    public function edit($id)
    {
        $model = new PublicationModel();
        $data['publicacion'] = $model->get($id);

        echo view('header');
        echo view('Publication/edit', $data);
        echo view('footer');
    }

    public function update()
    {
        $model = new PublicationModel();
        $id = $this->request->getPost('id');
        $data = [
            'content' => $this->request->getPost('content'),
            'user_id' => $this->request->getPost('user_id')
        ];

        $model->update($id, $data);
        return redirect()->to(base_url('publication'));
    }

    public function delete($id)
    {
        $model = new PublicationModel();

        if ($model->find($id)) {
            $model->delete($id);
        }

        return redirect()->to(base_url('publication'));
    }
}