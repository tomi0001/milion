<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function main() {
        $a = url("/muzyka/techno.mp3");
        $b = url("/muzyka/New2.WAV");
        print ("<head>"
                . " <audio autoplay>

      <source src='$b' type='audio/mpeg'>
Your browser does not support the audio element.
</audio> "
                . "sda"
                . "sadsad"
                . ""
                . ""
                . ""
                . ""
                . ""
                . "<bgsound src='$a'  loop='n'> </head>"
                . ""
                . "<button onclick='audio.play()'>Play</button>

<script>
    var audio = new Audio('$a')
</script>"
                . "");
    }
}
