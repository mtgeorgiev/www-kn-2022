
if (new URL(document.location.href).searchParams.get('success')) {
    document.getElementById('content').innerText = 'Качването е успешно. Ще бъдете пренасочени към началната страница';
} else {
    document.getElementById('content').innerText = 'Качването НЕ е успешно. Ще бъдете пренасочени към началната страница';
}

window.setTimeout(() => {document.location = './test.html'}, 2000);