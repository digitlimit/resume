<?php

namespace App\Http\Controllers\Resume;

use Illuminate\Http\Request;
use App\Http\Requests\CoreValue\StoreRequest;
use App\Http\Requests\CoreValue\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Service\CoreValue;
use Alert;

class CoreValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resume.core_value.index', [
            'page_title' => 'Core Values',
            'core_values' => CoreValue::paginate($this->authProfile()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //if user already have contact
//        if($this->authCoreValues()){
//            return redirect()
//                ->route('resume.core_value.edit');
//        }

        return view('resume.core_value.create', [
            'page_title' => 'Add Core Value',
            'core_value' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CoreValue\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try{
            if(CoreValue::create($request->all(), $this->authProfile()->id)) {
                Alert::form('CoreValue successfully Added', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.core_value.index');
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
        if(!$core_value = $this->authCoreValues($id)){
            return redirect()
                ->route('resume.core_value.index');
        }

        return view('resume.core_value.edit', [
            'page_title' => 'Edit Core value',
            'core_value' => $core_value
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CoreValue\UpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $core_value = $request->only([
                'title',
                'detail',
                'icon',
            ]);

            if(CoreValue::update($core_value, $this->authProfile()->id, $id)) {
                Alert::form('CoreValue successfully updated', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.core_value.edit', [
                'core_value' => $id
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
            if(CoreValue::destroy($this->authProfile()->id, $id)) {
                Alert::form('Core Value successfully Deleted', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.core_value.index');
    }
}