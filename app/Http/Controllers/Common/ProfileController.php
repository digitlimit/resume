<?php
declare(strict_types=1);

namespace App\Http\Controllers\Common;

use App\Http\Requests\Profile\StoreRequest;
use App\Http\Requests\Profile\UpdateRequest;
use App\Services\Profile;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Digitlimit\Alert\Facades\Alert;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    public function index(Request $request): RedirectResponse
    {
        if($request->user()->profile){
            return redirect()->route('common.profile.edit');
        }

        return redirect()->route('common.profile.create');
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @return RedirectResponse|View
     */
    public function create(Request $request): RedirectResponse|View
    {
        if($request->user()->profile){
            return redirect()->route('common.profile.edit');
        }

        return view('common.profile.create', [
            'page_title' => 'Create Profile'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        try{
            $profile = Profile::create($request->validated(), $request->user()->id);

            if ($profile) {
                Alert::message('Profile successfully created', 'Congratulations')
                    ->success()
                    ->flash();
            }
        }catch(\Exception $e){
            Alert::message($e->getMessage(), 'Opps')
                ->error()
                ->flash();
        }

        return redirect()->route('common.profile.edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request, $id=null)
    {
        //if user does not have profile
        if(!$request->user()->profile){
            return redirect()
                ->route('common.profile.create');
        }

        return view('common.profile.edit', [
            'page_title' => 'Edit Profile'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Profile\UpdateRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateRequest $request, $id=null)
    {
        try{
            $profile = $request->only([
                'title',
                'job_title',
                'first_name',
                'last_name',
                'other_names',
                'photo'
            ]);

            if(Profile::update($profile, $request->user()->id)) {
                Alert::message('Profile successfully updated', 'Congratulations')
                    ->success()
                    ->flash();
            }
        }catch(\Exception $e){
            Alert::message($e->getMessage(), 'Opps')
                ->error()
                ->flash();
        }

        return redirect()
            ->route('common.profile.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Log user out
     *
     * @return RedirectResponse
     */
    public function signout(){

        auth()->logout();

        Alert::message('Signout was done!', 'Cool :)')
            ->success()
            ->flash();

        return redirect()
            ->route('landing.index');
    }
}
