<?php 
if (!function_exists('notif')) {
    function notif($type, $title, $message) {
        return '<div class="alert alert-' . $type . ' alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>' . $title . '</strong><br> ' . $message . '
                </div>';
    }
}
?>
