<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversation;
use App\ConversationParticipant;
use App\ConversationThread;
use App\UserCompany;
use DB; 
use Session; 
use Touch; 

class ConversationController extends Controller
{
    public function save_message(Request $request){

        $message = $request->input("message");
        $userSender = Session::get('userData'); 
        $activeContact= $request->input("activeContact"); 
        $userReceiver = UserCompany::where('username', $activeContact)->first();

        $senderConvo = ConversationParticipant::where('user_id', $userSender->pofsis_user_id)->pluck('conversation_id');
        $receiverConvo = ConversationParticipant::where('user_id', $userReceiver->pofsis_user_id)->pluck('conversation_id');

        $senderCount = sizeof($senderConvo);
        $receiverCount = sizeof($receiverConvo);

        if($senderCount == 0 || $receiverCount == 0){
            return $this->createNewConversationRecord($message, $userSender, $userReceiver); 
            echo "no existing record"; 
        }

        foreach($senderConvo as $key  => $value) 
        { 
            foreach($receiverConvo as $key1  => $value1) 
            { 
                if( $senderConvo[$key] == $receiverConvo[$key1]) 
                { 
                    $isConvoExisting = 1; 
                    $conversationID = $senderConvo[$key]; 
                    return $this->saveToDatabase($message, $userSender, $userReceiver, $conversationID);
                } 

                else{
                    $isConvoExisting = 0; 
                }
            } 
        }

        if(!$isConvoExisting){
            return $this->createNewConversationRecord($message, $userSender, $userReceiver); 
        }
    }

    public function createNewConversationRecord($message, $userSender, $userReceiver){
        $conversation = new Conversation(); 
        $conversation->save(); 

        $conversationParticipant = new ConversationParticipant();
        $conversationParticipant->conversation_id = $conversation->id; 
        $conversationParticipant->user_id = $userSender->pofsis_user_id; 
        $conversationParticipant->nickname = $userSender->username;
        $conversationParticipant->save(); 

        $conversationParticipant = new ConversationParticipant();
        $conversationParticipant->conversation_id = $conversation->id; 
        $conversationParticipant->user_id = $userReceiver->pofsis_user_id; 
        $conversationParticipant->nickname = $userReceiver->username;
        $conversationParticipant->save();

        $conversationID =  $conversation->id; 
        return $this->saveToDatabase($message, $userSender, $userReceiver, $conversationID);
    }


    public function saveToDatabase($message, $userSender, $userReceiver, $conversationID){
        $conversationThread = new ConversationThread(); 
        $conversationThread->conversation_id = $conversationID; 
        $conversationThread->conversation_participant_id = $userReceiver->pofsis_user_id; 
        $conversationThread->message= $message; 
        $conversationThread->created_by = $userSender->pofsis_user_id; 

        $participantTransaction = ConversationParticipant::where('conversation_id', $conversationID)->get();
        foreach($participantTransaction as $updatedTransaction){
            $updatedTransaction->touch(); 
        }
        
        $conversationThread->save();
        return $message; 
    }

    public function display_message(){
        $loggedInUser = Session::get('userData');
        $userContacts = ConversationParticipant::all();
        $userMessages = ConversationThread::where('conversation_participant_id', $loggedInUser->pofsis_user_id)->orWhere('created_by', $loggedInUser->pofsis_user_id)->orderBy('created_at', 'asc')->get();
        $msgData = array($loggedInUser, $userContacts, $userMessages); 
        return json_encode($msgData); 
    }

    public function get_message($id){
        return $id;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function show(Conversation $conversation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function edit(Conversation $conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conversation $conversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversation $conversation)
    {
        //
    }
}
