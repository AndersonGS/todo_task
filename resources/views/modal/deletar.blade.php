<div class="modal fade" id="deletarTarefaModal" tabindex="-1" aria-labelledby="deletarTarefaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deletarTarefaModalLabel">Remover Tarefa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Você vai remover essa tarefa permanentemente do sistema?
        @csrf
        <input type="text" class="form-control" id="tarefa_id" hidden>
        <input type="text" class="form-control" id="tarefa_CSRF" value="{{ csrf_token() }}" hidden>
        <input type="text" class="form-control" id="tarefa_URL" value="{{url('tarefas')}}" hidden>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="botao_deletar" >Remover</button>
        </div>
      </div>
    </div>
  </div>
</div>
