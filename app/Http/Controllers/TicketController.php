<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $ticket = Ticket::where('id',$request->ticket)->orderBy('id','asc')->first();
        if($ticket->agent_id != auth()->id()){
            abort(403);
        }
        $data['subject'] = $ticket->subject;
        $data['main_ticket'] = Ticket::where('parent_id',$request->ticket)->orderBy('id','asc')->get();
        if(auth()->check() && auth()->user()->user_type == "User"){
            $data['shopNames'] = Shop::where('user_id',auth()->id())->where('confirmAdmin',1)->get();
        }
        return view('site.ticket',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'user_agent' => auth()->user()->user_type,
            'agent_id' => auth()->id(),
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        $ticket->update([
           'parent_id' => $ticket->id
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ارسال شد' : 'Successfully Send');
        return redirect(auth()->user()->user_type == 'User' ? "User-panel" : 'Marketer-panel');

    }
    public function answer(Request $request)
    {
        $ticket = Ticket::create([
            'user_agent' => auth()->user()->user_type,
            'agent_id' => auth()->id(),
            'subject' => $request->subject,
            'message' => $request->message,
            'parent_id' => $request->parent
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ارسال شد' : 'Successfully Send');
        return back();

    }
    public function closeTicket(Request $request)
    {
        $ticket = Ticket::where('id',$request->id)->orderBy('id','asc')->first();
        if($ticket->agent_id != auth()->id()){
            return false;
        }
        Ticket::where('id', $request->id)->update([
            'close' => 1
        ]);
        echo "done";
    }


}
