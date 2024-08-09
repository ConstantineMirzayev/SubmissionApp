<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Event;  
use App\Models\Submission;  
use App\Events\SubmissionSaved;  

class ProcessSubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data; 

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        //
        $this->data = $data;  
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $submission = Submission::create([  
            'name' => $this->data['name'],  
            'email' => $this->data['email'],  
            'message' => $this->data['message'],  
        ]);  
    
        Event::dispatch(new SubmissionSaved($submission)); 
    }
}
