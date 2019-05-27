$(document).ready( function () {
    $('#dataTable').DataTable({
        "language": {
            "url": "/js/DataTables/datatables-catalan.json"
        },

        "dom": '<".float-left"f><"float-right"l><<t>ip>',
        "initComplete": function( settings, json ) {
            $buscador = $("#dataTable_filter");
            $buscador.addClass("form-group has-search");
            $input = $buscador.find("input").addClass("form-control");
            $buscador.append("<span class='fa fa-search form-control-feedback'></span>");
            $buscador.append($input);
            $buscador.find("label").remove();
            $buscador.find("input").attr("placeholder", "Buscar");

            $('select[name=dataTable_length]').addClass("custom-select");
          },
          responsive: true
    });
    
});
