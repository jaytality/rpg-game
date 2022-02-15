<?php
foreach (glob(ROOT."/routes/*.php") as $filename) {
    include $filename;
}

// ERROR: 404
$base->notFound(function () {
    \jtAPI\Core\Error::display('404');
});
