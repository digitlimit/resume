<?php

namespace App\Http\Controllers\Resume;

use Illuminate\Http\Request;
use App\Http\Requests\Skill\StoreRequest;
use App\Http\Requests\Skill\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Services\Skill;
use Digitlimit\Alert\Facades\Alert;

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

        //if user already have skill
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
                Alert::message('Skill successfully Added', 'Congratulations')
                    ->success()
                    ->flash();
            }
        }catch(\Exception $e){
            Alert::message($e->getMessage(), 'Opps')
                ->error()
                ->flash();
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
        //if user does not have skill
        if(!$skill = $this->authSkills($id)){
            return redirect()
                ->route('resume.skill.index');
        }

        return view('resume.skill.edit', [
            'page_title' => 'Edit Skill',
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
                'title',
                'detail',
                'percentage',
                'years',
                'icon'
            ]);

            if(Skill::update($skill, $this->authProfile()->id, $id)) {
                Alert::message('Skill successfully updated', 'Congratulations')
                    ->success()
                    ->flash();
            }
        }catch(\Exception $e){
            Alert::message($e->getMessage(), 'Opps')
                ->error()
                ->flash();
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
                Alert::message('Skill successfully Deleted', 'Congratulations')
                    ->success()
                    ->flash();
            }
        }catch(\Exception $e){
            Alert::message($e->getMessage(), 'Opps')
                ->error()
                ->flash();
        }

        return redirect()
            ->route('resume.skill.index');
    }
}
