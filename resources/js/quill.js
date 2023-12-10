const defaultConfig = {
    toolbar: [
        [{ font: [] }],
        [{ align: [] }],
        ["bold", "italic", "underline", "strike"],
        [
            { list: "ordered" },
            { list: "bullet" },
            { indent: "-1" },
            { indent: "+1" },
        ],
        [{ header: [1, 2, 3, 4, 5, 6, false] }],
        [{ color: [] }, { background: [] }],
        ["blockquote", "code-block"],
        [{ script: "super" }, { script: "sub" }],
        ["link"],
        ["clean"],
    ],
};

export function quillTextEditor(
    element,
    body,
    text,
    quillModules = defaultConfig,
    quillTheme = "snow"
) {
    let quill = new Quill(element, {
        bounds: "#editor-container .editor",
        modules: quillModules,
        theme: quillTheme,
        placeholder: `Tuliskan ${text} di sini ...`,
    });
    
    function updateBody() {
        document.getElementById(body).value = quill.root.innerHTML;
    
    }

    quill.on("text-change", updateBody);

    $(document).ready(function() {
        $('#modal-edit').on('show.bs.modal', function(event) {
            var clicked_from = $(event.relatedTarget);
            // Tombol atau link yang memicu modal
            var pengajuan = clicked_from.data('pengajuan');

            quill.root.innerHTML = pengajuan.catatan;

            
        });
    });
}

