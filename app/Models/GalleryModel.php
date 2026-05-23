<?php namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table      = 'gallery';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'file_name', 'title']; // Campos permitidos para guardar
}