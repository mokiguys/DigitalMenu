<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Ticket;
use App\TicketSubject;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|Response|View
     */
    public function index()
    {
        $data['ticketSubject'] = TicketSubject::all();
        $ticket_id = Ticket::where('user_agent', request()->input('type'))->orderBy('id', 'desc')->groupBy('parent_id')->get();
        $data['ticket_list'] = array();
        foreach ($ticket_id as $key => $item) {
            $last_ticket = Ticket::where('parent_id', $item->parent_id)->orderBy('id', 'desc')->get();
            array_push($data['ticket_list'], $last_ticket[0]);
        }
        return view('admin.Ticket.list', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function store(Request $request)
    {
        Ticket::create([
            'user_agent' => auth()->user()->user_type,
            'agent_id' => auth()->id(),
            'subject' => $request->subject,
            'message' => $request->message,
            'parent_id' => $request->parent
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ارسال شد' : 'Successfully Send');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Factory|Response|View
     */
    public function show(Request $request)
    {
        $ticket = Ticket::where('id', $request->ticket)->orderBy('id', 'asc')->first();
        $data['subject'] = $ticket->subject;
        $data['main_ticket'] = Ticket::where('parent_id', $request->ticket)->orderBy('id', 'asc')->get();
        return view('admin.Ticket.chat', compact('data'));
    }

    public function UpdateClose(Request $request)
    {
        Ticket::where('id', $request->id)->update([
            'close' => 1
        ]);
        echo "done";
    }

//    ticket subject
    public function index_subject()
    {
        $data['subject'] = TicketSubject::all();
        return view('admin.TicketSubject.list', compact('data'));
    }

    public function store_subject(Request $request)
    {
        TicketSubject::create([
            'fa' => $request->fa,
            'en' => $request->en,
            'tr' => $request->tr,
            'agent_type' => $request->type,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت اضافه شد' : 'Successfully Added');
        return back();

    }

    public function edit_subject(Request $request)
    {
        $data['ticket_subject'] = TicketSubject::where('id',$request->ticket_subject)->get();
        return view('admin.TicketSubject.edit', compact('data'));
    }

    public function update_subject(Request $request,TicketSubject $ticketSubject)
    {
        $ticketSubject->update([
            'fa' => $request->fa,
            'en' => $request->en,
            'tr' => $request->tr,
            'agent_type' => $request->type,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'Successfully Edited');
        return back();
    }
}
