<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Models\Admin;
use App\Laravel\Models\User;
use App\Laravel\Requests\Backoffice\AccountUpdateRequest;
use Illuminate\Support\Facades\DB;
// use DB;

class AdminManagementController extends Controller
{
    public function __construct()
    {
        $this->data['page-title'] = "Account Management";
    }

    // index admin
    public function index(PageRequest $request)
    {
        $this->data['records'] = Admin::paginate(10);

        return view('backoffice.admin-management.index', $this->data);
    }

    // show admin
    public function show(PageRequest $request, $id = null)
    {
        $this->data['record'] = Admin::find($id);

        return view('backoffice.admin-management.show', $this->data);
    }

    // edit
    public function edit(PageRequest $request, $id = null)
    {
        $this->data['record'] = Admin::find($id);

        return view('backoffice.admin-management.edit', $this->data);
    }

    // update admin backoffice
    public function update(AccountUpdateRequest $request, $id = null)
    {
        DB::beginTransaction();

        try {
            $user = Admin::find($id);
            $user->name = strtoupper($request->input('name'));
            $user->email = strtolower($request->input('email'));
            $user->password = bcrypt($request->input('password'));
            $user->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Successfully updated.");
            return redirect()->route('backoffice.admin-management.index');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }

    public function delete(PageRequest $request, $id = null)
    {
        $user = Admin::findOrFail($id);
        $user->delete();

        session()->flash('notification-status', "success");
        session()->flash('notification-msg', "User account successfully deleted.");
        return redirect()->route('backoffice.admin-management.index');
    }
}
