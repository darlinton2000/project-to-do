<x-layout>
    
    <x-slot:btn>
        <a href="#" class="btn btn-primary">
            Criar Tarefa
        </a>
    </x-slot:btn>

    <section class="graph">
        <div class="graph_header">
            <h2> Progesso do Dia </h2>
            <div class="graph_header-line"></div>
            <div class="graph_header-date">
                <img src="/assets/images/icon-prev.png">
                    13 de Dez
                <img src="/assets/images/icon-next.png">
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
            @php
                $tasks = [
                    [
                        'id' => 1, 
                        'done' => true, 
                        'title' => 'Minha Primeira Task', 
                        'category' => 'Categoria 1'
                    ],
                    [
                        'id' => 2, 
                        'done' => false, 
                        'title' => 'Minha Segunda Task', 
                        'category' => 'Categoria 2'
                    ],
                ]
            @endphp
            <x-task :data=$tasks[0]/>
            <x-task :data=$tasks[1]/>
        </div>
    </section>
</x-layout>