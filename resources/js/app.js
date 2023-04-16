import * as bootstrap from 'bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css'
import $ from 'jquery';
import 'bootstrap-datepicker';


window.bootstrap = bootstrap;


const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

const deletarTarefaModal = document.getElementById('deletarTarefaModal')
if (deletarTarefaModal) {
    deletarTarefaModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    const recipientDeletar = button.getAttribute('data-bs-whatever');

    const tarefa_id = deletarTarefaModal.querySelector('#tarefa_id');

    tarefa_id.value = recipientDeletar;
})
}

const editarTarefaModal = document.getElementById('editarTarefaModal')
if (editarTarefaModal) {
    editarTarefaModal.addEventListener('show.bs.modal', event => {
    const buttonEdit = event.relatedTarget;
    const recipientEditar = buttonEdit.getAttribute('data-bs-whatever');
    var titulo = document.getElementById("lst_trf_titulo_"+recipientEditar).innerHTML;
    var descricao = document.getElementById("lst_trf_descricao_"+recipientEditar).innerHTML;
    var dataConclusao = document.getElementById("lst_trf_data_"+recipientEditar).innerHTML;
    var usuario = document.getElementById("lst_trf_usuario_"+recipientEditar).getAttribute("value");

    document.getElementById("tarefa_editar_titulo").value = titulo;
    document.getElementById("tarefa_editar_descricao").value = descricao;
    document.getElementById("tarefa_editar_data").value = dataConclusao;
    document.getElementById("editFloatingSelect").value = usuario;

    const trf_edt_id = editarTarefaModal.querySelector('#trf_edt_id');
    trf_edt_id.value = recipientEditar;

  })
}

$('#tarefa_data').datepicker();
$('#tarefa_editar_data').datepicker();

$('#botao_deletar').on('click', function(e){
    e.preventDefault();
    tarefaDelete();
});

function tarefaDelete(){
    var URL = document.getElementById("tarefa_URL").value;
    var tarefa_id = document.getElementById("tarefa_id").value;
    var tarefa_csrf = document.getElementById("tarefa_CSRF").value;
    $.ajax({
        url: URL+'/'+tarefa_id,
        type: 'DELETE',
        dataType: 'JSON',
        data:{
            'id': tarefa_id,
            '_token': tarefa_csrf,
        },
        success: function () {
            console.log('Deletado');
            location.reload();
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
}

$('#botao_editar').on('click', function(e){
    e.preventDefault();
    tarefaEdit();
});

function tarefaEdit(){
    var URL = document.getElementById("tarefa_URL").value;
    var tarefa_id = document.getElementById("trf_edt_id").value;
    var tarefa_csrf = document.getElementById("tarefa_CSRF").value;
    var edt_titulo = document.getElementById("tarefa_editar_titulo").value;
    var edt_descricao = document.getElementById("tarefa_editar_descricao").value;
    var edt_data = document.getElementById("tarefa_editar_data").value;
    var edt_usuari = document.getElementById("editFloatingSelect").value;
    console.log(URL+'/'+tarefa_id);
    $.ajax({
        url: URL+'/'+tarefa_id,
        type: 'PUT',
        dataType: 'JSON',
        data:{
            'id': tarefa_id,
            'titulo': edt_titulo,
            'descricao': edt_descricao,
            'data_limite_conclusao': edt_data,
            'user': edt_usuari,
            '_token': tarefa_csrf,
        },
        success: function () {
            console.log('Editado');
            location.reload();
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
}
