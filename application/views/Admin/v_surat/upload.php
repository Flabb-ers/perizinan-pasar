<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Surat</h6>
        </div>
        <?php if ($this->session->flashdata('pesan')) : ?>
            <div class="alert alert-info alert-dismissible fade show m-3">
                <?= $this->session->flashdata('pesan') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <p><strong>NPWRD:</strong> <?= $objek_pajak->npwrd ?></p>
            <p><strong>Nama Wajib Pajak:</strong> <?= $objek_pajak->nama ?></p>

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="font-weight-bold">Surat Belum Ditandatangani (Cetak)</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <a href="<?= base_url('Admin/Cetak2/print/' . $objek_pajak->id_objek_pajak); ?>" target="_blank" class="btn btn-danger"><i class="fa fa-download">Cetak</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="font-weight-bold">Surat Sudah Ditandatangani (Download)</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <?php
                                    $filename = 'surat_' . $objek_pajak->id_objek_pajak . '.pdf';
                                    $file_path = FCPATH . 'template/surat/pdf/' . $filename;
                                    if (file_exists($file_path)) : ?>
                                        <a href="<?= base_url('Admin/Cetak2/downloadSurat/' . $objek_pajak->id_objek_pajak); ?>" class="btn btn-success">
                                            <i class="fa fa-download"></i> Download Surat
                                        </a>
                                    <?php else : ?>
                                        <p class="text-danger">Surat belum tersedia.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row 3: Upload File Surat dengan Drag & Drop -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="font-weight-bold">Upload Surat yang Sudah Ditandatangani</h6>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('Admin/Cetak2/upload/' . $objek_pajak->id_objek_pajak); ?>" method="POST" enctype="multipart/form-data" id="uploadForm">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">

                                <div id="drop-zone" class="drop-zone">
                                    <div class="drop-zone-content text-center">
                                        <i class="fa fa-cloud-upload fa-3x mb-3"></i>
                                        <p>Drag & drop file PDF di sini atau</p>
                                        <input type="file" name="surat" id="fileInput" class="file-input" accept=".pdf" required>
                                        <label for="fileInput" class="btn btn-primary">Pilih File</label>
                                        <p id="selected-file-name" class="mt-2 text-muted"></p>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-upload"></i> Upload
                                    </button>
                                    <a href="<?= base_url('Admin/Cetak2') ?>" class="btn btn-secondary ml-2">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .drop-zone {
        width: 100%;
        height: 200px;
        border: 2px dashed #ccc;
        border-radius: 4px;
        position: relative;
        transition: all 0.3s ease;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .drop-zone.dragover {
        background-color: #e2e6ea;
        border-color: #0056b3;
    }

    .drop-zone-content {
        text-align: center;
        color: #6c757d;
    }

    .file-input {
        display: none;
    }

    .selected-file {
        margin-top: 10px;
        color: #28a745;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('fileInput');
        const fileNameDisplay = document.getElementById('selected-file-name');
        const fileInputLabel = document.querySelector('label[for="fileInput"]');
        const MAX_FILE_SIZE = 2 * 1024 * 1024; // 2MB dalam bytes

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        dropZone.addEventListener('drop', handleDrop, false);
        fileInput.addEventListener('change', handleFileSelect, false);

        fileInputLabel.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        dropZone.addEventListener('click', function(e) {
            const hasFile = fileInput.files && fileInput.files.length > 0;
            if (!hasFile && !e.target.matches('label, button')) {
                fileInput.click();
            }
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight(e) {
            dropZone.classList.add('dragover');
        }

        function unhighlight(e) {
            dropZone.classList.remove('dragover');
        }

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }

        function handleFileSelect(e) {
            const files = e.target.files;
            handleFiles(files);
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        function handleFiles(files) {
            if (files.length > 0) {
                const file = files[0];

                // Cek tipe file
                if (file.type !== 'application/pdf') {
                    alert('Hanya file PDF yang diperbolehkan');
                    fileInput.value = '';
                    updateFileName('');
                    return;
                }

                // Cek ukuran file
                if (file.size > MAX_FILE_SIZE) {
                    alert('Ukuran file terlalu besar. Maksimal 2MB');
                    fileInput.value = '';
                    updateFileName('');
                    return;
                }

                fileInput.files = files;
                updateFileName(file.name, file.size);
            }
        }

        function updateFileName(fileName, fileSize) {
            if (fileName) {
                const formattedSize = formatFileSize(fileSize);
                fileNameDisplay.innerHTML = `File terpilih: <strong>${fileName}</strong> (${formattedSize})`;
                fileNameDisplay.classList.add('selected-file');
            } else {
                fileNameDisplay.textContent = '';
                fileNameDisplay.classList.remove('selected-file');
            }
        }
    });
</script>