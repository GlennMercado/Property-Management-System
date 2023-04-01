 <!-- jQuery library -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
<!-- jQuery datepicker library -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

<!-- METHOD 2 -->
    <!-- Styles -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"> -->
    
    <!-- Scripts -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->

<label for="date">Date:</label>
<input type="text" id="date" name="date">

<input type="text" id="datepicker" name="datepicker">
<script>
   

var start_disabledDates = [];
var end_disabledDates = [];
function getDisabledDates() {
  // Send an AJAX request to your Laravel route to get the disabled dates
  $.ajax({
    url: '{{ route("get.date", "1") }}',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      start_disabledDates = response.start;
      end_disabledDates = response.end;
      // Disable the dates returned by the server
      // $.each(response.start, function(index, value) {
      //   $('#datepicker')
      //     .find('option[value="' + value + '"]')
      //     .attr('disabled', true);
      // });
    }
  });
}
var disabledDates = [
  "2023-03-24",
  "2023-03-27",
  "2023-04-01"
];
$(function(){
  
  $("#datepicker").datepicker({
    beforeShowDay:function(date){

      // Format the date as "yyyy-mm-dd"
      var year = date.getFullYear();
      var month = (date.getMonth() + 1).toString().padStart(2, "0");
      var day = date.getDate().toString().padStart(2, "0");
      var formattedDate = year + "-" + month + "-" + day;
    

      //if ($.inArray(formattedDate, disabledDates) != -1) {
      if (d.isSameOrAfter(start) && d.isSameOrBefore(end)) {
        return [false, "disabled-date", "This date is disabled"];
      } else {
        return [true, ""];
      }

    }
  });
});

window.onload = function() {
  // Call the setAppointmentDates function on page load
  getDisabledDates();
};



//Using Method 2
// var datesDisabled = ['2023-04-01', '2023-04-05', '2023-04-10']
// $(document).ready(function() {
//     $('.datepicker').datepicker({
//         format: 'yyyy-mm-dd',
//         datesDisabled: datesDisabled,
//         beforeShowDay: function(date) {
//             var formattedDate = moment(date).format("YYYY-MM-DD");
//             if (datesDisabled.includes(formattedDate)) {
//                 return [false, "disabled-date"];
//             }
//             return [true, ""];
//         }
//     });
// });



</script>


