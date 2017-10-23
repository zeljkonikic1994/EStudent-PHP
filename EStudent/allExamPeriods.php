<?php

include_once 'header.php';
if (!isset($_SESSION)) {
    session_start();
}
?>
<script src="js/examPeriods.js"></script>
<!---->
<!--<table id="periodsTable" class="table table-striped">-->
<!--<thead>-->
<!---->
<!--    <tr>-->
<!--        <th>Date from</th>-->
<!--        <th>Date to</th>-->
<!--        <th>Name</th>-->
<!--    </tr>-->
<!---->
<!--</thead>-->
<!--</table>-->

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">All exam periods</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <div class="tab-content ">
                <div class="tab-pane fade in active" id="tags">
                    <table class="table table-striped table-responsive table-bordered" id="periodsTable">
                        <thead>
                        <tr>
                            <th>Date From</th>
                            <th>Date to</th>
                            <th>Name</th>
                        </tr>
                        </thead>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
