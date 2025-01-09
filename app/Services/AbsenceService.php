<?php

namespace App\Services;

use App\Models\Participant;

class AbsenceService
{

    public function __construct(
        protected Participant $participant
    ) {}

    public function data($date)
    {
        $query =  $this->participant->query();

        $query->select('participants.*');

        foreach ($this->posts() as $value) {
            $as = join(explode(' ', $value));
            $query->selectRaw('(select count(id) from absences where participant_id = participants.id and date = "' . $date . '" and title= "' . $value . '") as ' . $as . '');
        }

        // dd($query->toSql());

        return $query->get();
    }

    public function posts()
    {
        return [
            'kebersihan dan kesehatan gigi dan mulut',
            'makanan yang menyehatkan untuk gigi',
            'makanan yang bisa menyebabkan gigi berlubang',
            'penyakit Gigi dan Mulut',
            'teknik Mengggosok gigi',
            'Komik Edukasi',
            'Edukasi kesehatan Gigi dan Mulut',
            'Cara Menggosok Gigi Berlubang',
            'Kesehatan Gigi dan Mulut Remaja'
        ];
    }
}
