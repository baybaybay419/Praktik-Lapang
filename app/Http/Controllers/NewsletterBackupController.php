<?php

namespace App\Http\Controllers;

use App\Models\NewsletterBackup;
use App\Http\Requests\StoreNewsletterBackupRequest;
use App\Http\Requests\UpdateNewsletterBackupRequest;

class NewsletterBackupController extends Controller
{
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
     * @param  \App\Http\Requests\StoreNewsletterBackupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsletterBackupRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsletterBackup  $newsletterBackup
     * @return \Illuminate\Http\Response
     */
    public function show(NewsletterBackup $newsletterBackup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsletterBackup  $newsletterBackup
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsletterBackup $newsletterBackup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsletterBackupRequest  $request
     * @param  \App\Models\NewsletterBackup  $newsletterBackup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsletterBackupRequest $request, NewsletterBackup $newsletterBackup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsletterBackup  $newsletterBackup
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsletterBackup $newsletterBackup)
    {
        //
    }
}
