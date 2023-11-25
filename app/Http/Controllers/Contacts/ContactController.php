<?php

declare(strict_types=1);

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Contacts\Requests\StoreContactRequest;
use App\Http\Controllers\Contacts\Requests\UpdateContactRequest;
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
        return view('contacts.index', ['contacts' => Contact::where('user_id', auth()->id())->latest()->get()]);
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

        return redirect()->route('contacts.index')->with('success', 'Contato criado com sucesso!');
    }

    public function edit(int $id): View
    {
        $contact = $this->contactModel
            ->newQuery()
            ->find($id);

        return view('contacts.edit', [
            'contact' => $contact
        ]);
    }

    public function update(UpdateContactRequest $request)
    {
        $dto = $request->toDTO();

        $contact = $this->contactModel
            ->newQuery()
            ->find($dto->contactId);

        $this->authorize('update', $contact);

        $contact->update([
            'name' => $dto->name,
            'email' => $dto->email,
            'cell_phone' => $dto->cellPhone,
        ]);

        return redirect(route('contacts.index'))->with('success', 'Contato atualizado com sucesso!');
    }


    public function destroy(int $id): RedirectResponse
    {
        $contact = $this->contactModel
            ->newQuery()
            ->find($id);

        $this->authorize('delete', $contact);

        $contact->delete();

        return redirect(route('contacts.index'))->with('success', 'Contato removido com sucesso!');
    }
}
