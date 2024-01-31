<?php

namespace sort_lait;

use Illuminate\Database\Eloquent\Model;

class Sort_lait extends Model
{

    protected $table = 'sorts_laits';
    public $timestamps = true;

    public function lait_sort()
    {
        return $this->belongsTo('Invoice_partenaire', 'lait_sort');
    }
}