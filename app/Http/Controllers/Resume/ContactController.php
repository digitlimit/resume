<?php

namespace App\Http\Controllers\Resume;

use App\Http\Requests\Contact\UpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreRequest;
use App\Service\Contact;
use Alert;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //if user already have contact
        if($this->authContact()){
            return redirect()
                ->route('resume.contact.edit');
        }

        return view('resume.contact.create', [
            'page_title' => 'Create Contact',
            'contact' => $this->authContact()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Contact\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try{
            if(Contact::create($request->all(), $this->authProfile()->id)) {
                Alert::form('Contact successfully created', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.contact.edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id=null)
    {
        //if user does not have contact
        if(!$this->authContact()){
            return redirect()
                ->route('resume.contact.create');
        }

        return view('resume.contact.edit', [
            'page_title' => 'Edit Contact',
            'contact' => $this->authContact()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Contact\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id=null)
    {
        try{
            $contact = $request->only([
                'address_1',
                'address_2',
                'phone_number',
                'mobile_number',
                'email'
            ]);

            if(Contact::update($contact, $this->authProfile()->id)) {
                Alert::form('Contact successfully updated', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.contact.edit');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
