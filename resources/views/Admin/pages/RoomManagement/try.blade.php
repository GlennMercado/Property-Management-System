<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
<!-- jQuery datepicker library -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

<label for="date">Date:</label>
<input type="text" id="date" name="date">
<script>
    var disabledDates = [
  "2023-03-24",
  "2023-03-27",
  "2023-04-01"
];
$(function() {
  // Initialize the Datepicker on the input field
  $("#date").datepicker({
    beforeShowDay: function(date) {
      var disabledDates = [
        "2023-03-24",
        "2023-03-27",
        "2023-04-01"
      ];

      // Format the date as "yyyy-mm-dd"
      var year = date.getFullYear();
      var month = (date.getMonth() + 1).toString().padStart(2, "0");
      var day = date.getDate().toString().padStart(2, "0");
      var formattedDate = year + "-" + month + "-" + day;

      // Check if the date is in the disabledDates array and disable it if it is
      if ($.inArray(formattedDate, disabledDates) != -1) {
        return [false, "disabled-date", "This date is disabled"];
      } else {
        return [true, ""];
      }
    }
  });
});

</script>