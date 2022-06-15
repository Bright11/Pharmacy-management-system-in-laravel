$(document).ready(function() {
    //$('#example').DataTable();
    $('#cartprint').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    });


    $('#examples').DataTable();
});

$(document).ready(function() {
    $('#myinputsalesearch').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#mytablegetitems tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });

    });
});