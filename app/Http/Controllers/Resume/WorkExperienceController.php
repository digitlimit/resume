<?php

namespace App\Http\Controllers\Resume;

use Illuminate\Http\Request;
use App\Http\Requests\WorkExperience\StoreRequest;
use App\Http\Requests\WorkExperience\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Service\WorkExperience;
use Alert;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resume.work_experience.index', [
            'page_title' => 'Work Experiences',
            'work_experiences' => WorkExperience::paginate($this->authProfile()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //if user already have contact
//        if($this->authWorkExperiences()){
//            return redirect()
//                ->route('resume.work_experience.edit');
//        }

        return view('resume.work_experience.create', [
            'page_title' => 'Add Work Experience',
            'work_experience' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WorkExperience\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try{
            if(WorkExperience::create($request->all(), $this->authProfile()->id)) {
                Alert::form('Work Experience successfully Added', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.work_experience.index');
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

            if(WorkExperience::update($contact, $this->authProfile()->id)) {
                Alert::form('Work Experience successfully updated', 'Congratulations')
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
