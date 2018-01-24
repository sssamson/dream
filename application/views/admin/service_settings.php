<div class="container-fluid">
  <div class="row header">
    <div class="col-md-12">
      <?php
      if (!empty($page)) {
        echo '<h1>'.ucfirst($page).'</h1>';
      } 
      ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card" id="content">
        <div class="card-header">
          Weekly Schedule
        </div>
        <div class="card-block">
          <form id="data_form" method="post"> 
            <div class="form-group row">
              <label class="col-md-2 form-control-label"><b>Business Schedule</b></label>
              <div class="col-md-10">
                <label class="checkbox-inline" for="sunday">
                  <input type="checkbox" id="sunday" name="days_off" value="0" <?= !empty($weekday[0]) ? 'checked' : '' ?>>
                  Sunday
                </label>
                <label class="checkbox-inline" for="monday">
                  <input type="checkbox" id="monday" name="days_off" value="1" <?= !empty($weekday[1]) ? 'checked' : '' ?>>
                  Monday
                </label>
                <label class="checkbox-inline" for="tuesday">
                  <input type="checkbox" id="tuesday" name="days_off" value="2" <?= !empty($weekday[2]) ? 'checked' : '' ?>>
                  Tuesday
                </label>
                <label class="checkbox-inline" for="wednesday">
                  <input type="checkbox" id="wednesday" name="days_off" value="3" <?= !empty($weekday[3]) ? 'checked' : '' ?>>
                  Wednesday
                </label>
                <label class="checkbox-inline" for="thursday">
                  <input type="checkbox" id="thursday" name="days_off" value="4" <?= !empty($weekday[4]) ? 'checked' : '' ?>>
                  Thursday
                </label>
                <label class="checkbox-inline" for="friday">
                  <input type="checkbox" id="friday" name="days_off" value="5" <?= !empty($weekday[5]) ? 'checked' : '' ?>>
                  Friday
                </label>
                <label class="checkbox-inline" for="saturday">
                  <input type="checkbox" id="saturday" name="days_off" value="6" <?= !empty($weekday[6]) ? 'checked' : '' ?>>
                  Saturday
                </label>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-4">
                <label for="start_time"><b>Start Time</b></label>
                <select id="start_time" name="start_time" class="selectpicker form-control">
                  <?php $start_time = !empty($schedule->start) ? $schedule->start : ''  ?>
                  <?= hours_of_day_options($schedule->start) ?>
                </select>
              </div>
              <div class="form-group col-sm-4">
                <label for="end_time"><b>End Time</b></label>
                <select id="end_time" name="end_time" class="selectpicker form-control">
                  <?php $end_time = !empty($schedule->end) ? $schedule->end : ''  ?>
                  <?= hours_of_day_options($end_time) ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="submit-container">
                <input 
                type="hidden" 
                name="id" 
                id="id" 
                value="<?= !empty($schedule->id) ? $schedule->id : ''  ?>">
                <button type="submit" id="form_validate" class="btn btn-primary">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card" id="content">
        <div class="card-header">
          Days Off
        </div>
        <div class="card-block">
          <?php
          $params = array('calendar_type'=>'month');
          $this->view('cart/calendar',$params);
          ?>
        </div>
      </div>
    </div>
  </div>
</div>