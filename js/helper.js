function errorMsg(msgid, msg) {
  $(msgid).text(msg);

  setTimeout(() => {
    $(msgid).text(null);
  }, 5000);
}

function successMsg(msgid, msg) {
  $(msgid).text(msg);
}

// Function For Validation Url
function validateUrl(url) {
  var res = url.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
  return res !== null;
}