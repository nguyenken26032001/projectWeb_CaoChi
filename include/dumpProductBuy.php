<?php
if (isset($_SESSION['productBuy'])) {
    print_r("<pre>");
    print_r($_SESSION['productBuy']);
    print_r("</pre>");
}