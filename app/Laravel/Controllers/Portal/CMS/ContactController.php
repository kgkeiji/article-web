<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Http\Controllers\Controller;
use App\Laravel\Requests\PageRequest;

class ContactController extends Controller

{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['page-title'] = 'Portal Contact Page';
        return view('portal.cms.contact', $this->data);
    }
}
