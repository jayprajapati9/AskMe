
const usernameRegex = /^(?=[a-zA-Z_\d]*[a-zA-Z])[a-zA-Z_\d]{0,16}$/;
const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

/* function validateRegex(params, regex) {
    return String(params)
        .toLocaleLowerCase()
        .match(regex);
    return regex.test(params);
} 
    function validateRegex(params, regex) {
        return regex.test(String(params).toLowerCase());
} */

function UsernameRegex(params) {
    return usernameRegex.test(params);
}

function EmailRegex(params) {
    return emailRegex.test(params);
}

function ErrorMsg(msgid, msg) {
    $(msgid).text(msg);

    setTimeout(() => {
        $(msgid).text(null);
    }, 5000);
}

function SuccessMsg(msgid, msg) {
    $(msgid).text(msg);
}