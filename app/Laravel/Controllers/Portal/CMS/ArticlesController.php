<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Http\Controllers\Controller;
use App\Laravel\Models\Article;
use App\Laravel\Requests\PageRequest;
use App\Laravel\Services\ImageUploader;

class ArticlesController extends Controller
{
    public function __construct() {}

    public function index(PageRequest $request)
    {
        $this->data['page_title'] = 'Portal Articles Page';
        $this->data['articles'] = Article::where('user_id', $request->user('user')->id)
            ->latest()
            ->get();

        return view('portal.cms.articles', $this->data);
    }

    public function store(PageRequest $request)
    {
        $this->validateArticle($request);

        $article = new Article();
        $article->user_id = $request->user('user')->id;
        $article->name = $request->input('name');
        $article->description = $request->input('description');

        if ($request->hasFile('image')) {
            $this->setArticleImage($article, $request);
        }

        $article->save();

        session()->flash('notification-status', 'success');
        session()->flash('notification-msg', 'Article published successfully.');

        return redirect()->route('portal.cms.articles');
    }

    public function update(PageRequest $request, $id)
    {
        $this->validateArticle($request);

        $article = Article::where('user_id', $request->user('user')->id)->findOrFail($id);
        $article->name = $request->input('name');
        $article->description = $request->input('description');

        if ($request->hasFile('image')) {
            $this->setArticleImage($article, $request);
        }

        $article->save();

        session()->flash('notification-status', 'success');
        session()->flash('notification-msg', 'Article updated successfully.');

        return redirect()->route('portal.cms.articles');
    }

    public function delete(PageRequest $request, $id)
    {
        $article = Article::where('user_id', $request->user('user')->id)->findOrFail($id);
        $article->delete();

        session()->flash('notification-status', 'success');
        session()->flash('notification-msg', 'Article deleted successfully.');

        return redirect()->route('portal.cms.articles');
    }

    private function validateArticle(PageRequest $request): void
    {
        $request->validate([
            'name' => ['required', 'string', 'max:30'],
            'description' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!is_string($value)) {
                        $fail('Article content is required.');
                        return;
                    }

                    $content = html_entity_decode(strip_tags($value), ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    if (trim($content) === '') {
                        $fail('Article content is required.');
                    }
                },
            ],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:5000'],
        ]);
    }

    private function setArticleImage(Article $article, PageRequest $request): void
    {
        $image = ImageUploader::uploadAutoResize($request->file('image'), 'uploads/articles/images');
        $article->path = $image['path'];
        $article->directory = $image['directory'];
        $article->filename = $image['filename'];
        $article->source = $image['source'];
    }
}
