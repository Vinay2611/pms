/** 
KRA
Date : 16th Nov 2015
Creater : Amit Pashte
**/

$(function() {
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
		  "iDisplayLength": 25,
          "autoWidth": true
        });
});
