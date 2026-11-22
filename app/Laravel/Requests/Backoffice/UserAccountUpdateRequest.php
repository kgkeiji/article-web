<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;

class UserAccountUpdateRequest extends RequestManager
{
    public function rules()
    {
        $id = auth('user')->id();

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password does not match.',
        ];
    }
}
