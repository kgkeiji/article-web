<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Http\Controllers\Controller;
use App\Laravel\Models\CMS\About;
use App\Laravel\Requests\PageRequest;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller

{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['page-title'] = 'Portal About Page';
        $this->data['aboutSections'] = About::all()->keyBy('section');

        return view('portal.cms.about', $this->data);
    }

    public function store(PageRequest $request)
    {
        $sections = ['heading', 'tagline', 'team_intro', 'story', 'mission'];

        DB::transaction(function () use ($sections, $request) {
            foreach ($sections as $section) {
                About::updateOrCreate(
                    ['section' => $section],
                    [
                        'title' => $request->input('title.' . $section),
                        'content' => $request->input('answer.' . $section),
                    ]
                );
            }
        });

        session()->flash('notification-status', 'success');
        session()->flash('notification-msg', 'Successfully updated About page.');

        return redirect()->route('portal.cms.about');
    }
}
