const previewAttachment = document.getElementById("previewAttachment");
const attachmentObject = document.getElementById("objectPreviewAttachment");

document
    .querySelectorAll("[data-action='previewAttachment']")
    .forEach((item) => {
        item.addEventListener("click", () => {
            openPreviewWindow(item);
        });
    });

function openPreviewWindow(item) {
    previewAttachment.classList.remove("hidden", "-z-[9999]");
    previewAttachment.classList.add("flex", "z-[9999]");
    attachmentObject.setAttribute("data", item.getAttribute("data-filepath"));
    document.getElementById("objectName").innerText =
        item.getAttribute("data-filename");
}

function closePreviewWindow() {
    previewAttachment.classList.add("hidden", "-z-[9999]");
    previewAttachment.classList.remove("flex", "z-[9999]");
}
document
    .getElementById("closePreviewAttachment")
    .addEventListener("click", closePreviewWindow);
previewAttachment.addEventListener("click", closePreviewWindow);
