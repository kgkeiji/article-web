<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Requests\PageRequest;

class MainController extends Controller
{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['page-title'] = 'Dashboard';
        return view('backoffice.dashboard', $this->data);
    }

    public function profdetails(PageRequest $request)
    {
        $this->data['page-title'] = 'Dashboard';
        return view('backoffice.profile.profdetails', $this->data);
    }

    public function profedit(PageRequest $request)
    {
        $this->data['page-title'] = 'Dashboard';
        return view('backoffice.profile.profedit', $this->data);
    }

    public function home(PageRequest $request)
    {
        $this->data['page-title'] = 'Backoffice - Home Page';
        return view('backoffice.home', $this->data);
    }

    public function about(PageRequest $request)
    {
        $this->data['page-title'] = 'Backoffice About Page';
        return view('backoffice.about', $this->data);
    }

    public function contact(PageRequest $request)
    {
        $this->data['page-title'] = 'Backoffice Contact Page';
        return view('backoffice.contact', $this->data);
    }
}
