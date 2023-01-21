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
                    {{$data_as_string}}
                <a href="{{route('home', ['date' => $data_next_button])}}">
                    <img src="/assets/images/icon-next.png">
                </a>
            </div>
        </div>

        <div class="graph_header-subtitle"> Tarefa: <b>3/6</b> </div>

        <div class="graph-placeholder">

        </div>

        <div class="tasks_left_footer">
            <img src="/assets/images/icon-info.png" />
            Restam 3 tarefas para serem realizadas
        </div>
    </section>

    <section class="list">
        <div class="list_header">
            <select class="list_header-select">
                <option value="1">Todas as taredas</option>
            </select>
        </div>
        <div class="task_list">

            @foreach ($tasks as $task)
                <x-task :data=$task/>
            @endforeach
            
        </div>
    </section>

    <script>
        async function taskUpdate(element){
            let status = element.checked;
            let taskId = element.dataset.id;
            let url = '{{route('task.update')}}';
            let rawResult = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'accept': 'application/json'
                },
                body: JSON.stringify({status, taskId, _token: '{{csrf_token()}}'})
            });
            result = await rawResult.json();
            
            if (result.success){
                alert('Task Atualizada com Sucesso!');
            } else {
                element.checked = !status;
            }
        }
    </script>
</x-layout>