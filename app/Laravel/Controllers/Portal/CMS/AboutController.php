<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Http\Controllers\Controller;
use App\Laravel\Models\CMS\About;
use App\Laravel\Requests\PageRequest;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller

{
    public function __construct()
    {
        $this->data['sections'] = [
            'heading' => [
                'label' => 'Page Heading',
                'description' => 'The main heading at the top of the About page.',
                'title' => 'About Us',
                'content' => '',
                'icon' => 'bi-type',
            ],
            'tagline' => [
                'label' => 'Tagline',
                'description' => 'The introductory statement below the heading.',
                'title' => '',
                'content' => 'Manage, organize, and publish articles with ease.',
                'icon' => 'bi-chat-quote',
            ],
            'team_intro' => [
                'label' => 'Team Introduction',
                'description' => 'The introduction to the team.',
                'title' => '',
                'content' =>
                'We are a team of passionate developers dedicated to creating amazing web applications with Laravel.',
                'icon' => 'bi-people',
            ],
            'story' => [
                'label' => 'About TheArticle',
                'description' => 'The main description of the platform.',
                'title' => '',
                'content' =>
                'TheArticle is a platform dedicated to sharing knowledge, exploring ideas, and bringing meaningful stories to readers. We believe that every article has the power to inform, inspire, and spark conversations. Our goal is to make discovering and sharing valuable content a simple and enjoyable experience. Whether you are looking for fresh perspectives, informative reads, or interesting topics, TheArticle brings stories together in one place.',
                'icon' => 'bi-book',
            ],
            'mission' => [
                'label' => 'Our Mission',
                'description' => 'The mission statement shown at the bottom of the page.',
                'title' => 'Our Mission',
                'content' =>
                'We aim to create a space where information is accessible, ideas are celebrated, and stories can reach the people who need them. Through thoughtful content and a seamless reading experience, we strive to make every visit worthwhile.',
                'icon' => 'bi-bullseye',
            ],
        ];
    }

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
