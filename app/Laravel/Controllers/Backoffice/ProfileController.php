<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Backoffice\AccountUpdateRequest;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->data['page-title'] = "Account Management";
    }

    // prof details
    public function index(PageRequest $request)
    {
        $this->data['record'] = auth('admin')->user();

        return view('backoffice.profile.profdetails', $this->data);
    }

    // prof edit
    public function edit(PageRequest $request, $id = null)
    {
        $this->data['record'] = auth('admin')->user();

        return view('backoffice.profile.profedit', $this->data);
    }

    // update
    public function update(AccountUpdateRequest $request)
    {
        DB::beginTransaction();

        try {
            $admin = auth('admin')->user();
            $admin->name = strtoupper($request->input('name'));
            $admin->email = strtolower($request->input('email'));

            if ($request->filled('password')) {
                $admin->password = bcrypt($request->input('password'));
            }

            $admin->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Profile successfully updated.");
            return redirect()->route('backoffice.profile.show');
        } catch (\Exception $e) {
            DB::rollback();

            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }
}
