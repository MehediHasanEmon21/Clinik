(function ($) {

	"use strict";
	
	var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    var stDate = '20/08/2012';
    var birthday = $('#birthday').datepicker({
        changeYear: true,
        startDate: stDate,
        format: 'dd/mm/yyyy',
        onRender: function(date) {
          return date.valueOf() > now.valueOf() ? 'disabled' : '';
        }
      }).on('changeDate', function(ev) {
        birthday.hide();
      }).data('datepicker');


})(window.jQuery); // JavaScript Document