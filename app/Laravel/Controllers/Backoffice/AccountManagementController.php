<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Models\Admin;
use App\Laravel\Models\User;
use App\Laravel\Requests\Backoffice\AdminAccountRequest;
// use Illuminate\Support\Facades\DB;
use DB;


class AccountManagementController extends Controller
{
    public function __construct()
    {
        $this->data['page-title'] = "Account Management";
    }

    // index
    public function index(PageRequest $request)
    {
        $this->data['records'] = Admin::paginate(10);

        return view('backoffice.account-management.index', $this->data);
    }

    // index for portal
    public function index_portal(PageRequest $request)
    {
        $this->data['records'] = User::paginate(10);

        return view('backoffice.account-management.index-portal', $this->data);
    }

    // show
    public function show(PageRequest $request, $id = null)
    {
        $this->data['record'] = Admin::find($id);

        return view('backoffice.account-management.show', $this->data);
    }

    // edit
    public function edit(PageRequest $request, $id = null)
    {
        $this->data['record'] = Admin::find($id);

        return view('backoffice.account-management.edit', $this->data);
    }

    // update
    public function update(PageRequest $request, $id = null)
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
            return redirect()->route('backoffice.account-management.index');
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
        $user->forceDelete();

        session()->flash('notification-status', "success");
        session()->flash('notification-msg', "Account successfully deleted.");
        return redirect()->route('backoffice.account-management.index');
    }
}
