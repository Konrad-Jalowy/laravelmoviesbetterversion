// import {MDEditor} from '@devhau/md-editor';

function getSelectedText() {
    if (window.getSelection) {
        return window.getSelection().toString();
    } else if (document.selection) {
        return document.selection.createRange().text;
    }
    return '';
}

let bold = document.querySelector("#bold");
bold.addEventListener('click', function(){
    alert(window.getSelection().toString());
    console.log(window.getSelection().toString());
    console.log(document.createRange());
})

let form = document.querySelector('textarea')[1];
// var editor = new MDEditor({ element: form });