<x-layout>

    <x-slot:btn>
        <a href="{{route('task.create')}}" class="btn btn-primary">
            Criar Tarefa
        </a>
        <a href="{{route('logout')}}" class="btn btn-primary">
            Sair
        </a>
    </x-slot:btn>

    <section class="graph">
        <div class="graph_header">
            <h2> Progesso do Dia </h2>
            <div class="graph_header-line"></div>
            <div class="graph_header-date">
                <a href="{{route('home', ['date' => $data_prev_button])}}">
                    <img src="/assets/images/icon-prev.png">
                </a>
                    {{ $data_as_string }}
                <a href="{{route('home', ['date' => $data_next_button])}}">
                    <img src="/assets/images/icon-next.png">
                </a>
            </div>
        </div>

        <div class="graph_header-subtitle"> Tarefa: <b>{{ $done_tasks_count }}/{{ $tasks_count }}</b> </div>

        <div class="graph-placeholder">

        </div>

        <div class="tasks_left_footer">
            <img src="/assets/images/icon-info.png" />
            @if ($undone_tasks_count === 1)
                Resta {{ $undone_tasks_count }} tarefa para ser realizada
            @elseif ($undone_tasks_count > 1)
                Restam {{ $undone_tasks_count }} tarefas para serem realizadas
            @else
                Não existem tarefas para serem realizadas
            @endif
        </div>
    </section>

    @if ($tasks_count > 0)
        <section class="list">
            <div class="list_header">
                <select class="list_header-select" onchange="changeTaskStatusFilter(this)">
                    <option value="all_task">Todas as taredas</option>
                    <option value="task_pending">Tarefas Pendentes</option>
                    <option value="task_done">Tarefas realizadas</option>
                </select>
            </div>
            <div class="task_list">

                @foreach ($tasks as $task)
                    <x-task :data=$task/>
                @endforeach

            </div>
        </section>
    @endif

    <script>
        function changeTaskStatusFilter(e){
            if (e.value == 'task_pending'){
                showAllTasks()
                document.querySelectorAll('.task_done').forEach(function(element){
                element.style.display = 'none';
                })
            } else if (e.value == 'task_done'){
                showAllTasks()
                document.querySelectorAll('.task_pending').forEach(function(element){
                element.style.display = 'none';
                })
            } else {
                showAllTasks();
            }
        }

        function showAllTasks(){
            document.querySelectorAll('.task').forEach(function(element){
            element.style.display = '';
            })
        }
    </script>

    <script>
        async function taskUpdate(element){
            let status = element.checked;
            let taskId = element.dataset.id;
            let url = '{{ route('task.update') }}';
            let rawResult = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'accept': 'application/json'
                },
                body: JSON.stringify({status, taskId, _token: '{{ csrf_token() }}'})
            });
            result = await rawResult.json();

            if (result.success){
                alert('Task Atualizada com Sucesso!');
                location.reload();
            } else {
                element.checked = !status;
            }
        }
    </script>
</x-layout>
