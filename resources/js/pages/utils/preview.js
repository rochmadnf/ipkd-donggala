const previewElement = (fileName, uploadedAt, urlPath) => {
    return `
<div
    id="previewAttachment"
    onclick="this.remove()"
    class="fixed left-0 top-0 z-[9999] flex h-screen w-screen flex-col items-center justify-between gap-y-4 bg-[#333333] pt-4"
>
    <button
        onclick="this.parentElement.remove()"
        class="mr-3 inline-flex items-center self-end rounded-full border border-white/90 font-light text-white/90 transition duration-150 hover:border-gray-300 hover:text-gray-300"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-5"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>
    <div class="h-full w-full rounded-t-2xl bg-white">
        <div class="w-full overflow-hidden rounded-md px-8">
            <div class="py-4">
                <h1 class="text-base font-semibold leading-none tracking-wider md:text-xl">${fileName}</h1>
                <h3 class="text-sm text-gray-500">${uploadedAt}</h3>
            </div>
            <object
                class="rounded-md"
                data="${urlPath}"
                type="application/pdf"
                frameborder="0"
                width="100%"
                height="690px"
            ></object>
        </div>
    </div>
</div>
`;
};

document.querySelectorAll('[data-preview]').forEach((item) => {
    item.addEventListener('click', () => {
        document.body.insertAdjacentHTML(
            'afterbegin',
            previewElement(item.dataset.filename, item.dataset.uploadAt, item.dataset.filepath),
        );
    });
});
