import { fileInputPreview } from "../filepond.js";
import { fileInput } from "../filepond.js";
import { currentPath } from "../helpers/currentPath";

if (currentPath.startsWith("/dashboard/pengajuans")){
    fileInputPreview();
    
}
else if (currentPath.startsWith("/dashboard")) {
    console.log("dashboard1");
    fileInput();
}
    


// if (currentPath.startsWith("/dashboard/complaints")) imagePreview();
// if (currentPath.startsWith("/dashboard/complaints")) imagePreview();
// if (currentPath.startsWith("/dashboard/responses")) imagePreview();

// if (currentPath.startsWith("/dashboard/categories")) imageCrop();

// if (currentPath.startsWith("/dashboard/website")) imagePreview();

// if (currentPath.startsWith("/complaints")) imagePreview();