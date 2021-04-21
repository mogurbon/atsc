<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\queueatc;

class QueueSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    const EMERGENCY = 1;
    const VIP = 2;
    const PASSENGER = 3;
    const CARGO = 4;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(queueatc $queueatc)
    {
        $queue =$queueatc->queue;
        $new =[];
        foreach ($queue as $aircraft){
            # echo $aircraft['type_id'].PHP_EOL ;
            if ($aircraft['type_id'] == self::EMERGENCY){
                $new[]=$aircraft;
            }

        }
        usort($new, function ($a, $b) {
            return strcmp($a['date'], $b['date']);
        });

        usort($new, function ($a, $b) {
            return $b["size_id"] - $a["size_id"];
        });


        foreach ($queue as $aircraft){
            # echo $aircraft['type_id'].PHP_EOL ;
            if ($aircraft['type_id'] == self::VIP){
                $new[]=$aircraft;
            }

        }

        usort($new, function ($a, $b) {
            return strcmp($a['date'], $b['date']);
        });
        usort($new, function ($a, $b) {
            return $b["size_id"] - $a["size_id"];
        });

        foreach ($queue as $aircraft){
            # echo $aircraft['type_id'].PHP_EOL ;
            if ($aircraft['type_id'] == self::PASSENGER){
                $new[]=$aircraft;
            }

        }

        usort($new, function ($a, $b) {
            return strcmp($a['date'], $b['date']);
        });
        usort($new, function ($a, $b) {
            return $b["size_id"] - $a["size_id"];
        });


        foreach ($queue as $aircraft){
            # echo $aircraft['type_id'].PHP_EOL ;
            if ($aircraft['type_id'] == self::CARGO){
                $new[]=$aircraft;
            }

        }

        usort($new, function ($a, $b) {
            return strcmp($a['date'], $b['date']);
        });
        usort($new, function ($a, $b) {
            return $b["size_id"] - $a["size_id"];
        });

        $queueatc->queue = $new;
        $queueatc->save();

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
