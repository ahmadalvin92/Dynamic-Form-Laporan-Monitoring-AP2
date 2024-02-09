<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringChecklist extends Model
{
    use HasFactory;

    protected $table = 'monitoring_checklists';

    protected $fillable = [
        'idmonitoring',
        'checklist',
        'status',
    ];
    

    public function monitoringPerangkat()
    {
        return $this->belongsTo(MonitoringPerangkat::class, 'idmonitoring');
    }
}
