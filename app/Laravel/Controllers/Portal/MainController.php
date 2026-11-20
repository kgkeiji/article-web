<?php

namespace App\Laravel\Controllers\Portal;

use App\Laravel\Requests\PageRequest;

class MainController extends Controller
{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['page-title'] = 'Dashboard';
        return view('portal.cms.home', $this->data);
    }

    public function about(PageRequest $request)
    {
        $this->data['page-title'] = 'Portal About Page';
        return view('portal.cms.about', $this->data);
    }

    public function contact(PageRequest $request)
    {
        $this->data['page-title'] = 'Portal Contact Page';
        return view('portal.cms.contact', $this->data);
    }

    public function articles(PageRequest $request)
    {
        $this->data['page-title'] = 'Portal Contact Page';
        return view('portal.cms.articles', $this->data);
    }

    public function article(PageRequest $request)
    {
        $this->data['page-title'] = 'Portal Contact Page';
        return view('portal.cms.article', $this->data);
    }
}
