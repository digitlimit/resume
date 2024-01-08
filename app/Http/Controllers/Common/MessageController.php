<?php

namespace App\Http\Controllers\Common;

use App\Http\Requests\Message\PostComposeRequest;
use App\Http\Requests\Message\PostReplyRequest;
use App\Services\Message;
use App\Http\Controllers\Controller;
use Digitlimit\Alert\Facades\Alert;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     * @throws Exception
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
        if($message = Message::find($this->authUser()->id, $message)){
            $message->markAsRead();
        }

        return view('common.message.message', [
            'page_title' => 'Message',
            'message' => $message
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
        }catch(Exception $e){
            Alert::message($e->getMessage(), 'Opps')
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
     * @return Response
     */
    public function destroy($id)
    {
        try{
            if(Message::destroy($this->authProfile()->id, $id)) {
                Alert::message('Message successfully Deleted', 'Congratulations')
                    ->success()
                    ->closable();
            }
        }catch(Exception $e){
            Alert::message($e->getMessage())
                ->title('Oops')
                ->error()
                ->flash();
        }

        return redirect()
            ->route('common.message.index');
    }
}
