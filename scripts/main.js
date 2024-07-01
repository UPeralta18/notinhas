var quill = new Quill('#editor-container', {
    theme: 'snow'
});
function save() {
    // Pega o conteúdo do editor
    let content = quill.root.innerHTML;
    let filename = $('#filename').val();

    // Envia o conteúdo via AJAX
    $.ajax({
        url: 'save.php',
        type: 'POST',
        data: {
            content: content,
            filename
        },
        success: function (response) {
            toastr.success('Conteúdo salvo com sucesso!');
        },
        error: function (xhr, status, error) {
            toastr.error('Erro ao salvar o conteúdo: ' + error);
        }
    });
}

$('#save').click(function () { save() });

setInterval(save(), 300000);