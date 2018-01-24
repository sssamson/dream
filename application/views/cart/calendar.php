<div class="container-fluid calendar-container">
  <div class="row">
    <div class="col-sm">
      <h2 id="cal_date" class="calendar-title">January 2018</h2>
    </div>
    <?php
    if (empty($calendar_type) || $calendar_type != 'month') {
    ?>
    <div class="col-sm">
      <ul class="nav nav-pills calendar_views" role="tablist">
        <li class="nav-item">
          <a class="nav-link btn-sm active month_tab_link" data-toggle="pill" href="#month_div">Month</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn-sm schedule_tab_link" data-toggle="pill" href="#schedule_div">Schedule</a>
        </li>
      </ul>
    </div>
    <?php
    }
    ?>
    <div class="col-sm">
      <div class="pull-right cal-nav">
        <button type="button" id="prev_month" class="btn btn-sm btn-primary cal_buttons cal_buttons_month"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>

        <button type="button" id="next_month" class="btn btn-sm btn-primary cal_buttons cal_buttons_month"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>

        <button type="button" id="today_month" class="btn btn-sm btn-warning cal_buttons cal_buttons_month">today</button>

        <button type="button" id="previous_day" class="btn btn-sm btn-primary cal_buttons cal_buttons_hour"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>

        <button type="button" id="next_day" class="btn btn-sm btn-primary cal_buttons cal_buttons_hour"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>

        <button type="button" id="today_day" class="btn btn-sm btn-warning cal_buttons cal_buttons_hour">today</button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
      <div class="tab-content" id="calendar-body">
        <div class="tab-pane active" id="month_div" role="tabpanel"></div>
        <div class="tab-pane" id="schedule_div" role="tabpanel"></div>
        <table>
          <td class="legend_desc legend past_date">Past</td>
          <td class="legend_desc legend weekend">Weekend</td>
          <td class="legend_desc legend day_off">Day Off</td>
        </table>
        <input type="hidden" name="selected_date" id="selected_date">
        <input type="hidden" name="selected_time" id="selected_time">
        <input type="hidden" name="calendar_type" id="calendar_type" value="<?= !empty($calendar_type) ? $calendar_type : '' ?>">
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  business_hours = {
    dow:    <?= !empty($business_hours->weekdays) ? $business_hours->weekdays : '[]' ?>,
    start:  '<?= !empty($business_hours->start) ? $business_hours->start : '' ?>',
    end:    '<?= !empty($business_hours->end) ? $business_hours->end : '' ?>'
  };
</script>