<div class="space-y-2">
    <div x-data="{ expand: false }">
        <div :class="{ 'bg-gray-300/70': expand }"
            class="group py-2 px-4 flex mb-1.5 rounded-md border border-slate-300 flex-row items-center justify-between cursor-pointer hover:bg-gray-300/70 transition duration-150"
            @click="expand = !expand">
            <span class="font-medium uppercase tracking-wide select-none">Dimensi 1</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5"
                :class="{ 'rotate-90': expand }">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
        </div>

        <div x-show="expand" x-collapse x-cloak class="pb-2 px-2 border-x border-b">
            <div class="flex flex-row gap-x-4 items-center">
                <div class="border border-slate-300/30 size-16 p-2 rounded-md">
                    <img src="{{ asset('assets/icons/pdf.svg') }}" alt="icon file">
                </div>
                <div class="flex flex-col">
                    <p class="font-medium text-slate-950 text-lg">BUKU I P-RKPD 2023</p>
                    <div class="flex flex-row gap-x-4">
                        <a class="flex flex-row items-center hover:opacity-65" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span class="ml-1.5 text-sm">Tinjau</span>
                        </a>
                        <a class="flex flex-row items-center hover:opacity-65" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            <span class="ml-1.5 text-sm">Unduh</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
