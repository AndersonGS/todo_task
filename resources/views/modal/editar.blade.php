<div class="modal fade" id="editarTarefaModal" tabindex="-1" aria-labelledby="editarTarefaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editarTarefaModalLabel">Editar Tarefa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            @csrf
          <input type="text" class="form-control" id="trf_edt_id" hidden>
          <div class="mb-3">
            <label for="tarefa_editar_titulo" class="col-form-label">Titulo:</label>
            <input type="text" class="form-control" id="tarefa_editar_titulo" name="tarefa_editar_titulo" require>
          </div>
          <div class="mb-3">
            <label for="tarefa_editar_descricao" class="col-form-label">Descrição:</label>
            <textarea class="form-control" id="tarefa_editar_descricao" name="tarefa_editar_descricao" require></textarea>
          </div>
          <div class="mb-3">
            <label for="tarefa_editar_data" class="col-form-label">Data:</label>
            <input type="text" class="form-control" id="tarefa_editar_data" name="tarefa_editar_data" require>
          </div>
          <div class="mb-3">
          <label for="tarefa_editar_data" class="col-form-label">Responsável:</label>
            <select class="form-select" id="editFloatingSelect" aria-label="Escolha o Responsável" id="multiple-select-field" name="tarefa_editar_responsavel">
                <option selected disabled >Selecione um usuário</option>
                @foreach ($users as $user)
                <option value="{{ $user->id}}">
                    {{ $user->name}}
                </option>
                @endforeach
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="botao_editar">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
