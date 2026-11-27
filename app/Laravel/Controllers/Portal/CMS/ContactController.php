<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Http\Controllers\Controller;
use App\Laravel\Models\CMS\Contact;
use App\Laravel\Requests\PageRequest;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller

{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['page-title'] = 'Portal Contact Page';
        $this->data['contactSections'] = Contact::all()->keyBy('section');

        return view('portal.cms.contact', $this->data);
    }

    public function store(PageRequest $request)
    {
        $sections = ['heading', 'conversation', 'help', 'closing'];

        DB::transaction(function () use ($sections, $request) {
            foreach ($sections as $section) {
                Contact::updateOrCreate(
                    ['section' => $section],
                    [
                        'title' => $request->input('title.' . $section),
                        'content' => $request->input('answer.' . $section),
                    ]
                );
            }
        });

        session()->flash('notification-status', 'success');
        session()->flash('notification-msg', 'Successfully updated Contact page.');

        return redirect()->route('portal.cms.contact');
    }
}
