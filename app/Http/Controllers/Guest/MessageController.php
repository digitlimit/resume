<?php

namespace App\Http\Controllers\Guest;

use App\Http\Requests\Guest\PostMessageRequest;
use App\Service\Message;
use App\Http\Controllers\Controller;
use Alert;

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
}
