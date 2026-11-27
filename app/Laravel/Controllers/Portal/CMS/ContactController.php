<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Http\Controllers\Controller;
use App\Laravel\Models\CMS\Contact;
use App\Laravel\Requests\PageRequest;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller

{
    public function __construct()
    {
        $this->data['sections'] = [
            'heading' => [
                'label' => 'Page Heading',
                'description' => 'The main heading and introduction at the top of the Contact page.',
                'title' => 'Get in Touch',
                'content' =>
                "<p>Have a question, suggestion, or something worth sharing?<br>We'd love to hear from you.</p>",
                'icon' => 'bi-chat-quote',
            ],
            'conversation' => [
                'label' => 'Conversation',
                'description' => 'The opening message in the Contact page information panel.',
                'title' => "Let's start a conversation.",
                'content' =>
                "Whether you have feedback about our articles, need assistance,\nor simply want to connect, feel free to send us a message.\nWe're always happy to hear from our readers.",
                'icon' => 'bi-chat-dots',
            ],
            'help' => [
                'label' => 'Help Topics',
                'description' => 'The heading and list of topics in the Contact page information panel.',
                'title' => 'What can we help you with?',
                'content' =>
                '<ul><li>Article inquiries and suggestions</li><li>Feedback and recommendations</li><li>Technical support and assistance</li><li>General questions and collaborations</li></ul>',
                'icon' => 'bi-list-check',
            ],
            'closing' => [
                'label' => 'Closing Message',
                'description' => 'The highlighted message at the bottom of the information panel.',
                'title' => '',
                'content' =>
                'Your thoughts matter. Every message helps us make TheArticle a better place for readers and creators.',
                'icon' => 'bi-heart',
            ],
        ];
    }

    public function index(PageRequest $request)
    {
        $this->data['page_title'] = 'Portal Contact Page';
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
