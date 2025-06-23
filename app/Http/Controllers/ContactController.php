<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $contactQuery = Contact::where('user_id', auth()->id());

        if ($search = $request->search) {
            $contactQuery->where(function ($q) use ($search) {
                $q->where('ime', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('broj', 'LIKE', "%$search%");
            });
        }

        $contacts = $contactQuery->get();

        return response()->json($contacts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request): JsonResponse
    {
        $userId = auth()->id();

        $contact = Contact::create(array_merge($request->validated(), [
            'user_id' => $userId
        ]));

        return response()->json($contact);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact): JsonResponse
    {
        if ($contact->user_id !== auth()->id()) {
            return response()->json('Forbidden.', 403);
        }

        return response()->json($contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact): JsonResponse
    {
        if ($contact->user_id !== auth()->id()) {
            return response()->json('Forbidden.', 403);
        }

        $contact->update($request->validated());

        return response()->json($contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): JsonResponse
    {
        if ($contact->user_id !== auth()->id()) {
            return response()->json('Forbidden.', 403);
        }

        $contact->delete();

        return response()->json([], 204);
    }
}
