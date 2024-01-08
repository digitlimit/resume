<?php

namespace App\Http\Controllers\Resume;

use Illuminate\Http\Request;
use App\Http\Requests\Interest\StoreRequest;
use App\Http\Requests\Interest\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Services\Interest;
use Digitlimit\Alert\Facades\Alert;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resume.interest.index', [
            'page_title' => 'Interests',
            'interests' => Interest::paginate($this->authProfile()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //if user already have interest
//        if($this->authInterests()){
//            return redirect()
//                ->route('resume.interest.edit');
//        }

        return view('resume.interest.create', [
            'page_title' => 'Add Interest',
            'interest' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Interest\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try{
            if(Interest::create($request->all(), $this->authProfile()->id)) {
                Alert::form('Interest successfully Added', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.interest.index');
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
        //if user does not have interest
        if(!$interest = $this->authInterests($id)){
            return redirect()
                ->route('resume.interest.index');
        }

        return view('resume.interest.edit', [
            'page_title' => 'Edit Interest',
            'interest' => $interest
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Interest\UpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $interest = $request->only([
                'title',
                'icon',
                'detail'
            ]);

            if(Interest::update($interest, $this->authProfile()->id, $id)) {
                Alert::form('Interest successfully updated', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.interest.edit', [
                'interest' => $id
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
            if(Interest::destroy($this->authProfile()->id, $id)) {
                Alert::form('Interest successfully Deleted', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.interest.index');
    }
}
