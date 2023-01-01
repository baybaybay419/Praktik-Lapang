<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use NumberFormatter;
use App\Models\FirstParty;
use App\Models\Newsletter;
use App\Models\SecondParty;
use App\Models\NewsletterLog;
use App\Models\NewsletterBackup;
use App\Http\Requests\StoreNewsletterLogRequest;
use App\Http\Requests\UpdateNewsletterLogRequest;

class NewsletterLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Newsletter $newsletter)
    {
        $newsletterLog = NewsletterLog::where('news_id', $newsletter->id)->get();

        $names = [];
        $updates = [];
        $aksi = [];

        for ($i = 0; $i < $newsletterLog->count(); $i++) {
            $user =  User::find($newsletterLog[$i]->user_id);
            $names[$i] = $user->name;
            $updates[$i] = $newsletterLog[$i]->updated_at;
            $aksi[$i] = $newsletterLog[$i]->news_backup_id;
        }



        $title = 'storage';

        return view('history', compact('title', 'names', 'updates', 'aksi'));
    }
    public function cetak($id)
    {
        $title = 'storage';
        $newsletterById = NewsletterBackup::find($id);

        $firstParty = FirstParty::find($newsletterById->first_party_id);
        $secondParty = SecondParty::find($newsletterById->second_party_id);

        $formatter = new NumberFormatter("id_ID", NumberFormatter::SPELLOUT);
        $timestamp = Carbon::parse($newsletterById->event_date)->locale('id');
        $timestamp->settings(['formatFunction' => 'translatedFormat']);

        $hari = $timestamp->format('l');
        $tanggal = $timestamp->format('j');
        $tanggalTerbilang = ucwords($formatter->format($tanggal));
        $bulan = $timestamp->format('F');
        $tahun = $timestamp->format('Y');
        $tahunTerbilang = ucwords($formatter->format($tahun));
        return view('cetak', compact(
            'title',
            'newsletterById',
            'firstParty',
            'secondParty',
            'hari',
            'tanggal',
            'bulan',
            'tahun',
            'tanggalTerbilang',
            'tahunTerbilang'
        ));
    }
}
