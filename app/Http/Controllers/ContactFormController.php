<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $contacts = ContactForm::all();
        $contacts = DB::table('contact_forms')
        ->select('id', 'name', 'title', 'contact', 'created_at')
        ->orderBy('id', 'desc')
        ->get();

        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new ContactForm;

        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->title = $request->input('title');
        $contact->contact = $request->input('contact');

        $contact->save();
        return redirect('contact/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = ContactForm::find($id);

        switch ($contact->gender) {
            case 0:
                $contact->gender = '男性';
                break;
            case 1:
                $contact->gender = '女性';
                break;
        }
        switch ($contact->age) {
            case 1:
                $contact->age = "~19歳";
                break;
            case 2:
                $contact->age = "19歳~29歳";
                break;
            case 3:
                $contact->age = "29歳~39歳";
                break;
            case 4:
                $contact->age = "39歳~49歳";
                break;
            case 5:
                $contact->age = "49歳~59歳";
                break;
            case 6:
                $contact->age = "60歳~";
                break;
        }

        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = ContactForm::find($id);
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = ContactForm::find($id);

        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->url = $request->input('url');
        $contact->gender = $request->input('gender');
        $contact->age = $request->input('age');
        $contact->title = $request->input('title');
        $contact->contact = $request->input('contact');

        $contact->save();
        return view('contact.show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = ContactForm::find($id);
        $contact->delete();
        return redirect('contact/index');
    }
}
