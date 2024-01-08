<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Services\User;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Digitlimit\Alert\Facades\Alert;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('user.index', [
            'page_title' => 'Users',
            'users' => User::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('user.create', [
            'page_title' => 'Add User',
            'user' => ''
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
            if(User::create($request->all())) {
                Alert::message('User successfully Added', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(Exception $e){
            Alert::message($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()->route('user.index');
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
     *
     * @param int $id
     * @return View|RedirectResponse
     */
    public function edit(int $id): View|RedirectResponse
    {
        try{
            return view('user.edit', [
                'page_title' => 'Edit User',
                'user' => User::findOrFail($id)
            ]);
        }catch(Exception $e){
            Alert::message($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()->route('user.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        try{
            $user = $request->only([
                'email',
                'password'
            ]);

            if(User::update($user, $id)) {
                Alert::message('User successfully updated', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(Exception $e){
            Alert::message($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()->route('user.edit', [
            'user' => $id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        try{
            if(User::destroy($id)) {
                Alert::message('User successfully Deleted', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(Exception $e){
            Alert::message($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()->route('user.index');
    }
}
