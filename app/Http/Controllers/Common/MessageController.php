<?php

namespace App\Http\Controllers\Common;

use App\Http\Requests\Message\PostComposeRequest;
use App\Http\Requests\Message\PostReplyRequest;
use App\Service\Message;
use App\Http\Controllers\Controller;
use Alert;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('common.message.index', [
            'page_title' => 'Messages',
            'messages' => Message::paginate($this->authUser()->id)
        ]);
    }

    public function getReply()
    {

    }

    public function postReply()
    {

    }

    public function getCompose()
    {

    }

    public function getMessage($message)
    {
        return view('common.message.message', [
            'page_title' => 'Message',
            'message' => Message::find($this->authUser()->id, $message)
        ]);
    }


    /**
     * @param PostComposeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCompose(PostComposeRequest $request)
    {
        try{
            $message = $request->only([
                'name',
                'email',
                'subject',
                'message'
            ]);

            //TODO: who is message going to?
            //TODO: for now goes to default user_id = 1, admin
            $user_id = 1;

            if(Message::compose($message, $user_id)) {
                Alert::modal('Message successfully sent', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('landing.index');
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
            if(Message::destroy($this->authProfile()->id, $id)) {
                Alert::form('Message successfully Deleted', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(\Exception $e){
            Alert::form($e->getMessage(), 'Opps')
                ->error()
                ->closable();
        }

        return redirect()
            ->route('common.message.index');
    }
}
