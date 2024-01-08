<?php

namespace App\Http\Controllers\Resume;

use App\Http\Requests\Summary\UpdateRequest;
use App\Http\Requests\Summary\StoreRequest;
use App\Http\Controllers\Controller;
use App\Services\Summary;
use Digitlimit\Alert\Facades\Alert;

class SummaryController extends Controller
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
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($this->authSummary()){
            return redirect()
                ->route('resume.summary.edit');
        }

        return view('resume.summary.create', [
            'page_title' => 'Summary',
            'summary' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Summary\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try{
            if(Summary::create($request->all(), $this->authProfile()->id)) {
                Alert::message('Summary successfully created', 'Congratulations')
                    ->success()
                    ->flash();
            }
        }catch(\Exception $e){
            Alert::message($e->getMessage(), 'Opps')
                ->error()
                ->flash();
        }

        return redirect()
            ->route('resume.summary.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        //if user does not have summary
        if(!$summary = $this->authSummary()){
            return redirect()
                ->route('resume.summary.create');
        }

        return view('resume.summary.edit', [
            'page_title' => 'Summary',
            'summary' => $summary
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Summary\UpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id=null)
    {
        try{
            $summary = $request->only([
                "title",
                "icon",
                "detail"
            ]);

            if(Summary::update($summary, $this->authProfile()->id)) {
                Alert::message('Summary successfully updated', 'Congratulations')
                    ->success()
                    ->flash();
            }
        }catch(\Exception $e){
            Alert::message($e->getMessage(), 'Opps')
                ->error()
                ->flash();
        }

        return redirect()
            ->route('resume.summary.edit');
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
