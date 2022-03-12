<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Services\CheckFormData;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreContactForm;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DB::table('contact_forms');

        if($search !== null) {
            $search_split = mb_convert_kana($search, 's'); // 全角スペースを半角にする
            $search_split2 = preg_split('/[\s]/', $search_split, -1, PREG_SPLIT_NO_EMPTY); // 文字列を空白で区切る
            foreach($search_split2 as $name_element) {
                $query->where('name', 'like', '%' . $name_element . '%');
            }
        }
        $contacts = $query->select('id', 'name', 'title', 'contact', 'created_at')
        ->orderBy('id', 'desc')
        ->paginate(10);

        // $contacts = ContactForm::all();

        // $contacts = DB::table('contact_forms')
        // ->select('id', 'name', 'title', 'contact', 'created_at')
        // ->orderBy('id', 'desc')
        // ->paginate(10);

        return view('contact.index', compact('contacts', 'search'));
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
    public function store(StoreContactForm $request)
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

        CheckFormData::checkGender($contact);
        CheckFormData::checkAge($contact);

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
