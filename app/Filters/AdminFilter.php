<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // 1. Si ni siquiera ha iniciado sesión, mándalo al login
        if (!session()->get('user_id')) {
            return redirect()->to(base_url());
        }

        // 2. Si tiene sesión pero NO es admin, expúlsalo al muro general
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('publication'))->with('error', 'No tienes permisos de administrador.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se necesita lógica después de la petición
    }
}