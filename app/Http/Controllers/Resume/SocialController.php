<?php

namespace App\Http\Controllers\Resume;

use Illuminate\Http\Request;
use App\Http\Requests\Social\StoreRequest;
use App\Http\Requests\Social\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Service\Social;
use Alert;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resume.social.index', [
            'page_title' => 'Socials',
            'socials' => Social::paginate($this->authProfile()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //if user already have contact
//        if($this->authSocials()){
//            return redirect()
//                ->route('resume.social.edit');
//        }

        return view('resume.social.create', [
            'page_title' => 'Add Social',
            'social' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Social\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try{
            if(Social::create($request->all(), $this->authProfile()->id)) {
                Alert::form('Social successfully Added', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.social.index');
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
        //if user does not have social
        if(!$social = $this->authSocials($id)){
            return redirect()
                ->route('resume.social.index');
        }

        return view('resume.social.edit', [
            'page_title' => 'Edit Social',
            'social' => $social
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Social\UpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $social = $request->only([
                'name',
                'icon',
                'url'
            ]);

            if(Social::update($social, $this->authProfile()->id, $id)) {
                Alert::form('Social successfully updated', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.social.edit', [
                'social' => $id
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
            if(Social::destroy($this->authProfile()->id, $id)) {
                Alert::form('Social successfully Deleted', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.social.index');
    }
}