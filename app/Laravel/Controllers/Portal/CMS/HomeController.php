<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Http\Controllers\Controller;
use App\Laravel\Models\CMS_Home;
use App\Laravel\Requests\PageRequest;
use DB;

class HomeController extends Controller

{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['page-title'] = 'Portal Home Page';
        return view('portal.cms.home', $this->data);
    }

    public function store(PageRequest $request)
    {
        DB::beginTransaction();

        try {
            $cms = new CMS_Home();
            $cms->title = ($request->input('title'));
            $cms->content = ($request->input('answer'));
            $cms->save();

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Successfully registered.");
            return redirect()->route('portal.profile.show');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }
}
