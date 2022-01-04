$(function() {
  'use strict';

  if($('#datePickerExample, #datePickerExample2').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datePickerExample, #datePickerExample2').datepicker({
      format: "mm/dd/yyyy",
      todayHighlight: true,
      autoclose: true
    });
    $('#datePickerExample, #datePickerExample2').datepicker('setDate', today);
  }
});