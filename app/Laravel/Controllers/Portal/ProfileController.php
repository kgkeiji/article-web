<?php

namespace App\Laravel\Controllers\Portal;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Requests\Portal\AccountUpdateRequest;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->data['page-title'] = "Profile Management";
    }

    // prof details
    public function index(PageRequest $request)
    {
        $this->data['record'] = auth('user')->user();

        return view('portal.profile.profdetails', $this->data);
    }

    // prof edit
    public function edit(PageRequest $request, $id = null)
    {
        $this->data['record'] = auth('user')->user();

        return view('portal.profile.profedit', $this->data);
    }

    // update
    public function update(AccountUpdateRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = auth('user')->user();
            $user->name = strtoupper($request->input('name'));
            $user->email = strtolower($request->input('email'));

            if ($request->filled('password')) {
                $user->password = bcrypt($request->input('password'));
            }

            $user->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Profile successfully updated.");
            return redirect()->route('portal.profile.show');
        } catch (\Exception $e) {
            DB::rollback();

            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }
}
