

// Plugins
FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginImageCrop,
    FilePondPluginImageExifOrientation,
    FilePondPluginImageFilter,
    FilePondPluginImageResize,
    FilePondPluginFileValidateSize,
    FilePondPluginFileValidateType
);

// Filepond: Image Crop
export function fileInput() {
    const images = document.querySelectorAll(".basic-filepond");

    images.forEach((image) => {
        FilePond.create(image, {
            credits: null,
            allowImagePreview: false,
            allowMultiple: false,
            allowFileEncode: false,
            required: false,
            storeAsFile: true,
        });

        
    });
}
export function fileInputPreview() {
    $(document).ready(function() {
        $('#modal-info').on('show.bs.modal', function(event) {
            var clicked_from = $(event.relatedTarget); // Tombol atau link yang memicu modal
            var pengajuan = clicked_from.data('pengajuan');
            $(this).find('#modal-info-title').html(pengajuan.jenis)



            var modal_body = $(this).find('.modal-body');


            modal_body.find('#status').html(pengajuan.status);
            modal_body.find('#judul').html(pengajuan.judul);
            modal_body.find('#lembaga').html(pengajuan.lembaga);
            modal_body.find('#nama-ketua').html(pengajuan.nama_ketua);
            modal_body.find('#no-ketua').html(pengajuan.no_ketua);
            modal_body.find('#nim-ketua').html(pengajuan.nim_ketua);
            modal_body.find('#hasil-kegiatan').html(pengajuan.lpj.hasil_kegiatan);
            modal_body.find('#catatan').html(pengajuan.catatan ? pengajuan.catatan : "");
         

            function setBerkasInfo(selector, filePath) {
                const placeholder = modal_body.find(selector);
                if(placeholder){
                    if (filePath) {
                        placeholder.html(filePath.split('/').pop());
                        placeholder.attr('href', '/dashboard/pengajuans/download/' + filePath);
                    } else {
                        placeholder.html(`
                        <tr>
                        <td colspan="5">
                            <p class="text-center">Belum ada berkas</p>
                        </td>
                        </tr>
                        `);
                        placeholder.removeAttr('href');
                    }
                }
                
            }

            setBerkasInfo('#berkas-1', pengajuan.lpj.upload_kendali);
            setBerkasInfo('#berkas-2', pengajuan.lpj.upload_acc_keuangan);
            setBerkasInfo('#berkas-3', pengajuan.lpj.upload_lpj);
            setBerkasInfo('#berkas-4', pengajuan.lpj.upload_sertifikat_lomba);
        });

        $('#modal-edit').on('show.bs.modal', function(event) {

            var clicked_from = $(event.relatedTarget);
            // Tombol atau link yang memicu modal
            var pengajuan = clicked_from.data('pengajuan');

            var modal_body = $(this).find('.modal-body');

            modal_body.find('#status').html(pengajuan.status);
            modal_body.find('#judul').html(pengajuan.judul);
            modal_body.find('#lembaga').html(pengajuan.lembaga);
            modal_body.find('#nama-ketua').html(pengajuan.nama_ketua);
            modal_body.find('#no-ketua').html(pengajuan.no_ketua);
            modal_body.find('#nim-ketua').html(pengajuan.nim_ketua);
            modal_body.find('#hasil-kegiatan').html(pengajuan.lpj.hasil_kegiatan);
            modal_body.find('#catatan').html(pengajuan.catatan ? pengajuan.catatan : "");

            modal_body.find('form').attr('action', '/dashboard/pengajuans/' + pengajuan.id)


            function setBerkasInfo(selector, filePath) {
                const placeholder = modal_body.find(selector);
                if(placeholder){
                    if (filePath) {
                        placeholder.html(filePath.split('/').pop());
                        placeholder.attr('href', '/dashboard/pengajuans/download/' + filePath);
                    } else {
                        placeholder.html(`
                        <tr>
                        <td colspan="5">
                            <p class="text-center">Belum ada berkas</p>
                        </td>
                        </tr>
                        `);
                        placeholder.removeAttr('href');
                    }
                }
                
            }

            setBerkasInfo('#berkas-1', pengajuan.lpj.upload_kendali);
            setBerkasInfo('#berkas-2', pengajuan.lpj.upload_acc_keuangan);
            setBerkasInfo('#berkas-3', pengajuan.lpj.upload_lpj);
            setBerkasInfo('#berkas-4', pengajuan.lpj.upload_sertifikat_lomba);

            // Update the selected attribute of the options in the select element
            modal_body.find('#select-tipe option').each(function() {
                if ($(this).val() === pengajuan.tipe) {
                    $(this).prop('selected', true);
                } else {
                    $(this).prop('selected', false);
                }
            });

            modal_body.find('#select-status option').each(function() {
                if ($(this).val() === pengajuan.status) {
                    $(this).prop('selected', true);
                } else {
                    $(this).prop('selected', false);
                }
            });
            
            const url = clicked_from.data('url') + "storage/";

            const setupFilePond = (uploadSelector, filePath, url) => {
                const uploadElement = document.querySelector(uploadSelector);
            
                if (uploadElement) {

                    const pond = FilePond.create(uploadElement, {
                        credits: null,
                        allowImagePreview: false,
                        allowMultiple: false,
                        allowFileEncode: false,
                        required: false,
                        storeAsFile: true,
                    });
            
                    if (filePath !== null) {
                        pond.addFile(url + filePath.trim());
                    }
                }
            };
            
            // Set up FilePond instances for each file upload input
            setupFilePond(".filepond-upload-kendali", pengajuan.lpj.upload_kendali, url);
            setupFilePond(".filepond-upload-acc", pengajuan.lpj.upload_acc_keuangan, url);
            setupFilePond(".filepond-upload-lpj", pengajuan.lpj.upload_lpj, url);
            setupFilePond(".filepond-upload-sertifikat", pengajuan.lpj.upload_sertifikat_lomba, url);
            
            // const upload_kendali = document.querySelector(".filepond-upload-kendali");


            // const pond_kendali = FilePond.create(upload_kendali, {
            //     credits: null,
            //     allowImagePreview: false,
            //     allowMultiple: false,
            //     allowFileEncode: false,
            //     required: false,
            //     storeAsFile: true,
            // });
        
            
            // var filePath= pengajuan.lpj.upload_kendali;
            // if (filePath!=null) {
            //     pond_kendali.addFile(url + filePath.trim());
            // }

          
          
            // const upload_acc = document.querySelector(".filepond-upload-acc");
            // const pond_acc = FilePond.create(upload_acc, {
            //     credits: null,
            //     allowImagePreview: false,
            //     allowMultiple: false,
            //     allowFileEncode: false,
            //     required: false,
            //     storeAsFile: true,
            // });

            // filePath = pengajuan.lpj.upload_acc_keuangan;
            // if (filePath!=null) {
            //     pond_acc.addFile(url + filePath.trim());
            // }


            // const upload_lpj = document.querySelector(".filepond-upload-lpj");
            // const pond_lpj = FilePond.create(upload_lpj, {
            //     credits: null,
            //     allowImagePreview: false,
            //     allowMultiple: false,
            //     allowFileEncode: false,
            //     required: false,
            //     storeAsFile: true,
            // });

            // filePath = pengajuan.lpj.upload_lpj;
            // if (filePath!=null) {
            //     pond_lpj.addFile(url + filePath.trim());
            // }
            // const upload_sertifikat = document.querySelector(".filepond-upload-sertifikat");
            // const pond = FilePond.create(upload_sertifikat, {
            //     credits: null,
            //     allowImagePreview: false,
            //     allowMultiple: false,
            //     allowFileEncode: false,
            //     required: false,
            //     storeAsFile: true,
            // });

            // filePath = pengajuan.lpj.upload_sertifikat_lomba;
            // if (filePath!=null) {
            //     pond.addFile(url + filePath.trim());
            // }

           

        });
    });

       
}




