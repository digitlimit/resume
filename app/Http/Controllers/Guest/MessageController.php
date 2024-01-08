<?php

namespace App\Http\Controllers\Guest;

use App\Http\Requests\Guest\PostMessageRequest;
use App\Services\Message;
use App\Http\Controllers\Controller;
use Digitlimit\Alert\Facades\Alert;

class MessageController extends Controller
{
    /**
     * @param PostMessageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postMessage(PostMessageRequest $request)
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
                    ->flash();
            }
        }catch(\Exception $e){
            Alert::message($e->getMessage(), 'Opps')
                ->error()
                ->flash();
        }

        return redirect()
            ->route('landing.index');
    }
}
