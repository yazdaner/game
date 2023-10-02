<?php

namespace Yazdan\Contact\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Contact\App\Http\Requests\ContactRequest;
use Yazdan\Contact\App\Models\Contact;
use Yazdan\Contact\Repositories\ContactRepository;

class ContactController extends Controller
{
    public function index()
    {
        $this->authorize('manage', Contact::class);
        $contacts = ContactRepository::all();
        return view("Contact::admin.index", compact('contacts'));
    }


    public function destroy(Contact $contact)
    {
        $this->authorize('manage', Contact::class);

        $contact->delete();

        return AjaxResponses::SuccessResponses();
    }

    // front

    public function contact()
    {
        return view("Contact::front.contact");
    }
    public function store(ContactRequest $request)
    {
        ContactRepository::store($request);
        newFeedbacks();
        return redirect()->route('contact');
    }
}
