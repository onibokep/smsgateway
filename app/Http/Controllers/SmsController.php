<?php

namespace App\Http\Controllers;

use App\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Sms;
use App\User;
use Yajra\Datatables\Facades\Datatables;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('page.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $db = DB::table('penduduk')->get();
        return view('page.sms', ['data' => $db]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db = new Sms();
        $db->DestinationNumber = $request->tujuan;
        $db->TextDecoded = $request->teks;
        $db->CreatorID = $request->creatorID;
        $db->save();
        return response()->json($db);
    }

    public function smsGrup(Request $request){
        $target = DB::table('penduduk')->where([
            'rt'    => $request->rt,
            'rw'    => $request->rw,
        ])->get();

        $teks =$request->teks;
        $creator = Auth::user()->id;

        foreach ($target as $data){
            $db = new Sms();
            $db->DestinationNumber = $data->telp;
            $db->TextDecoded = $teks;
            $db->CreatorID = $creator;
            $db->save();
        }
        return response()->json();
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

    public function inbox(){
        $inbox = DB::table('inbox')
                ->orderBy('ID', 'desc')
                ->get();
        return view('page.inbox', ['box' => $inbox]);
    }

    public function inboxkritik(){
        $inbox = DB::table('inbox')
            ->where('TextDecoded', 'like', 'KS%')
            ->get();
        return view('page.kritik', ['box' => $inbox]);
    }

    public function dropKritik(Request $request){
        DB::table('inbox')
            ->where('ID', '=', $request->id)
            ->delete();
        $data = [
            'id' => $request->id,
            'nope'  => $request->nope,
        ];
        return response()->json($data);
    }

    public function dropInbox(Request $request){
        DB::table('inbox')
            ->where('ID', '=', $request->id)
            ->delete();
        $data = [
            'id' => $request->id,
            'nope'  => $request->nope,
        ];
        return response()->json($data);
    }

    public function inboxsaran(){
        $inbox = DB::table('inbox')
            ->where('TextDecoded', 'like', 'KS%')
            ->get();
        return view('page.saran', ['box' => $inbox]);
    }

    public function kritikSaran(){

    }

    public function outbox(){
        $outbox = $sent = DB::table('outbox')
            ->join('users', 'outbox.CreatorID', '=', 'users.id')
            ->select('outbox.*', 'users.name')
            ->get();
        return view('page.outbox', ['out' => $outbox]);
    }

    public function dropOutbox(Request $request){
        DB::table('outbox')
            ->where('ID', '=', $request->id)
            ->delete();
        $data = [
            'id' => $request->id,
            'nope'  => $request->nope,
        ];
        return response()->json($data);
    }

//    public function dataOutbox(){
//        return Datatables::queryBuilder(DB::table('outbox'))
//            ->make(true);
//    }

    public function sentitem(){
        $sent = DB::table('sentitems')
            ->join('users', 'sentitems.CreatorID', '=', 'users.id')
            ->select('sentitems.*', 'users.name')
            ->get();
        return view('page.sentitem', ['items' => $sent]);
    }

    public function dropSentitem(Request $request){
        DB::table('sentitems')
            ->where('ID', '=', $request->id)
            ->delete();
        $data = [
            'id' => $request->id,
            'nope'  => $request->nope,
        ];
        return response()->json($data);
    }

    public function adduser(){
        return view('page.adduser');
    }

    public function storeUser(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'password' => bcrypt($request->password),
            'status'    => 'aktif',
        ]);
        return back();
    }

    public function userdata(){
        $data = DB::table('users')->get();
        return view('page.userdata', ['users' => $data]);
    }

    public function editUser(Request $request){
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name'  => $request->name,
                'email' => $request->email,
                'level' => $request->level,
                'status'=> $request->status,
            ]);
        return response()->json();
    }

//    public function deleteUser(Request $request){
//        DB::table('users')
//            ->where('id', $request->id)
//            ->delete();
//        return response()->json();
//    }

}
