<?php

namespace App\Http\Controllers\Resume;

use Illuminate\Http\Request;
use App\Http\Requests\Skill\StoreRequest;
use App\Http\Requests\Skill\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Service\Skill;
use Alert;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resume.skill.index', [
            'page_title' => 'Skills',
            'skills' => Skill::paginate($this->authProfile()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //if user already have contact
//        if($this->authSkills()){
//            return redirect()
//                ->route('resume.skill.edit');
//        }

        return view('resume.skill.create', [
            'page_title' => 'Add Skill',
            'skill' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Skill\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try{
            if(Skill::create($request->all(), $this->authProfile()->id)) {
                Alert::form('Skill successfully Added', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.skill.index');
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
        if(!$skill = $this->authSkills($id)){
            return redirect()
                ->route('resume.skill.index');
        }

        return view('resume.skill.edit', [
            'page_title' => 'Edit Contact',
            'skill' => $skill
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Skill\UpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $skill = $request->only([
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

            if(Skill::update($skill, $this->authProfile()->id, $id)) {
                Alert::form('Skill successfully updated', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.skill.edit', [
                'skill' => $id
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
        try{
            if(Skill::destroy($this->authProfile()->id, $id)) {
                Alert::form('Skill successfully Deleted', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.skill.index');
    }
}