<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // Jika sudah login, langsung ke dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/produk');
        }

        return view('auth/login');
    }

    public function attemptLogin()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Username dan password wajib diisi.');
        }

        $userModel = new UserModel();
        $user = $userModel->findByUsername($this->request->getPost('username'));

        if (!$user || !password_verify($this->request->getPost('password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
        }

        session()->set([
            'user_id'     => $user['id'],
            'nama'        => $user['nama'],
            'username'    => $user['username'],
            'role'        => $user['role'],
            'isLoggedIn'  => true,
        ]);

        return redirect()->to('/admin/produk')->with('success', 'Login berhasil, selamat datang ' . $user['nama']);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login')->with('success', 'Anda telah logout.');
    }
}
