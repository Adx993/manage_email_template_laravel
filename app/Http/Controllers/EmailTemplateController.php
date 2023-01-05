<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = EmailTemplate::latest()->paginate(5);

        return view('templates.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'template' => 'required',
        ]);

        $template = new EmailTemplate([
            'name' => $request->input('name'),
            'template' => $request->input('template'),
        ]);
        $template->save();

        return redirect('/email-templates')->with('success', 'Template saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(EmailTemplate $emailTemplate)
    {
        return view('templates.show', compact('emailTemplate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(EmailTemplate $emailTemplate)
    {
        return view('templates.edit', compact('emailTemplate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmailTemplate $emailTemplate)
    {
        $request->validate([
            'name' => 'required',
            'template' => 'required',
        ]);

        $emailTemplate->name = $request->input('name');
        $emailTemplate->template = $request->input('template');
        $emailTemplate->save();

        return redirect('/email-templates')->with('success', 'Template updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmailTemplate  $emailTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailTemplate $emailTemplate)
    {
        $emailTemplate->delete();

        return redirect('/email-templates')->with('success', 'Template deleted!');

    }
    /**
     * send mail
     * 
     *
     */

        public function email()
    {

        $template = EmailTemplate::all();
        $email = User::all();
        return view('templates.send_mail', compact('template','email'));
    }

    public function sendMail(Request $request)
    {
         

        $request->validate([
            'template' => 'required',
            'email' => 'required',
        ]);

        $email = $request->input('email');
        $message = $request->input('message');

        $data = [
                'email' => $email,
                'message' => $message
                ];

                Mail::send('templates.message', $data, function($message) use ($email) {
                    $message->to('you@gmail.com', 'User Name')
                            ->subject('Contact Form Submission')
                            ->replyTo($email);
                });
    }

}

