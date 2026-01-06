<?php

namespace App\Jobs;

use App\Mail\DailySalesReportMail;
use App\Models\OrderItem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendDailySalesReport implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $items = OrderItem::whereDate('created_at', now()->toDateString())
            ->with('product')
            ->get();


        Mail::to('admin@example.com')
            ->send(new DailySalesReportMail($items));
    }
}
