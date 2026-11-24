<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Models\Admin;
use App\Laravel\Models\User;
use App\Laravel\Requests\Backoffice\AccountUpdateRequest;
use Illuminate\Support\Facades\DB;
// use DB;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->data['page-title'] = "Account Management";
    }

    // index portal
    public function index(PageRequest $request)
    {
        $this->data['records'] = User::paginate(10);

        return view('backoffice.user-management.index', $this->data);
    }

    // show portal
    public function show(PageRequest $request, $id = null)
    {
        $this->data['record'] = User::find($id);

        return view('backoffice.user-management.show', $this->data);
    }

    // edit portal
    public function edit(PageRequest $request, $id = null)
    {
        $this->data['record'] = User::find($id);

        return view('backoffice.user-management.edit', $this->data);
    }

    // update portal users
    public function update(AccountUpdateRequest $request, $id = null)
    {
        DB::beginTransaction();

        try {
            $user = User::find($id);
            $user->name = strtoupper($request->input('name'));
            $user->email = strtolower($request->input('email'));
            $user->password = bcrypt($request->input('password'));
            $user->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Successfully updated.");
            return redirect()->route('backoffice.user-management.update');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }

    public function delete(PageRequest $request, $id = null)
    {
        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('notification-status', "success");
        session()->flash('notification-msg', "User account successfully deleted.");
        return redirect()->route('backoffice.user-management.index');
    }
}
