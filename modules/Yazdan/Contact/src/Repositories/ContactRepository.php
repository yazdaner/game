<?php

namespace Yazdan\Contact\Repositories;

use Yazdan\Contact\App\Models\Contact;

class ContactRepository
{

    public static function all()
    {
        return Contact::query()->get();
    }

    public static function store($data)
    {
        return Contact::create([
            'name' => $data->name,
            'email' => $data->email,
            'phone' => $data->phone,
            'msg' => $data->msg,
        ]);
    }

    public function delete($id)
    {
        Contact::where('id', $id)->delete();
    }
}



