const adminsBtn = document.getElementById('admins-tab')
const teamleadsBtn = document.getElementById('teamleads-tab')
const websBtn = document.getElementById('webs-tab')
const statsBtn = document.getElementById('stats-tab')

let countCliks = 0;
function rateClicks() {
    countCliks++;

    if (countCliks >= 100) {
        alert('Stoppppp!!!!');
        countCliks = 0
    }
}

function insertContent(tab, content) {
    tab = document.getElementById(tab)
    tab.innerHTML = content
}

adminsBtn?.addEventListener('click', function () {
    rateClicks();

    fetch('/users?role=admin')
        .then(res => res.json())
        .then(res => {
            insertContent('admins', `JSON: ${JSON.stringify(res.users)}`)
        })
});

teamleadsBtn?.addEventListener('click', function () {
    rateClicks();
    fetch('/users?role=teamlead')
        .then(res => res.json())
        .then(res => {
            insertContent('teamleads', `JSON: ${JSON.stringify(res.users)}`)
        })
});

websBtn?.addEventListener('click', function () {
    rateClicks();
    fetch('/users?role=web')
        .then(res => res.json())
        .then(res => {
            insertContent('webs', `JSON: ${JSON.stringify(res.users)}`)
        })
});

statsBtn?.addEventListener('click', function () {
    rateClicks();
    fetch('/stats')
        .then(res => res.json())
        .then(res => {
            insertContent('stats', `JSON: ${JSON.stringify(res.stats)}`)
        })
});


