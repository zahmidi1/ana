<?php

namespace partenaire;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{

    protected $table = 'partenaires';
    public $timestamps = true;

    public function invo_part()
    {
        return $this->hasOne('Invoice_partenaire', 'invo_p');
    }
}