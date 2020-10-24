<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function create () {
        return view('pages.user.create', [
            'action' => route('user.store')
        ]);
    }

    public function store (UserRequest $req) {
        $data = $req->only([
            'name',
            'email',
            'password',
            'role',
            'phone',
            'address'
        ]);

        DB::beginTransaction();

        try {

            $data['password'] = Hash::make($data['password']);

            User::create($data);

            DB::commit();

            return redirect()->back()->with('success', 'Berhasil menambahkan user'); 

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
