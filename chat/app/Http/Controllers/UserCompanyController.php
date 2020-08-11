<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserCompany;
use App\ConversationParticipant;
use App\ConversationThread;
use Session;
Use Redirect; 
use DB; 

class UserCompanyController extends Controller
{

    public function user_login(Request $request){
        $user = UserCompany::where('email', $request['email'])->first();
        $errorNotExisting = "Email not existing"; 
        $errorPassword ="Incorrect Password";

        if(empty($user->email)){
            return 0; 
        }
       
        else{
            if($user->password == $request['password']){ 
                Session::put('userData', $user);
                return 1;
            }

            else{
                return 0; 
            }
             
        }
    } 

    public function user_contacts(){
        $userData = Session::get('userData'); 
        $user = ConversationParticipant::where('user_id', $userData->id)->get(); 
        $contacts = ConversationParticipant::where('user_id', '!=', $userData->id)->orderBy('updated_at', 'desc')->get();

        // $contacts = ConversationParticipant::where('user_id', '!=', $userData->id)->orderBy('updated_at', 'desc')->get();


        $usersData = array($user, $contacts); 
        return  json_encode($usersData);  
    } 


    public function logout(){
        Session()->flush();
        return Redirect::to('/login');
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
