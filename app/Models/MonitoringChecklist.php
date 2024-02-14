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

    public function masterchecklist()
    {
        return $this->belongsTo(Masterchecklist::class, 'checklist');
    }
    
    static function detailchecklistmonitoring($id){
        $datachecklist = MonitoringChecklist::where('idmonitoring', $id)->get();
        return $datachecklist;
    }

    public function monitoringPerangkat()
    {
        return $this->belongsTo(MonitoringPerangkat::class, 'idmonitoring');
    }
}
