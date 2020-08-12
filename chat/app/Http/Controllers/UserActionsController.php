<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserCompany;
use App\Conversation;
use App\ConversationParticipant;
use Session; 

class UserActionsController extends Controller
{
    public function display_new_contact(){
        $loggedInUser = Session::get('userData');
        $userConversationIDs = ConversationParticipant::where('user_id', $loggedInUser->id)->pluck('conversation_id');
        
        $userContactsID = collect([]);
        foreach($userConversationIDs as $userConversationID){
            $userContactsID->push(ConversationParticipant::where('conversation_id', $userConversationID)->where('user_id', '!=', $loggedInUser->id)->pluck('user_id')); 
        }
        $userContactsID = $userContactsID->flatten();

        $allUsersID = UserCompany::where('company_id', '!=', $loggedInUser->id)->where('company_id', '!=', $loggedInUser->id)->pluck('company_id');
        $allUsers = UserCompany::all(); 
        $users = array($userContactsID, $allUsersID, $allUsers); 
        return json_encode($users); 
    }

    public function add_new_contact(Request $request){
        $addedContact = $request->input('addedContact'); 
        $userReceiver = UserCompany::where('username', $addedContact)->first();
        $userSender = Session::get('userData');

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
