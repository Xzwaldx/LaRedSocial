<?php namespace App\Models;

use CodeIgniter\Model;

class PublicationModel extends Model 
{
    protected $table = 'publication'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['content', 'user_id', 'image_name']; // Campos permitidos para guardar

    public function get($id = false)
    {
        $builder = $this->db->table($this->table);
        $builder->select('publication.*, user.name as user_name');
        $builder->join('user', 'user.id = publication.user_id');

        if ($id === false)
        {
            return $builder->get()->getResultArray();
        }

        return $builder->where(['publication.id' => $id])->get()->getRowArray();
    }

    public function show()
{
    $db = \Config\Database::connect();
    
    $builder = $this->db->table('publication');
    
    $builder->select('publication.*, user.name as user_name');
    
    $builder->join('user', 'user.id = publication.user_id');
    
    $builder->orderBy('publication.id', 'DESC');
    
    return $builder->get()->getResultArray();
}
}
