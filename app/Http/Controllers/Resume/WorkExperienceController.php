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
    public function edit(Request $request, $id)
    {
        //if user does not have contact
        if(!$work_experience = $this->authWorkExperiences($id)){
            return redirect()
                ->route('resume.work_experience.index');
        }

        return view('resume.work_experience.edit', [
            'page_title' => 'Edit Contact',
            'work_experience' => $work_experience
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WorkExperience\UpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $work_experience = $request->only([
                'job_title',
                'job_description',
                'start_month',
                'start_year',
                'end_month',
                'end_year',
                'company_name',
                'company_info',
                'company_address',
                'icon'
            ]);

            if(WorkExperience::update($work_experience, $this->authProfile()->id, $id)) {
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
            ->route('resume.work_experience.edit', [
                'work_experience' => $id
            ]);
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
