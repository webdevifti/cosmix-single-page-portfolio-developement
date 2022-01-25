<?php

$get_fun_fact = getFunFact();
?>
<section id="fun-facts">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="fun-fact text-center">
          <h3><i class="fa fa-thumbs-o-up"></i> <span class="timer"><?= $get_fun_fact['client_number'] ?></span></h3>
          <h6>Happy Clients</h6>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="fun-fact text-center">
          <h3><i class="fa fa-briefcase fa-6"></i> <span class="timer"><?= $get_fun_fact['completed_project'] ?></span></h3>
          <h6>Completed Projects</h6>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="fun-fact text-center">
          <h3><i class="fa fa-coffee"></i> <span class="timer"><?= $get_fun_fact['cups_of_coffee'] ?></span></h3>
          <h6>Cups of Coffee</h6>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="fun-fact text-center">
          <h3><i class="fa fa-code"></i> <span class="timer"><?= $get_fun_fact['line_of_code'] ?></span></h3>
          <h6>Lines of Code</h6>
        </div>
      </div>
    </div>
  </div>
</section>
