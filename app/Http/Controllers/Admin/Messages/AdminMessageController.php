<?php

namespace App\Http\Controllers\Admin\Messages;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unreadMessages = Message::where('readed', 0)->get();
        $readMessages = Message::where('readed', 1)->get();
        $messages = $unreadMessages->concat($readMessages);
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Message $message)
    {
        $message->readed = !$message->readed;
        $message->save();

        return redirect()->route('admin.message.index')->with('success', 'Estado de lectura del mensaje actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.message.index')->with('success', 'Mensaje eliminado.');
    }
}
