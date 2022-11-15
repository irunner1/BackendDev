
function params(param) {
    return {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
        body: param
    }
}

function ftch(param) {
    fetch(window.location.origin + '/session/session_man.php', params(param)).then(reload)
}

function reload() {
    location.reload()
}

function changeTheme() {
    ftch('action=theme')
}

function setLogin() {
    ftch('action=login&login=' + document.querySelector('input').value)
}
