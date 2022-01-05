<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsletterRequest;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    protected $newsletterObject;

    public function __construct()
    {
        $this->newsletterObject = new Newsletter();
    }

    public function index()
    {
        $news = Newsletter::latest()->get();
        return view('backend.admin.newsletter', compact('news'));
    }

    public function store(NewsletterRequest $request)
    {
        $this->newsletterObject->storeNewsletter($request);
        return back();
    }

    public function edit(Newsletter $newsletter)
    {
        $news = Newsletter::latest()->get();
        return view('backend.admin.newsletter', compact('news', 'newsletter'));
    }

    public function update(NewsletterRequest $request, Newsletter $newsletter)
    {
        $this->newsletterObject->updateNewsletter($request, $newsletter);
        return back();
    }

    public function destroy(Newsletter $newsletter)
    {
        $this->newsletterObject->destroyNewsletter($newsletter);
        return back();
    }
}
