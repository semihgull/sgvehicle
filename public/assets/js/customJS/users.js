function userRedirect(to, seconds) {
    if (seconds == 0) {
        window.location.href = to;
        return;
    }
    seconds--;
    setTimeout(function() {
        userRedirect(to, seconds);
    }, 1000);
}