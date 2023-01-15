<x-layout page="To-Do Login">

    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1> Editar tarefa </h1>
        <form method="POST" action="{{Route('task.create_action')}}">
            @csrf

            <x-form.text_input name="title" label="Titulo da Tarefa" required="required" value="{{$task->title}}"/>
            <x-form.text_input type="datetime-local" name="due_date" label="Data de Realização" required="required" value="{{$task->due_date}}"/>
            <x-form.select_input name="category_id" label="Categoria" required="required">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        @if ($category->id == $task->category_id)
                            selected
                        @endif    
                    >{{$category->title}}</option>
                @endforeach
            </x-form.select_input>
            <x-form.textarea_input name="description" label="Descrição da Tarefa" placeholder="Digite a descrição da tarefa" value="{{$task->description}}"/>
            <x-form.form_button resetTxt="Resetar" submitTxt="Atualizar Tarefa"/>

        </form>
    </section>
</x-layout>