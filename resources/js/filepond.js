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
export function imageCrop() {
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

// Filepond: Image Preview
// export function imagePreview() {
//     const images = document.querySelectorAll(".image-preview-filepond");

//     images.forEach((image) => {
//         const pond = FilePond.create(image, {
//             credits: null,
//             allowImagePreview: true,
//             allowMultiple: true,
//             allowImageFilter: false,
//             allowImageExifOrientation: false,
//             allowImageCrop: false,
//             acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
//             fileValidateTypeDetectType: (source, type) =>
//                 new Promise((resolve, reject) => {
//                     // Do custom type detection here and return with promise
//                     resolve(type);
//                 }),
//             storeAsFile: true,
//         });
//          // Tambahkan pratinjau gambar-gambar lama
//         const oldImagesInputs = document.querySelectorAll('input[name="old_images[]"]');
//         const oldImages = []

//         oldImagesInputs.forEach((input) => {
//             oldImages.push(input.value);
//         });
//         // Tambahkan pratinjau gambar-gambar lama
//         oldImages.forEach((imagePath) => {
//             pond.addFile(imagePath, {
//                 source: imagePath,
//                 options: {
//                     type: 'local',
//                 },
//             });
//         });
//     });
// }
