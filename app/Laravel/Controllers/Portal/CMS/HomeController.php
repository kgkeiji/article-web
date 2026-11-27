<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Http\Controllers\Controller;
use App\Laravel\Models\CMS\Home;
use App\Laravel\Requests\PageRequest;
use DB;

class HomeController extends Controller

{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['sections'] = [
            'content_creation' => [
                'label' => 'Content Creation',
                'description' => 'Manage content that highlights your creative capabilities.',
                'title' => 'Content Creation',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'icon' => 'bi-pencil-square',
            ],
            'fresh_experience' => [
                'label' => 'Fresh Experience',
                'description' => 'Showcase the fresh and engaging experiences you offer.',
                'title' => 'Fresh Experience',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'icon' => 'bi-stars',
            ],
            'great_community' => [
                'label' => 'Great Community',
                'description' => 'Highlight your community and audience engagement.',
                'title' => 'Great Community',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'icon' => 'bi-people',
            ],
            'modern_design' => [
                'label' => 'Modern Design',
                'description' => 'Present your modern design approach and features.',
                'title' => 'Modern Design',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'icon' => 'bi-palette',
            ],
        ];

        $this->data['page_title'] = 'Portal Home Page';
        $this->data['homeSections'] = Home::all()->keyBy('section');
        return view('portal.cms.home', $this->data);
    }

    public function store(PageRequest $request)
    {
        $sections = ['content_creation', 'fresh_experience', 'great_community', 'modern_design'];

        DB::beginTransaction();

        try {
            foreach ($sections as $section) {
                Home::updateOrCreate(
                    ['section' => $section],
                    [
                        'title' => $request->input('title.' . $section),
                        'content' => $request->input('answer.' . $section),
                    ]
                );
            }

            DB::commit();

            session()->flash('notification-status', "success");
            session()->flash('notification-msg', "Successfully added article.");
            return redirect()->route('portal.cms.home');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('notification-status', "failed");
            session()->flash('notification-msg', "Server failed. Please try again later.");
            return redirect()->back();
        }
    }
}
