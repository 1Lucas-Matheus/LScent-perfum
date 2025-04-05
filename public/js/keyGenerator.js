function generateActivationKey() {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789&@$';
    const length = 11;
    let key = '';

    for (let i = 0; i < length; i++) {
        key += characters[Math.floor(Math.random() * characters.length)];
    }

    const formattedKey = key.slice(0, 5) + '-' + key.slice(5);

    document.getElementById('keyDisplay').value = formattedKey;
}

function copyText() {
    const inputField = document.getElementById("keyDisplay");

    if (inputField.value === "") {
        alert("Gere uma key primeiro!");
        return;
    }

    inputField.select();
    document.execCommand("copy");

    const message = document.getElementById("copiedMessage");
    message.classList.remove("hidden");
    setTimeout(() => message.classList.add("hidden"), 2000);
}