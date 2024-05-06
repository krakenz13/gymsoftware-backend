<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subscriptions'; 

    /**
     
     *
     * @var array
     */
    protected $fillable = [
        
            'id',
            'mentoria',
            'duracion'
        ];
        
  

    /**
     *
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime', 
    ];

    /**
     * 
     *
     * @return \DateTime
     */
    public function calculateExpirationDate()
    {
        $startDate = $this->start_date;
        $expirationDate = $startDate->addMonths($this->duration_months);
        
        return $expirationDate;
    }

    
}