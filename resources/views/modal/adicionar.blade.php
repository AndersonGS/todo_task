<div class="modal fade" id="adicionarTarefaModal" tabindex="-1" aria-labelledby="adicionarTarefaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="adicionarTarefaModalLabel">Nova Tarefa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{url('tarefas')}}">
            @csrf
          <div class="mb-3">
            <label for="tarefa_titulo" class="col-form-label">Titulo:</label>
            <input type="text" class="form-control" id="tarefa_titulo" name="tarefa_titulo" required>
          </div>
          <div class="mb-3">
            <label for="tarefa_descricao" class="col-form-label">Descrição:</label>
            <textarea class="form-control" id="tarefa_descricao" name="tarefa_descricao" required></textarea>
          </div>
          <div class="mb-3">
            <label for="tarefa_data" class="col-form-label">Data:</label>
            <input type="text" class="form-control" id="tarefa_data" name="tarefa_data" required>
          </div>
          <div class="mb-3">
          <label for="tarefa_data" class="col-form-label">Responsável:</label>
            <select class="form-select" id="floatingSelect" aria-label="Escolha o Responsável" id="multiple-select-field" name="tarefa_responsavel" required>
                <option selected disabled >Selecione um usuário</option>
                @foreach ($users as $user)
                <option value="{{ $user->id}}">
                    {{ $user->name}}
                </option>
                @endforeach
            </select>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
