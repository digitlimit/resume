<?php

namespace App\Http\Controllers\Resume;

use Illuminate\Http\Request;
use App\Http\Requests\Portfolio\StoreRequest;
use App\Http\Requests\Portfolio\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Services\Portfolio;
use Digitlimit\Alert\Facades\Alert;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resume.portfolio.index', [
            'page_title' => 'Portfolios',
            'portfolios' => Portfolio::paginate($this->authProfile()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //if user already have portfolio
//        if($this->authPortfolios()){
//            return redirect()
//                ->route('resume.portfolio.edit');
//        }

        return view('resume.portfolio.create', [
            'page_title' => 'Add Portfolio',
            'portfolio' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Portfolio\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try{
            if(Portfolio::create($request->all(), $this->authProfile()->id)) {
                Alert::form('Portfolio successfully Added', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.portfolio.index');
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
        //if user does not have portfolio
        if(!$portfolio = $this->authPortfolios($id)){
            return redirect()
                ->route('resume.portfolio.index');
        }

        return view('resume.portfolio.edit', [
            'page_title' => 'Edit Portfolio',
            'portfolio' => $portfolio
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Portfolio\UpdateRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $portfolio = $request->only([
                'title',
                'detail',
                'url',
                'icon'
            ]);

            if(Portfolio::update($portfolio, $this->authProfile()->id, $id)) {
                Alert::form('Portfolio successfully updated', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.portfolio.edit', [
                'portfolio' => $id
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
            if(Portfolio::destroy($this->authProfile()->id, $id)) {
                Alert::form('Portfolio successfully Deleted', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('resume.portfolio.index');
    }
}
