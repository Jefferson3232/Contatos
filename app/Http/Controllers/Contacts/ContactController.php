<?php

declare(strict_types=1);

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Contacts\Requests\StoreContactRequest;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function __construct(
        private readonly Contact $contactModel,
    ) {
    }

    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('contacts.index', ['contacts' => Contact::latest()->get()]);
    }

    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('contacts.create');
    }

    /**
     * @throws Exception
     */
    public function store(StoreContactRequest $request): RedirectResponse
    {
        $this->contactModel
            ->newQuery()
            ->create($request->toDTO()->toArray());

        return redirect()->route('contacts.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $contact = Contact::find($id);
        
        $this->authorize('delete', $contact);

        $contact->delete();

        return redirect(route('contacts.index'));
    }
}