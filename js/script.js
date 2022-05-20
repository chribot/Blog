function addEvents() {
    const buttons = document.getElementsByClassName("change");
    for (const button of buttons) {
        button.addEventListener("click", openPageChange);
    }
}

function openPageChange() {
    //const id = this.id.substring(7);
    //console.log(id);
}