@foreach ($data as $row)
    <form>
        <div class="row">
        <div class="form-group col-md-3">
            <label for="inputEmail4" style="text-align: left; float: left;">Nama Customer</label>
            <input type="text" class="form-control" value="{{ $row->nama }}" id="inputEmail4">
        </div>
        <div class="form-group col-md-3">
            <label for="inputPassword4" style="text-align: left; float: left;">Merk Barang</label>
            <input type="text" class="form-control" value="{{ $row->merk_barang }}" id="inputPassword4">
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4" style="text-align: left; float: left;">Jenis Barang</label>
            <input type="text" class="form-control" value="{{ $row->jenis_barang }}" id="inputPassword4">
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4" style="text-align: left; float: left;">Tipe Barang</label>
            <input type="text" class="form-control" value="{{ $row->tipe_barang }}" id="inputPassword4">
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4" style="text-align: left; float: left;">Biaya</label>
            <input type="text" class="form-control" value="{{ $row->biaya_servis }}" id="inputPassword4">
        </div>
    </div>
    </form>
    <br>
    <div class="row">
        <div class="col-md-12">
    <section class="step-wizard">
        <ul class="step-wizard-list">
            <li class="step-wizard-item @if($row->status=="identifikasi-kerusakan") current-item  @endif">
                <span class="progress-count">1</span>
                <span class="progress-label">Identifikasi Kerusakan</span>
            </li>
            <li class="step-wizard-item @if($row->status=="proses-perbaikan") current-item @endif">
                <span class="progress-count">2</span>
                <span class="progress-label">Proses Perbaikan</span>
            </li>
            <li class="step-wizard-item @if($row->status=="testing") current-item  @endif">
                <span class="progress-count">3</span>
                <span class="progress-label">Testing</span>
            </li>
            <li class="step-wizard-item @if($row->status=="selesai") current-item @endif">
                <span class="progress-count">4</span>
                <span class="progress-label">Selesai</span>
            </li>
        </ul>
    </section>
        </div>
</div>
@endforeach