import './utils/season';
import './utils/preview';

window.addEventListener('load', () => {
    const gotoSeason = new URLSearchParams(window.location.search).has('season');

    if (gotoSeason) {
        document.getElementById('header-section').scrollIntoView({ behavior: 'smooth' });
    }
});
