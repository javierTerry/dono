$(function() {
	'use strict'
	
	//Data tabla general
   var exportGeneral = $('#exportGeneral').DataTable( {
      pagingType: "full_numbers",
      lengthChange: true,
      buttons: [ 
               { extend: 'excel', footer: true }
               ,{ extend: 'pdf', footer: true } 
               ]
      ,"paging": true
   } );

   exportGeneral.buttons().container()
   .appendTo( '#exportGeneral_wrapper .col-md-6:eq(0)' );
   //Data tabla general

   //Data table exportCotizaciones
   var tableCotizacion = $('#exportCotizaciones').DataTable( {
      lengthChange: false,
      buttons: [ 'excel', 'pdf', 'colvis' ]
   } );

   tableCotizacion.buttons().container()
   .appendTo( '#exportCotizaciones_wrapper .col-md-6:eq(0)' );

   //Data table configPrecio
   var tableConfigPrecio = $('#configPrecio').DataTable( {
      lengthChange: false,
      buttons: [ 'excel', 'pdf' ]
      ,"paging":   false
   } );

   tableConfigPrecio.buttons().container()
   .appendTo( '#configPrecio_wrapper .col-md-6:eq(0)' );

   //Data table grupoTabla
   var grupoTabla = $('#grupoTabla').DataTable( {
      lengthChange: false,
      buttons: [ 'excel', 'pdf' ]
      ,"paging":   false
   } );

   grupoTabla.buttons().container()
   .appendTo( '#grupoTabla_wrapper .col-md-6:eq(0)' );
    //Fin Data table grupoTabla



	$('#example1').DataTable({
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		}
	});
	$('#example2').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_ items/page',
		}
	});
	$('#example3').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );
	
	/*Input Datatable*/
	 var table = $('#example-input').DataTable({
      'columnDefs': [
         {
            'targets': [1, 2, 3, 4, 5],
            'render': function(data, type, row, meta){
               if(type === 'display'){
                  var api = new $.fn.dataTable.Api(meta.settings);

                  var $el = $('input, select, textarea', api.cell({ row: meta.row, column: meta.col }).node());

                  var $html = $(data).wrap('<div/>').parent();

                  if($el.prop('tagName') === 'INPUT'){
                     $('input', $html).attr('value', $el.val());
                     if($el.prop('checked')){
                        $('input', $html).attr('checked', 'checked');
                     }
                  } else if ($el.prop('tagName') === 'TEXTAREA'){
                     $('textarea', $html).html($el.val());

                  } else if ($el.prop('tagName') === 'SELECT'){
                     $('option:selected', $html).removeAttr('selected');
                     $('option', $html).filter(function(){
                        return ($(this).attr('value') === $el.val());
                     }).attr('selected', 'selected');
                  }

                  data = $html.html();
               }

               return data;
            }
         }
      ],
      'responsive': true
   });
   $('#example-input tbody').on('keyup change', '.child input, .child select, .child textarea', function(e){
       var $el = $(this);
       var rowIdx = $el.closest('ul').data('dtr-index');
       var colIdx = $el.closest('li').data('dtr-index');
       var cell = table.cell({ row: rowIdx, column: colIdx }).node();
       $('input, select, textarea', cell).val($el.val());
       if($el.is(':checked')){
          $('input', cell).prop('checked', true);
       } else {
          $('input', cell).removeProp('checked');
       }
   });
   
   $('table').on('draw.dt', function() {
		$('.select2-no-search').select2({
			minimumResultsForSearch: Infinity,
			placeholder: 'Choose one'
		});
	});
	
});