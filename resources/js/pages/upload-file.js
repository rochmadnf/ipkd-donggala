import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';
import { Indonesian } from 'flatpickr/dist/l10n/id.js';
import IMask from 'imask';

function getWitaDate() {
    const now = new Date();

    // Format ke Asia/Makassar
    const wita = new Intl.DateTimeFormat('id-ID', {
        timeZone: 'Asia/Makassar',
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
    }).formatToParts(now);

    const day = wita.find((x) => x.type === 'day').value;
    const month = wita.find((x) => x.type === 'month').value;
    const year = wita.find((x) => x.type === 'year').value;

    return { day, month, year };
}

document.addEventListener('DOMContentLoaded', () => {
    const dateInput = document.querySelector('input[name="uploaded_at"]');

    if (!dateInput) return;

    // 1) Init flatpickr dulu
    const fp = flatpickr(dateInput, {
        dateFormat: 'd-m-Y',
        allowInput: true,
        locale: Indonesian,
        defaultDate: dateInput.dataset.upDate || null,
        onChange(selectedDates, dateStr) {
            maskDate.value = dateStr;
        },
    });

    // 2) Baru init IMask
    const maskDate = IMask(dateInput, {
        mask: 'd-`m-`Y',
        blocks: {
            d: { mask: IMask.MaskedRange, from: 1, to: 31 },
            m: { mask: IMask.MaskedRange, from: 1, to: 12 },
            Y: { mask: IMask.MaskedRange, from: 1900, to: 9999 },
        },
    });

    maskDate.on('accept', () => {
        const val = maskDate.value;
        // Kalau format sudah lengkap dd-mm-yyyy → sync ke FP biasa
        if (/^\d{2}-\d{2}-\d{4}$/.test(val)) {
            fp.setDate(val, true);
        }
    });
});
