<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use NumberFormatter;
use App\Models\Provinsi;
use App\Models\FirstParty;
use App\Models\Kementrian;
use App\Models\Newsletter;
use App\Models\SecondParty;
use App\Models\KabupatenKota;
use App\Models\NewsletterLog;
use App\Models\NewsletterBackup;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreNewsletterRequest;
use App\Http\Requests\UpdateNewsletterRequest;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'newsletter';
        $firstParty = FirstParty::all();
        $selectedSecondParty = new SecondParty();
        $selectedFirstParty = new FirstParty();
        $selectedNewsLetter = null;
        $numberLetterOfAssignment = false;
        return view('form_newsletter', compact('firstParty', 'title', 'numberLetterOfAssignment', 'selectedNewsLetter', 'selectedSecondParty', 'selectedFirstParty'));
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
     * @param  \App\Http\Requests\StoreNewsletterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsletterRequest $request)
    {
        $title = 'newsletter';
        $checkNewsletter = Newsletter::where('number_letter_of_assignment', $request->number_letter_of_assignment)->get();
        $checkSecondParty = SecondParty::where('nip', $request->nip_second)->get();
        $userId = Auth::id();

        if ($checkNewsletter->isEmpty()) {
            SecondParty::create([
                'fullname' => $request->name_second,
                'nip' => $request->nip_second,
                'position' => $request->position_second,
                'email' => $request->email_second,
                'handphone' => $request->handphone_second
            ]);
            $secondParty = SecondParty::firstWhere('nip', $request->nip_second);

            Newsletter::create([
                'user_id' => $userId,
                'first_party_id' => $request->name_first,
                'second_party_id' => $secondParty->id,
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'kld' => $request->kld,
                'number_letter_of_assignment' => $request->number_letter_of_assignment,
                'location_city' => $request->location,
                'event_date' => $request->date
            ]);

            KabupatenKota::where('kabupaten_kota', $request->kld)->update([
                'status' => 'Sudah'
            ]);
            Provinsi::where('provinsi', $request->kld)->update([
                'status' => 'Sudah'
            ]);
            Kementrian::where('kementrian', $request->kld)->update([
                'status' => 'Sudah'
            ]);

            return redirect('/storage');
        } else {
            $firstParty = FirstParty::all();
            $numberLetterOfAssignment = true;
            return view('form_newsletter', compact('numberLetterOfAssignment', 'title', 'firstParty'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        $title = 'storage';
        $newsletters = Newsletter::all()->sortBy('created_at');
        return view('storage', compact('title', 'newsletters'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        $firstParty = FirstParty::all();

        $selectedNewsLetter = Newsletter::firstWhere('id', $newsletter->id);
        $selectedSecondParty = SecondParty::firstWhere('id', $newsletter->second_party_id);
        $selectedFirstParty = FirstParty::firstWhere('id', $newsletter->first_party_id);
        $numberLetterOfAssignment = false;
        $title = 'newsletter';
        return view('form_newsletter', compact('firstParty', 'title', 'numberLetterOfAssignment', 'selectedNewsLetter', 'selectedSecondParty', 'selectedFirstParty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsletterRequest  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsletterRequest $request, Newsletter $newsletter)
    {
        $newsletter = Newsletter::find($request->newsletter_id);
        $secondParty = SecondParty::find($newsletter->second_party_id);
        $firstParty = FirstParty::find($newsletter->first_party_id);
        $userId = Auth::id();

        if (
            $request->name_second != $secondParty->name &&
            $request->nip_second != $secondParty->nip &&
            $request->position_second != $secondParty->position &&
            $request->email_second != $secondParty->email &&
            $request->handphone_second != $secondParty->handphone
        ) {
            $secondParty = SecondParty::create([
                'fullname' => $request->name_second,
                'nip' => $request->nip_second,
                'position' => $request->position_second,
                'email' => $request->email_second,
                'handphone' => $request->handphone_second
            ]);

            $newsletterBackup = NewsletterBackup::create([
                'user_id' => $newsletter->user_id,
                'first_party_id' => $newsletter->first_party_id,
                'second_party_id' => $newsletter->second_party_id,
                'title' => $newsletter->title,
                'description' => $newsletter->description,
                'category' => $newsletter->category,
                'kld' => $newsletter->kld,
                'number_letter_of_assignment' => $newsletter->number_letter_of_assignment,
                'location_city' => $newsletter->location_city,
                'event_date' => $newsletter->event_date,
            ]);
            NewsletterLog::create([
                'user_id' => $userId,
                'news_id' => $newsletter->id,
                'news_backup_id' => $newsletterBackup->id
            ]);
        } else {
            $secondParty->update([
                'fullname' => $request->name_second,
                'nip' => $request->nip_second,
                'position' => $request->position_second,
                'email' => $request->email_second,
                'handphone' => $request->handphone_second
            ]);
            NewsletterLog::create([
                'user_id' => $userId,
                'news_id' => $newsletter->id,
                'news_backup_id' => null
            ]);
        }



        $newsletter->update([
            'user_id' => $userId,
            'first_party_id' => $firstParty->id,
            'second_party_id' => $secondParty->id,
            'title' => $request->title,
            'description' => $request->description,
            'category' => $newsletter->category,
            'kld' => $newsletter->kld,
            'number_letter_of_assignment' => $request->number_letter_of_assignment,
            'location_city' => $request->location,
            'event_date' => $request->date,
        ]);

        return redirect('/storage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter = Newsletter::find($newsletter->id);

        $dataKld = Newsletter::where('kld', $newsletter->kld)->get();

        $kabupatenKota = KabupatenKota::where('kabupaten_kota', $newsletter->kld)->get();

        $provinsi = Provinsi::where('provinsi', $newsletter->kld)->get();

        $kementrian = Kementrian::where('kementrian', $newsletter->kld)->get();


        if ($dataKld->count() == 1) {
            KabupatenKota::where('kabupaten_kota', $newsletter->kld)->update([
                'status' => 'Belum'
            ]);
            Provinsi::where('provinsi', $newsletter->kld)->update([
                'status' => 'Belum'
            ]);
            Kementrian::where('kementrian', $newsletter->kld)->update([
                'status' => 'Belum'
            ]);
        }

        $newsletter->delete();

        return redirect('/storage');
    }

    public function cetak($id)
    {
        $title = 'storage';
        $newsletterById = Newsletter::find($id);
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
