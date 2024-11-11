<div class="modal fade" id="tambah-sosmed">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Sosmed</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/sosmed/create" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="instagram">Link Instagram:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="instagram">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fab fa-instagram"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="facebook">Link Facebook:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="facebook">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fab fa-facebook"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="youtube">Link Youtube:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="youtube">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fab fa-youtube"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="x">Link X (Twitter):</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="x">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fab fa-twitter"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>