<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Http\Controllers\Controller;
use App\Laravel\Requests\PageRequest;

class ArticleController extends Controller

{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['page-title'] = 'Portal Article Page';
        return view('portal.cms.articles', $this->data);
    }
}
