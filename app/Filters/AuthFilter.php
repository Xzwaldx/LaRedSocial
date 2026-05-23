<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si NO existe la variable user_id en la sesión (cookie inválida o inexistente)
        if (!session()->get('user_id')) {
            // Lo mandamos al login con un mensaje de error
            return redirect()->to(base_url('/'))->with('login_error', 'Debes iniciar sesión primero.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se requiere acción después
    }
}