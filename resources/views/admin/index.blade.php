@extends('adminlte::page')
@section('title', !empty($site_title) ? $site_title : 'Administration')

@section('modals')
    <div class="modal modal-default fade" id="confirm_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Művelet megerősítése</h4>
                </div>
                <div class="modal-body">
                    <p>A művelet végrehajtásához megerősítés szükséges. Biztos végre akarod hajtani a műveletet?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Elvetés</button>
                    <button type="button" class="btn btn-primary yes_btn">Végrehajtom a műveletet</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
