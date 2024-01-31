<?php

namespace invoice_partenaire;

use Illuminate\Database\Eloquent\Model;

class Invoice_partenaire extends Model
{

    protected $table = 'invoices_partenaires';
    public $timestamps = true;

    public function parte_invoice()
    {
        return $this->belongsTo('Partenaire', 'parte_inv');
    }

    public function sout_lai()
    {
        return $this->hasOne('Sort_lait', 'sort_lait');
    }
}