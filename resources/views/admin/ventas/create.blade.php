@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    @livewire('admin.vender-index')
@stop

@section('css')

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery.nicescroll@3.7.6/dist/jquery.nicescroll.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            livewire.on('scan-code', action => {
                $('#code').val('')
            });

            window.livewire.on('scan-ok', Msg => {
                noty(Msg, 1)
            });

            window.livewire.on('scan-notfound', Msg => {
                noty(Msg, 2)
            });

            window.livewire.on('no-stock', Msg => {
                noty(Msg, 2)
            });

            window.livewire.on('sale-error', Msg => {
                noty(Msg, 2)
            });

            window.livewire.on('print-ticket', saleId => {
                window.open("print://" + saleId, '_blank');
            });
        });
        
        function noty(msg, option = 1) {
            Snackbar.show({
                pos: 'top-right',
                text: msg.toUpperCase(),
                textColor: '#000000',
                actionText: 'CERRAR',
                actionTextColor: '#FFFEFE',
                backgroundColor: option == 1 ? '#58D68D' : '#E74C3C',
            });
        }
        $(function() {
            $(".tblscroll").niceScroll({
                cursorcolor: "#F2F3F4",
                cursorwidth: "10px",
                background: "rgba(20,20,20,0.3)",
                cursorborder: "0px",
                cursorborderradius: 5
            });
        });

        function Confirm(id, eventName, text) {
            Swal.fire({
                title: 'CONFIRMAR',
                text: text,
                type: 'warning',
                background: '#FDFEFE',
                showCancelButton: true,
                cancelButtonText: 'CERRAR',
                cancelButtonColor: '#3498DB',
                confirmButtonColor: '#E74C3C',
                confirmButtonText: 'ACEPTAR'
            }).then(function(result) {
                if (result.value) {
                    window.livewire.emit(eventName, id)
                    swal.close()
                }
            })
        }

        try {
            onScan.attachTo(document, {
                suffixKeyCodes: [13],
                onScan: function(codigo_barras) {
                    console.log(codigo_barras)
                    window.livewire.emit('scan-code', codigo_barras)
                },
                onScanError: function(e) {
                    console.log(e)
                }
            })
            console.log('Scanner listo')
        } catch (e) {
            console.log('Error de lectura: ', e)
        }
    </script>

@stop
