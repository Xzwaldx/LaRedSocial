<?php namespace App\Controllers;

use App\Models\GalleryModel;

class Gallery extends BaseController
{
    public function upload()
    {
        $img = $this->request->getFile('image');

        // Validamos que el archivo sea una imagen válida
        if ($img->isValid() && !$img->hasMoved()) {
            // Genera un nombre aleatorio único (ej. 174920472_n.jpg) para que no se dupliquen archivos
            $newName = $img->getRandomName();
            
            // Lo mueve físicamente a la carpeta public/uploads/gallery
            $img->move(FCPATH . 'uploads/gallery', $newName);

            $model = new GalleryModel();
            $model->save([
                'user_id'   => session()->get('user_id'),
                'file_name' => $newName,
                'title'     => $this->request->getPost('title')
            ]);

            return redirect()->to(base_url('profile'))->with('success', 'Imagen subida con éxito.');
        }

        return redirect()->to(base_url('profile'))->with('error', 'No se pudo subir la imagen.');
    }

    public function delete($id)
    {
        $model = new GalleryModel();
        $image = $model->find($id);

        // Seguridad: Verificar que la foto exista y pertenezca al usuario logueado
        if ($image && $image['user_id'] == session()->get('user_id')) {
            // Eliminar el archivo físico de la carpeta en Windows
            $path = FCPATH . 'uploads/gallery/' . $image['file_name'];
            if (file_exists($path)) {
                unlink($path);
            }
            // Eliminar el registro de la base de datos
            $model->delete($id);
        }

        return redirect()->to(base_url('profile'));
    }
}