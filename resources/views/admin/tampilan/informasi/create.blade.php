<div class="modal fade" id="tambah-informasi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Informasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/informasi/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Website :</label>
                                <input type="text" name="nama" class="form-control" placeholder="Cth: DINAS PERTANIAN DAN PANGAN" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo">Logo :</label>
                                <input type="file" name="logo" class="form-control" accept="image/*" required>
                                <small class="text-danger">*Max 2MB.</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telepon">No Telepon :</label>
                                <input type="number" name="telepon" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telepon">Email :</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat :</label>
                                <textarea name="alamat" cols="5" rows="3" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi :</label>
                                <textarea name="deskripsi" cols="5" rows="3" class="form-control" required></textarea>
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