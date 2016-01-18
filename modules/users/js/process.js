window.addEventListener('load', main, false);

function main() {
    var deleteItems = document.getElementsByClassName('delete');
    if (deleteItems.length > 0) {
        setClickEvent(deleteItems, confirmation);
    }
    var actionItems = document.getElementsByClassName('action');
    if(actionItems.length > 0){
        setClickEvent(actionItems, confirmation);
    }
}

function setClickEvent(param1, param2) {
    for (var i = 0; i < param1.length; i++) {
        param1[i].addEventListener('click', param2, false);
    }
}

function confirmation(e) {
    if (!confirm('¿Seguro que quieres realizar esta operacion?')) {
        e.preventDefault();
    }
}

