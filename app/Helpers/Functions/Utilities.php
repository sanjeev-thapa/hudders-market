<?php

    function alert(String $message, String $type = "danger") {
        return "<div class='alert alert-warning alert-$type fade show' role='alert'>
            $message
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
    }

?>
