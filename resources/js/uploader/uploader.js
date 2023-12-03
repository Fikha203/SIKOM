import { imageCrop } from "../filepond.js";
import { currentPath } from "../helpers/currentPath";

if (currentPath.startsWith("/dashboard")) imageCrop();
console.log(currentPath);

// if (currentPath.startsWith("/dashboard/complaints")) imagePreview();
// if (currentPath.startsWith("/dashboard/complaints")) imagePreview();
// if (currentPath.startsWith("/dashboard/responses")) imagePreview();

// if (currentPath.startsWith("/dashboard/categories")) imageCrop();

// if (currentPath.startsWith("/dashboard/website")) imagePreview();

// if (currentPath.startsWith("/complaints")) imagePreview();