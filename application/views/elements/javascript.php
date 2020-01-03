<script type="text/javascript">
	//date picker
	$(function () {
		$('.dateTimePicker').datepicker({
			autoclose: true
		});
	});

	//time picker
    $('.timepicker').timepicker({
     	showInputs: false
    }); 

    //data table
    $(document).ready(function() {
        $('.tableAll').DataTable();
    });    
</script>