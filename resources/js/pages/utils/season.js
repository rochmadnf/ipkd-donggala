function changeSeason(val) {
    const season = document.getElementById('seasonYear');

    const changedSeason = Number(season.value) + Number(val);
    season.value = changedSeason;

    const applyBtn = document.querySelector(`form#formYear>button[type='submit']`);

    if (
        Number(changedSeason) !== Number(season.dataset.initValue) &&
        Number(changedSeason) >= 1998 &&
        Number(changedSeason) <= Number(+new Date().getFullYear() + 10)
    ) {
        applyBtn.classList.remove('hidden');
    } else {
        applyBtn.classList.add('hidden');
    }
}

document.getElementById('formYear').addEventListener('submit', (el) => {
    if (Boolean(el.target.children[3].classList.contains('hidden')) === true) {
        el.preventDefault();
    }
});

document.getElementById('seasonYear').addEventListener('change', () => {
    changeSeason(0);
});

document.getElementById('seasonYear').addEventListener('keyup', () => {
    changeSeason(0);
});

document.getElementById('nextYear').addEventListener('click', () => {
    changeSeason(1);
});

document.getElementById('prevYear').addEventListener('click', () => {
    changeSeason(-1);
});
